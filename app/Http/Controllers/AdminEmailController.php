<?php

namespace App\Http\Controllers;

use App\Jobs\SendAdminEmail;
use App\Models\User;
use App\Support\EmailContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Throwable;

class AdminEmailController extends Controller
{
    public function index()
    {
        $nonce = Str::random(48);
        session(['admin_email_form_nonce' => $nonce]);

        return view('admin.email-users', [
            'title' => 'Email users',
            'admin_data' => auth()->user(),
            'eligibleCount' => $this->eligibleUsers()->count(),
            'formNonce' => $nonce,
        ]);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ]);

        $query = $this->eligibleUsers();
        $term = trim($validated['q'] ?? '');

        if ($term !== '') {
            $tokens = preg_split('/\s+/', $term, -1, PREG_SPLIT_NO_EMPTY);

            $query->where(function ($builder) use ($tokens) {
                foreach ($tokens as $token) {
                    $like = '%' . $token . '%';

                    $builder->where(function ($match) use ($like) {
                        $match->where('first_name', 'like', $like)
                            ->orWhere('last_name', 'like', $like)
                            ->orWhere('email', 'like', $like);
                    });
                }
            });
        }

        $total = $query->count();

        return response()->json([
            'users' => $query->orderBy('first_name')
                ->orderBy('last_name')
                ->limit(30)
                ->get(['id', 'first_name', 'last_name', 'email']),
            'total' => $total,
        ])->header('Cache-Control', 'no-store, private');
    }

    public function preview(Request $request)
    {
        $validated = $this->validateComposition($request);

        return response(
            view('mail.admin_email', [
                'heading' => $validated['heading'],
                'safeMessage' => EmailContent::sanitize($validated['message']),
            ])->render(),
            200,
            ['Content-Type' => 'text/html; charset=UTF-8']
        );
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'recipient_mode' => ['required', 'in:all,selected,individual'],
            'user_ids' => ['exclude_unless:recipient_mode,selected', 'required', 'array', 'min:1', 'max:5000'],
            'user_ids.*' => ['required', 'integer', 'distinct'],
            'recipient_id' => ['exclude_unless:recipient_mode,individual', 'required', 'integer'],
            'subject' => ['required', 'string', 'max:255'],
            'heading' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:20000'],
            'form_nonce' => ['required', 'string', 'size:48'],
        ]);

        $expectedNonce = session('admin_email_form_nonce');
        if (!is_string($expectedNonce) || !hash_equals($expectedNonce, $validated['form_nonce'])) {
            throw ValidationException::withMessages([
                'form_nonce' => 'This email form has expired. Reload the page before sending.',
            ]);
        }

        $nonceKey = 'admin-email-dispatch:' . hash('sha256', $validated['form_nonce']);
        if (!Cache::add($nonceKey, true, now()->addDay())) {
            throw ValidationException::withMessages([
                'form_nonce' => 'This email has already been submitted.',
            ]);
        }

        $batchId = (string) Str::uuid();
        $subject = trim($validated['subject']);
        $heading = trim($validated['heading']);
        $message = EmailContent::sanitize($validated['message']);
        $queued = 0;
        $failed = 0;
        $dispatch = function ($users) use ($batchId, $subject, $heading, $message, &$queued, &$failed) {
            foreach ($users as $user) {
                try {
                    SendAdminEmail::dispatch(
                        $batchId,
                        (int) $user->id,
                        $subject,
                        $heading,
                        $message
                    );
                    $queued++;
                } catch (Throwable $exception) {
                    $failed++;
                    Log::error('Administrator email could not be dispatched.', [
                        'batch_id' => $batchId,
                        'user_id' => $user->id,
                        'exception' => $exception->getMessage(),
                    ]);
                }
            }
        };

        if ($validated['recipient_mode'] === 'all') {
            $this->eligibleUsers()->orderBy('id')->chunkById(100, $dispatch);
        } else {
            $ids = $validated['recipient_mode'] === 'individual'
                ? [$validated['recipient_id']]
                : $validated['user_ids'];

            $users = $this->eligibleUsers()->whereIn('id', $ids)->orderBy('id')->get();
            if ($users->count() !== count(array_unique($ids))) {
                throw ValidationException::withMessages([
                    'user_ids' => 'One or more recipients are no longer eligible to receive email.',
                ]);
            }

            $dispatch($users);
        }

        session()->forget('admin_email_form_nonce');

        if ($queued + $failed === 0) {
            return redirect()->route('admin_email_users')
                ->with('error', 'There are no eligible users to receive this email.');
        }

        if ($failed > 0) {
            return redirect()->route('admin_email_users')
                ->with('error', "$queued recipient(s) queued; $failed could not be queued. Check the application log.");
        }

        $result = config('queue.default') === 'sync' ? 'processed' : 'queued';

        return redirect()->route('admin_email_users')
            ->with('success', "Email $result for $queued eligible recipient(s).");
    }

    private function validateComposition(Request $request): array
    {
        return $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'heading' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:20000'],
        ]);
    }

    private function eligibleUsers()
    {
        return User::query()
            ->eligibleForEmail();
    }
}
