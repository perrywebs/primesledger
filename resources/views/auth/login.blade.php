<x-guest.auth-layout
    title="Sign in"
    description="Sign in to your PrimesLedger account to view balances, plans, wallets and withdrawal requests."
    asideTitle="Welcome back to your account."
    asideText="Your balances, supported wallets, active plans and transaction history are waiting in the dashboard.">

    @if (session()->has('error'))
        <div class="form-banner form-banner--error auth-alert" role="alert">
            <x-guest.icon name="alert" :size="18" />
            <span>
                <strong>Sign-in failed.</strong>
                {{ session('error') }}
            </span>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="form-banner form-banner--success auth-alert" role="status">
            <x-guest.icon name="check-circle" :size="18" />
            <span>
                <strong>Done.</strong>
                {{ session('success') }}
            </span>
        </div>
    @endif

    <livewire:auth.login />
</x-guest.auth-layout>
