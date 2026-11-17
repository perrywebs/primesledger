<div>
    <header class="auth-card__head">
        <h1>Welcome back</h1>
        <p>Sign in to continue to your PrimesLedger account.</p>
    </header>

    <form class="auth-form" wire:submit="login">
        <div class="field">
            <label class="field__label" for="login-email">Email address</label>
            <div class="field__control">
                <input
                    id="login-email"
                    class="input"
                    type="text"
                    name="email"
                    wire:model="email"
                    placeholder="you@example.com"
                    autocomplete="email"
                    autocapitalize="none"
                    spellcheck="false"
                    @error('email') aria-invalid="true" aria-describedby="login-email-error" @enderror
                >
            </div>
            @error('email')
                <p class="field__error" id="login-email-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <div class="field__label">
                <label for="login-password">Password</label>
                <a href="{{ route('forgot_password') }}" style="font-size: 0.78rem; font-weight: 600;">Forgot password?</a>
            </div>
            <div class="field__control field__control--eye">
                <input
                    id="login-password"
                    class="input"
                    type="password"
                    name="password"
                    wire:model="password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    @error('password') aria-invalid="true" aria-describedby="login-password-error" @enderror
                >
                <button type="button" class="field__eye" data-password-toggle="login-password"
                    aria-label="Show password" aria-pressed="false">
                    <x-guest.icon name="eye" :size="17" class="icon-show" />
                    <x-guest.icon name="eye-off" :size="17" class="icon-hide" />
                </button>
            </div>
            @error('password')
                <p class="field__error" id="login-password-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <button class="btn btn--primary btn--block auth-submit" type="submit"
            wire:loading.attr="disabled" wire:target="login">
            <span wire:loading.remove wire:target="login">Sign in</span>
            <span wire:loading wire:target="login">Signing in…</span>
            <x-guest.icon name="arrow-right" :size="16" wire:loading.remove wire:target="login" />
        </button>
    </form>

    <p class="auth-alt">
        New to {{ config('app.name') }}?
        <a href="{{ route('register') }}">Create an account</a>
    </p>
</div>
