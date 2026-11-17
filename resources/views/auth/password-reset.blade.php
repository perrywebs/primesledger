<x-guest.auth-layout
    title="Set a new password"
    description="Choose a new password for your PrimesLedger account using your single-use reset link."
    asideTitle="Choose a new password."
    asideText="Use between 6 and 15 characters. For your security, the reset link becomes invalid after the password is changed.">

    @if (session()->has('error'))
        <div class="form-banner form-banner--error auth-alert" role="alert">
            <x-guest.icon name="alert" :size="18" />
            <span>
                <strong>Password not changed.</strong>
                {{ session('error') }}
            </span>
        </div>
    @endif

    <header class="auth-card__head">
        <h1>Set a new password</h1>
        <p>Your reset link is valid for this request only. Choose a password you do not use elsewhere.</p>
    </header>

    <form class="auth-form" method="post"
        action="{{ route('password_reset_post', [$user_token->email, $user_token->token]) }}">
        @csrf

        <div class="field">
            <label class="field__label" for="reset-password">
                New password
                <span>6–15 characters</span>
            </label>
            <div class="field__control field__control--eye">
                <input
                    id="reset-password"
                    class="input"
                    type="password"
                    name="password"
                    placeholder="New password"
                    autocomplete="new-password"
                    minlength="6"
                    maxlength="15"
                    required
                    @error('password') aria-invalid="true" aria-describedby="reset-password-error" @enderror
                >
                <button type="button" class="field__eye" data-password-toggle="reset-password"
                    aria-label="Show password" aria-pressed="false">
                    <x-guest.icon name="eye" :size="17" class="icon-show" />
                    <x-guest.icon name="eye-off" :size="17" class="icon-hide" />
                </button>
            </div>
            @error('password')
                <p class="field__error" id="reset-password-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="reset-password-confirm">Confirm new password</label>
            <div class="field__control field__control--eye">
                <input
                    id="reset-password-confirm"
                    class="input"
                    type="password"
                    name="password_confirmation"
                    placeholder="Repeat the new password"
                    autocomplete="new-password"
                    minlength="6"
                    maxlength="15"
                    required
                    @error('password_confirmation') aria-invalid="true" aria-describedby="reset-password-confirm-error" @enderror
                >
                <button type="button" class="field__eye" data-password-toggle="reset-password-confirm"
                    aria-label="Show password" aria-pressed="false">
                    <x-guest.icon name="eye" :size="17" class="icon-show" />
                    <x-guest.icon name="eye-off" :size="17" class="icon-hide" />
                </button>
            </div>
            @error('password_confirmation')
                <p class="field__error" id="reset-password-confirm-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <button class="btn btn--primary btn--block auth-submit" type="submit"
            onclick="this.disabled=true;this.querySelector('[data-label]').textContent='Saving…';">
            <span data-label>Save new password</span>
            <x-guest.icon name="arrow-right" :size="16" />
        </button>
    </form>

    <p class="auth-alt">
        Changed your mind? <a href="{{ route('login') }}">Back to sign in</a>
    </p>
</x-guest.auth-layout>
