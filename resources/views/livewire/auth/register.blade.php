<div>
    <header class="auth-card__head">
        <h1>Create your account</h1>
        <p>Register to review the dashboard and available products. No deposit is required.</p>
    </header>

    <form class="auth-form" wire:submit.throttle.1000.prevent="register" method="post">
        <div class="auth-form__row">
            <div class="field">
                <label class="field__label" for="register-first-name">First name</label>
                <div class="field__control">
                    <input
                        id="register-first-name"
                        class="input"
                        type="text"
                        name="first_name"
                        wire:model="first_name"
                        placeholder="Jane"
                        autocomplete="given-name"
                        required
                        @error('first_name') aria-invalid="true" aria-describedby="register-first-name-error" @enderror
                    >
                </div>
                @error('first_name')
                    <p class="field__error" id="register-first-name-error">
                        <x-guest.icon name="alert" :size="13" /> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="field">
                <label class="field__label" for="register-last-name">Last name</label>
                <div class="field__control">
                    <input
                        id="register-last-name"
                        class="input"
                        type="text"
                        name="last_name"
                        wire:model="last_name"
                        placeholder="Doe"
                        autocomplete="family-name"
                        required
                        @error('last_name') aria-invalid="true" aria-describedby="register-last-name-error" @enderror
                    >
                </div>
                @error('last_name')
                    <p class="field__error" id="register-last-name-error">
                        <x-guest.icon name="alert" :size="13" /> {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="field">
            <label class="field__label" for="register-email">Email address</label>
            <div class="field__control">
                <input
                    id="register-email"
                    class="input"
                    type="text"
                    name="email"
                    wire:model="email"
                    placeholder="you@example.com"
                    autocomplete="email"
                    autocapitalize="none"
                    spellcheck="false"
                    required
                    @error('email') aria-invalid="true" aria-describedby="register-email-error" @enderror
                >
            </div>
            @error('email')
                <p class="field__error" id="register-email-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="register-phone">Phone number</label>
            <div class="field__control">
                <input
                    id="register-phone"
                    class="input"
                    type="tel"
                    inputmode="tel"
                    name="phone"
                    wire:model="phone"
                    placeholder="+234 800 000 0000"
                    autocomplete="tel"
                    required
                    @error('phone') aria-invalid="true" aria-describedby="register-phone-error" @enderror
                >
            </div>
            @error('phone')
                <p class="field__error" id="register-phone-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="register-country">Country</label>
            <div class="field__control">
                <select id="register-country" class="select" name="country" wire:model="country"
                    required @error('country') aria-invalid="true" aria-describedby="register-country-error" @enderror>
                    <option value="">Select country</option>
                    @include('livewire.auth.partials.countries')
                </select>
                <span class="field__chevron"><x-guest.icon name="chevron-down" :size="16" /></span>
            </div>
            @error('country')
                <p class="field__error" id="register-country-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <span class="field__label" id="register-gender-label">Gender</span>
            <div class="auth-seg" role="radiogroup" aria-labelledby="register-gender-label">
                <label>
                    <input type="radio" wire:model="gender" name="gender" value="male" required>
                    <span>Male</span>
                </label>
                <label>
                    <input type="radio" wire:model="gender" name="gender" value="female" required>
                    <span>Female</span>
                </label>
            </div>
            @error('gender')
                <p class="field__error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="register-password">Password</label>
            <div class="field__control field__control--eye">
                <input
                    id="register-password"
                    class="input"
                    type="password"
                    name="password"
                    wire:model="password"
                    placeholder="At least 6 characters"
                    autocomplete="new-password"
                    required
                    @error('password') aria-invalid="true" aria-describedby="register-password-error" @enderror
                >
                <button type="button" class="field__eye" data-password-toggle="register-password"
                    aria-label="Show password" aria-pressed="false">
                    <x-guest.icon name="eye" :size="17" class="icon-show" />
                    <x-guest.icon name="eye-off" :size="17" class="icon-hide" />
                </button>
            </div>
            @error('password')
                <p class="field__error" id="register-password-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="register-password-confirm">Confirm password</label>
            <div class="field__control field__control--eye">
                <input
                    id="register-password-confirm"
                    class="input"
                    type="password"
                    name="password_confirmation"
                    wire:model="password_confirmation"
                    placeholder="Repeat your password"
                    autocomplete="new-password"
                    required
                    @error('password_confirmation') aria-invalid="true" aria-describedby="register-password-confirm-error" @enderror
                >
                <button type="button" class="field__eye" data-password-toggle="register-password-confirm"
                    aria-label="Show password" aria-pressed="false">
                    <x-guest.icon name="eye" :size="17" class="icon-show" />
                    <x-guest.icon name="eye-off" :size="17" class="icon-hide" />
                </button>
            </div>
            @error('password_confirmation')
                <p class="field__error" id="register-password-confirm-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
        </div>

        <label class="checkbox">
            <input type="checkbox" required>
            <span>
                I agree to the <a href="{{ route('terms') }}">terms of use</a> and have read the
                <a href="{{ route('terms') }}#risk-disclosure">risk disclosure</a>.
            </span>
        </label>

        <button class="btn btn--primary btn--block auth-submit" type="submit"
            wire:loading.attr="disabled" wire:target="register">
            <span wire:loading.remove wire:target="register">Create account</span>
            <span wire:loading wire:target="register">Creating account…</span>
            <x-guest.icon name="arrow-right" :size="16" wire:loading.remove wire:target="register" />
        </button>

        <p class="field__hint">
            Account creation is free. Product participation is optional and subject to eligibility
            checks and the terms shown in your account.
        </p>
    </form>

    <p class="auth-alt">
        Already have an account?
        <a href="{{ route('login') }}">Sign in</a>
    </p>
</div>
