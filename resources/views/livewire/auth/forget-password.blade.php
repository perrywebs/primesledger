<div>
    <header class="auth-card__head">
        <h1>Forgot your password?</h1>
        <p>Enter the email address registered on your account and we will send a single-use reset link.</p>
    </header>

    <form class="auth-form" wire:submit.throttle.1000.prevent="resetPassword" method="post">
        <div class="field">
            <label class="field__label" for="forgot-email">Email address</label>
            <div class="field__control">
                <input
                    id="forgot-email"
                    class="input"
                    type="email"
                    name="email"
                    wire:model.blur="email"
                    placeholder="you@example.com"
                    autocomplete="email"
                    inputmode="email"
                    required
                    @error('email') aria-invalid="true" aria-describedby="forgot-email-error" @enderror
                >
            </div>
            @error('email')
                <p class="field__error" id="forgot-email-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <button class="btn btn--primary btn--block auth-submit" type="submit"
            wire:loading.attr="disabled" wire:target="resetPassword">
            <span wire:loading.remove wire:target="resetPassword">Send reset link</span>
            <span wire:loading wire:target="resetPassword">Sending…</span>
            <x-guest.icon name="arrow-right" :size="16" wire:loading.remove wire:target="resetPassword" />
        </button>

        <p class="field__hint">
            A reset link is sent when the address matches a registered account. If the email does
            not arrive, check your spam folder and contact support.
        </p>
    </form>

    <p class="auth-alt">
        Remembered your password?
        <a href="{{ route('login') }}">Back to sign in</a>
    </p>
</div>
