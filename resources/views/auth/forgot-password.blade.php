<x-guest.auth-layout
    title="Forgot password"
    description="Request a single-use password reset link for your PrimesLedger account."
    asideTitle="A secure way back in."
    asideText="Password resets use a single-use email link. If you no longer have access to the registered email, contact support instead.">

    @if (session()->has('error'))
        <div class="form-banner form-banner--error auth-alert" role="alert">
            <x-guest.icon name="alert" :size="18" />
            <span>
                <strong>Request not sent.</strong>
                {{ session('error') }}
            </span>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="form-banner form-banner--success auth-alert" role="status">
            <x-guest.icon name="check-circle" :size="18" />
            <span>
                <strong>Check your inbox.</strong>
                {{ session('success') }}
            </span>
        </div>
    @endif

    <livewire:auth.forget-password />
</x-guest.auth-layout>
