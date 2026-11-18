<?php

namespace Tests\Feature;

use App\Jobs\SendAdminEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class AdminEmailTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['queue.default' => 'database']);
    }

    public function test_admin_can_search_only_verified_customer_recipients(): void
    {
        $admin = $this->createUser(['role' => 1]);
        $eligible = $this->createUser([
            'first_name' => 'Verified',
            'email' => 'verified@example.test',
            'verify_status' => 1,
        ]);
        $this->createUser([
            'first_name' => 'Pending',
            'email' => 'pending@example.test',
            'verify_status' => 0,
        ]);

        $this->actingAs($admin)
            ->get(route('admin_email_users_search', ['q' => 'example']))
            ->assertOk()
            ->assertJsonPath('total', 1)
            ->assertJsonPath('users.0.id', $eligible->id)
            ->assertJsonMissing(['email' => 'pending@example.test']);
    }

    public function test_preview_renders_the_same_safe_branded_email_layout(): void
    {
        $admin = $this->createUser(['role' => 1]);

        $this->actingAs($admin)
            ->post(route('admin_email_users_preview'), [
                'subject' => 'Account update',
                'heading' => 'A note for you',
                'message' => '<p>Review <strong>your account</strong>.</p><script>alert(1)</script>',
            ])
            ->assertOk()
            ->assertSee('A note for you')
            ->assertSee('<strong>your account</strong>', false)
            ->assertSee(config('email_branding.logo_url'))
            ->assertDontSee('<script', false);
    }

    public function test_queued_job_rechecks_eligibility_before_sending(): void
    {
        Mail::fake();
        $user = $this->createUser(['verify_status' => 1]);
        $job = new SendAdminEmail('batch-eligible', $user->id, 'Account update', 'A note for you', '<p>Review your account.</p>');

        $job->handle();
        Mail::assertSent(\App\Mail\AdminEmail::class);

        $user->update(['verify_status' => 0]);
        $job->handle();
        Mail::assertSent(\App\Mail\AdminEmail::class, 1);
    }

    public function test_admin_can_queue_selected_and_individual_recipients_once(): void
    {
        Queue::fake();
        $admin = $this->createUser(['role' => 1]);
        $first = $this->createUser(['verify_status' => 1]);
        $second = $this->createUser(['verify_status' => 1]);
        $unverified = $this->createUser(['verify_status' => 0]);

        $nonce = $this->openEmailPageAs($admin);

        $payload = $this->composition($nonce, 'selected', [$first->id, $second->id]);
        $this->actingAs($admin)->post(route('admin_email_users_send'), $payload)
            ->assertRedirect(route('admin_email_users'))
            ->assertSessionHas('success', 'Email queued for 2 eligible recipient(s).');

        Queue::assertPushed(SendAdminEmail::class, 2);
        Queue::assertPushed(SendAdminEmail::class, fn (SendAdminEmail $job) => $job->userId === $first->id || $job->userId === $second->id);
        Queue::assertNotPushed(SendAdminEmail::class, fn (SendAdminEmail $job) => $job->userId === $unverified->id);

        $nonce = $this->openEmailPageAs($admin);
        $this->actingAs($admin)->post(route('admin_email_users_send'), $this->composition($nonce, 'individual', [], $first->id))
            ->assertRedirect(route('admin_email_users'));

        Queue::assertPushed(SendAdminEmail::class, 3);
    }

    public function test_all_mode_queues_exactly_the_eligible_customer_count_and_rejects_replay(): void
    {
        Queue::fake();
        $admin = $this->createUser(['role' => 1]);
        $first = $this->createUser(['verify_status' => 1]);
        $second = $this->createUser(['verify_status' => 1]);
        $this->createUser(['verify_status' => 0]);

        $nonce = $this->openEmailPageAs($admin);
        $payload = $this->composition($nonce, 'all');

        $this->actingAs($admin)->post(route('admin_email_users_send'), $payload)
            ->assertRedirect(route('admin_email_users'))
            ->assertSessionHas('success', 'Email queued for 2 eligible recipient(s).');

        Queue::assertPushed(SendAdminEmail::class, 2);
        Queue::assertPushed(SendAdminEmail::class, fn (SendAdminEmail $job) => $job->userId === $first->id || $job->userId === $second->id);

        $this->actingAs($admin)->post(route('admin_email_users_send'), $payload)
            ->assertSessionHasErrors('form_nonce');
        Queue::assertPushed(SendAdminEmail::class, 2);
    }

    public function test_bulk_dispatch_persists_jobs_in_the_database_queue(): void
    {
        $admin = $this->createUser(['role' => 1]);
        $this->createUser(['verify_status' => 1]);
        $nonce = $this->openEmailPageAs($admin);

        $this->actingAs($admin)->post(
            route('admin_email_users_send'),
            $this->composition($nonce, 'all')
        )->assertRedirect(route('admin_email_users'));

        $this->assertDatabaseCount('jobs', 1);
    }

    public function test_non_admin_cannot_access_email_management(): void
    {
        $user = $this->createUser(['role' => 0]);

        $this->actingAs($user)->get(route('admin_email_users'))
            ->assertRedirect();
    }

    private function openEmailPageAs(User $admin): string
    {
        $this->actingAs($admin)->get(route('admin_email_users'))->assertOk();

        return (string) session('admin_email_form_nonce');
    }

    private function composition(string $nonce, string $mode, array $userIds = [], ?int $recipientId = null): array
    {
        $payload = [
            'form_nonce' => $nonce,
            'recipient_mode' => $mode,
            'subject' => 'Account update',
            'heading' => 'A note for you',
            'message' => '<p>Review your account.</p>',
        ];

        if ($mode === 'selected') {
            $payload['user_ids'] = $userIds;
        } elseif ($mode === 'individual') {
            $payload['recipient_id'] = $recipientId;
        }

        return $payload;
    }

    private function createUser(array $attributes = []): User
    {
        static $counter = 0;
        $counter++;

        return User::create(array_merge([
            'first_name' => 'Test',
            'last_name' => 'User ' . $counter,
            'email' => 'user' . $counter . '@example.test',
            'phone' => '1000000' . $counter,
            'balance' => 0,
            'sub_balance' => 0,
            'password' => 'test-password',
            'gender' => 'other',
            'country' => 'US',
            'verify_status' => 0,
            'role' => 0,
            'account_status' => 'None',
        ], $attributes));
    }
}
