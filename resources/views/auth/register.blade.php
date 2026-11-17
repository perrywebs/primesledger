<x-guest.auth-layout
    title="Create an account"
    description="Open a free PrimesLedger account to review supported wallets, structured investment plans and account activity. No deposit required."
    wide
    asideTitle="Open an account before you fund it."
    asideText="Registration is free. Complete verification, explore the dashboard and only add funds when you have read the terms and decided the risk is right for you.">

    @if (session()->has('error'))
        <div class="form-banner form-banner--error auth-alert" role="alert">
            <x-guest.icon name="alert" :size="18" />
            <span>
                <strong>Could not create account.</strong>
                {{ session('error') }}
            </span>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="form-banner form-banner--success auth-alert" role="status">
            <x-guest.icon name="check-circle" :size="18" />
            <span>
                <strong>Account created.</strong>
                {{ session('success') }}
            </span>
        </div>
    @endif

    <livewire:auth.register />
</x-guest.auth-layout>
