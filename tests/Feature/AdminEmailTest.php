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

    public function test_admin_can_search_customer_recipients_regardless_of_kyc_or_email_verification(): void
    {
        $admin = $this->createUser([
            'role' => 1,
            'first_name' => 'Ada',
            'last_name' => 'Admin',
            'email' => 'admin@example.test',
        ]);
        $pending = $this->createUser([
            'first_name' => 'Pending',
            'email' => 'pending@example.test',
            'verify_status' => 1,
            'email_verified_at' => null,
        ]);
        $approved = $this->createUser([
            'first_name' => 'Approved',
            'email' => 'approved@example.test',
            'verify_status' => 2,
            'email_verified_at' => null,
        ]);
        $unverified = $this->createUser([
            'first_name' => 'Unverified',
            'email' => 'unverified@example.test',
            'verify_status' => 0,
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($admin)
            ->get(route('admin_email_users_search', ['q' => 'example']))
            ->assertOk()
            ->assertJsonPath('total', 3)
            ->assertJsonMissing(['email' => 'admin@example.test']);

        $this->assertEqualsCanonicalizing(
            [$pending->id, $approved->id, $unverified->id],
            collect($response->json('users'))->pluck('id')->all()
        );
    }

    public function test_search_matches_first_name_last_name_full_name_and_email_case_insensitively(): void
    {
        $admin = $this->createUser(['role' => 1]);
        $user = $this->createUser([
            'first_name' => 'Noelani',
            'last_name' => 'Lancaster',
            'email' => 'perryweb17@gmail.com',
            'verify_status' => 0,
            'email_verified_at' => null,
        ]);
        $this->createUser([
            'first_name' => 'Someone',
            'last_name' => 'Else',
            'email' => 'someone@example.test',
        ]);

        $terms = [
            'Noel',
            'nOeLaNi',
            'Lancaster',
            'lanc',
            'Noelani Lancaster',
            'noelani   lancaster',
            'perryweb',
            'PERRYWEB17@GMAIL.COM',
        ];

        foreach ($terms as $term) {
            $this->actingAs($admin)
                ->get(route('admin_email_users_search', ['q' => $term]))
                ->assertOk()
                ->assertJsonPath('total', 1)
                ->assertJsonPath('users.0.id', $user->id)
                ->assertJsonPath('users.0.first_name', 'Noelani')
                ->assertJsonPath('users.0.last_name', 'Lancaster')
                ->assertJsonPath('users.0.email', 'perryweb17@gmail.com');
        }
    }

    public function test_search_total_is_the_number_of_matching_customers(): void
    {
        $admin = $this->createUser(['role' => 1]);
        $this->createUser(['first_name' => 'Alpha', 'last_name' => 'Customer']);
        $this->createUser(['first_name' => 'Beta', 'last_name' => 'Customer']);
        $this->createUser(['first_name' => 'Gamma', 'last_name' => 'Other']);

        $this->actingAs($admin)
            ->get(route('admin_email_users_search', ['q' => 'Customer']))
            ->assertOk()
            ->assertJsonPath('total', 2)
            ->assertJsonCount(2, 'users');

        $this->actingAs($admin)
            ->get(route('admin_email_users_search'))
            ->assertOk()
            ->assertJsonPath('total', 3)
            ->assertJsonCount(3, 'users');
    }

    public function test_email_page_displays_count_from_the_shared_eligibility_query(): void
    {
        $admin = $this->createUser(['role' => 1]);
        $this->createUser(['verify_status' => 0]);
        $this->createUser(['verify_status' => 2]);

        $this->actingAs($admin)
            ->get(route('admin_email_users'))
            ->assertOk()
            ->assertViewHas('eligibleCount', 2);
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
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function test_queued_job_rechecks_customer_eligibility_before_sending(): void
    {
        Mail::fake();
        $user = $this->createUser(['verify_status' => 0, 'email_verified_at' => null]);
        $job = new SendAdminEmail('batch-eligible', $user->id, 'Account update', 'A note for you', '<p>Review your account.</p>');

        $job->handle();
        Mail::assertSent(\App\Mail\AdminEmail::class);

        $user->update(['role' => 1]);
        $job->handle();
        Mail::assertSent(\App\Mail\AdminEmail::class, 1);
    }

    public function test_admin_can_queue_selected_and_individual_recipients_regardless_of_kyc_status(): void
    {
        Queue::fake();
        $admin = $this->createUser(['role' => 1]);
        $first = $this->createUser(['verify_status' => 0, 'email_verified_at' => null]);
        $second = $this->createUser(['verify_status' => 2, 'email_verified_at' => null]);

        $nonce = $this->openEmailPageAs($admin);

        $payload = $this->composition($nonce, 'selected', [$first->id, $second->id]);
        $this->actingAs($admin)->post(route('admin_email_users_send'), $payload)
            ->assertRedirect(route('admin_email_users'))
            ->assertSessionHas('success', 'Email queued for 2 eligible recipient(s).');

        Queue::assertPushed(SendAdminEmail::class, 2);
        Queue::assertPushed(SendAdminEmail::class, fn (SendAdminEmail $job) => $job->userId === $first->id || $job->userId === $second->id);

        $nonce = $this->openEmailPageAs($admin);
        $this->actingAs($admin)->post(route('admin_email_users_send'), $this->composition($nonce, 'individual', [], $first->id))
            ->assertRedirect(route('admin_email_users'))
            ->assertSessionHas('success', 'Email queued for 1 eligible recipient(s).');

        Queue::assertPushed(SendAdminEmail::class, 3);
    }

    public function test_selected_and_individual_recipients_cannot_include_administrators(): void
    {
        Queue::fake();
        $admin = $this->createUser(['role' => 1]);
        $customer = $this->createUser(['verify_status' => 0]);

        $nonce = $this->openEmailPageAs($admin);
        $this->actingAs($admin)
            ->post(route('admin_email_users_send'), $this->composition($nonce, 'selected', [$customer->id, $admin->id]))
            ->assertSessionHasErrors('user_ids');

        Queue::assertNothingPushed();

        $nonce = $this->openEmailPageAs($admin);
        $this->actingAs($admin)
            ->post(route('admin_email_users_send'), $this->composition($nonce, 'individual', [], $admin->id))
            ->assertSessionHasErrors('user_ids');

        Queue::assertNothingPushed();
    }

    public function test_all_mode_queues_exactly_the_eligible_customer_count_and_rejects_replay(): void
    {
        Queue::fake();
        $admin = $this->createUser(['role' => 1]);
        $first = $this->createUser(['verify_status' => 0, 'email_verified_at' => null]);
        $second = $this->createUser(['verify_status' => 1, 'email_verified_at' => null]);
        $third = $this->createUser(['verify_status' => 2, 'email_verified_at' => null]);

        $nonce = $this->openEmailPageAs($admin);
        $payload = $this->composition($nonce, 'all');

        $this->actingAs($admin)->post(route('admin_email_users_send'), $payload)
            ->assertRedirect(route('admin_email_users'))
            ->assertSessionHas('success', 'Email queued for 3 eligible recipient(s).');

        Queue::assertPushed(SendAdminEmail::class, 3);
        Queue::assertPushed(SendAdminEmail::class, fn (SendAdminEmail $job) => in_array($job->userId, [$first->id, $second->id, $third->id], true));
        Queue::assertNotPushed(SendAdminEmail::class, fn (SendAdminEmail $job) => $job->userId === $admin->id);

        $this->actingAs($admin)->post(route('admin_email_users_send'), $payload)
            ->assertSessionHasErrors('form_nonce');
        Queue::assertPushed(SendAdminEmail::class, 3);
    }

    public function test_bulk_dispatch_persists_jobs_in_the_database_queue(): void
    {
        $admin = $this->createUser(['role' => 1]);
        $this->createUser(['verify_status' => 0, 'email_verified_at' => null]);
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
