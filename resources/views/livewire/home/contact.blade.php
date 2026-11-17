<div>
    @if ($sent)
        <div class="form-banner form-banner--success auth-alert" role="status" aria-live="polite">
            <x-guest.icon name="check-circle" :size="18" />
            <span>
                <strong>Message sent.</strong>
                Thanks — your message has been passed to the support team. If you do not hear back,
                email {{ config('app.Admin_email') }} directly.
            </span>
        </div>
    @endif

    @error('send')
        <div class="form-banner form-banner--error auth-alert" role="alert">
            <x-guest.icon name="alert" :size="18" />
            <span>
                <strong>Message not sent.</strong>
                {{ $message }}
            </span>
        </div>
    @enderror

    <form class="form" wire:submit="send" novalidate>
        <div class="form-row">
            <div class="field">
                <label class="field__label" for="contact-name">Your name</label>
                <div class="field__control">
                    <input
                        id="contact-name"
                        class="input @error('name') is-invalid @enderror"
                        type="text"
                        name="name"
                        wire:model.blur="name"
                        autocomplete="name"
                        placeholder="Jane Doe"
                        maxlength="80"
                        @error('name') aria-invalid="true" aria-describedby="contact-name-error" @enderror
                    >
                </div>
                @error('name')
                    <p class="field__error" id="contact-name-error">
                        <x-guest.icon name="alert" :size="13" /> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="field">
                <label class="field__label" for="contact-email">Email address</label>
                <div class="field__control">
                    <input
                        id="contact-email"
                        class="input @error('email') is-invalid @enderror"
                        type="email"
                        name="email"
                        wire:model.blur="email"
                        autocomplete="email"
                        inputmode="email"
                        placeholder="you@example.com"
                        maxlength="255"
                        @error('email') aria-invalid="true" aria-describedby="contact-email-error" @enderror
                    >
                </div>
                @error('email')
                    <p class="field__error" id="contact-email-error">
                        <x-guest.icon name="alert" :size="13" /> {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="field">
            <label class="field__label" for="contact-topic">What is this about?</label>
            <div class="field__control">
                <select id="contact-topic" class="select" name="topic" wire:model="topic">
                    <option>General question</option>
                    <option>Account &amp; verification</option>
                    <option>Deposits &amp; withdrawals</option>
                    <option>Plans &amp; services</option>
                    <option>Virtual card</option>
                    <option>Technical issue</option>
                    <option>Something else</option>
                </select>
                <span class="field__chevron"><x-guest.icon name="chevron-down" :size="16" /></span>
            </div>
            @error('topic')
                <p class="field__error"><x-guest.icon name="alert" :size="13" /> {{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="contact-message">
                Message
                <span>{{ strlen($message) }}/2000</span>
            </label>
            <div class="field__control">
                <textarea
                    id="contact-message"
                    class="textarea @error('message') is-invalid @enderror"
                    name="message"
                    wire:model.blur="message"
                    rows="6"
                    maxlength="2000"
                    placeholder="Tell us what you need help with. Do not include your password or full card details."
                    @error('message') aria-invalid="true" aria-describedby="contact-message-error" @enderror
                ></textarea>
            </div>
            @error('message')
                <p class="field__error" id="contact-message-error">
                    <x-guest.icon name="alert" :size="13" /> {{ $message }}
                </p>
            @enderror
            <p class="field__hint">
                Include your account email and the relevant transaction reference where possible.
                Never send your password, PIN or full card number.
            </p>
        </div>

        <div class="form__actions">
            <button type="submit" class="btn btn--primary" wire:loading.attr="disabled" wire:target="send">
                <span wire:loading.remove wire:target="send">Send message</span>
                <span wire:loading wire:target="send">Sending…</span>
                <x-guest.icon name="arrow-right" :size="16" wire:loading.remove wire:target="send" />
            </button>
            <p class="form__legal">
                We use your details only to reply to this message. See the
                <a href="{{ route('terms') }}">terms of use</a>.
            </p>
        </div>
    </form>
</div>
