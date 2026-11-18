<?php

namespace App\Jobs;

use App\Mail\AdminEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendAdminEmail implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $uniqueFor = 86400;

    public function __construct(
        public string $batchId,
        public int $userId,
        public string $subjectLine,
        public string $heading,
        public string $messageBody
    ) {
    }

    public function uniqueId(): string
    {
        return $this->batchId . ':' . $this->userId;
    }

    public function backoff(): array
    {
        return [60, 300];
    }

    public function handle(): void
    {
        $user = User::query()->eligibleForEmail()->find($this->userId);

        if (!$user) {
            Log::info('Skipped administrator email for a user who is no longer eligible.', [
                'batch_id' => $this->batchId,
                'user_id' => $this->userId,
            ]);

            return;
        }

        Mail::to($user->email)->send(
            new AdminEmail($this->heading, $this->messageBody, $this->subjectLine)
        );
    }

    public function failed(Throwable $exception): void
    {
        Log::error('Administrator email delivery failed after retries.', [
            'batch_id' => $this->batchId,
            'user_id' => $this->userId,
            'exception' => $exception->getMessage(),
        ]);
    }
}
