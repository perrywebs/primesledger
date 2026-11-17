<x-guest.layout
    title="Contact us"
    description="Contact the PrimesLedger support team about accounts, verification, deposits, withdrawals, plans, staking, virtual cards or security. Never send your password."
    image="assets/guest/img/advisor.jpg">

    <section class="page-hero">
        <div class="container page-hero__inner">
            <div>
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <x-guest.icon name="chevron-down" :size="13" style="transform: rotate(-90deg)" />
                    <span aria-current="page">Contact</span>
                </nav>

                <p class="eyebrow">Support</p>
                <h1>Talk to a person before you commit.</h1>
                <p class="lead">
                    Ask about a fee, a withdrawal, verification or a plan before you put capital at
                    risk. Include the details below so the team can look at the right account the first
                    time.
                </p>
            </div>

            <aside class="page-hero__aside" aria-label="Before you write">
                <p>Before you write</p>
                <ul>
                    <li><x-guest.icon name="check-circle" :size="15" /> Use the email registered on your account</li>
                    <li><x-guest.icon name="check-circle" :size="15" /> Add the relevant transaction reference</li>
                    <li><x-guest.icon name="check-circle" :size="15" /> Never send your password or PIN</li>
                </ul>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="container contact-layout">
            <div class="contact-info">
                <h2>Support that answers the question you asked.</h2>
                <p class="muted">
                    The team handles account, verification, funding and product questions. One clear
                    message with the right context is faster than several short ones.
                </p>

                <div class="contact-channel">
                    <x-guest.icon name="mail" :size="19" />
                    <div>
                        <strong>Email</strong>
                        <span>
                            <a href="mailto:{{ config('app.Admin_email') }}">{{ config('app.Admin_email') }}</a>
                        </span>
                    </div>
                </div>

                <div class="contact-channel">
                    <x-guest.icon name="user" :size="19" />
                    <div>
                        <strong>Account &amp; verification</strong>
                        <span>Include the email registered on your account and the status you can see in the dashboard.</span>
                    </div>
                </div>

                <div class="contact-channel">
                    <x-guest.icon name="credit-card" :size="19" />
                    <div>
                        <strong>Deposits, withdrawals &amp; cards</strong>
                        <span>Include the asset, network, amount and the date shown in your transaction history. Never include a full card number.</span>
                    </div>
                </div>

                <div class="contact-channel">
                    <x-guest.icon name="lock" :size="19" />
                    <div>
                        <strong>Security concerns</strong>
                        <span>
                            If you notice unfamiliar activity, change your password through the
                            <a href="{{ route('forgot_password') }}">password reset page</a> and email support.
                        </span>
                    </div>
                </div>

                <div class="contact-aside-image">
                    <img src="{{ asset('assets/guest/img/advisor.jpg') }}"
                        alt="Support advisor at a desk ready to help a client"
                        width="1200" height="750" loading="lazy" decoding="async">
                </div>

                <div class="callout">
                    <x-guest.icon name="shield-check" :size="17" />
                    <p>
                        <strong>We will never ask for your password.</strong> Treat any request for your
                        password, PIN, one-time code or full card details as suspicious.
                    </p>
                </div>
            </div>

            <div class="form-card">
                <div class="form-card__head">
                    <h2>Send a message</h2>
                    <p>Fields marked in the form are required. You will see a confirmation on this page when it sends.</p>
                </div>

                <livewire:home.contact />
            </div>
        </div>
    </section>

    <section class="trust-strip" aria-label="Support safeguards">
        <div class="container">
            <div class="trust-strip__grid">
                <div class="trust-strip__item">
                    <x-guest.icon name="clock" :size="19" />
                    <div>
                        <strong>Reviewed, not automated</strong>
                        <span>A person reads account-specific questions</span>
                    </div>
                </div>
                <div class="trust-strip__item">
                    <x-guest.icon name="lock" :size="19" />
                    <div>
                        <strong>Credentials stay private</strong>
                        <span>Never send a password or one-time code</span>
                    </div>
                </div>
                <div class="trust-strip__item">
                    <x-guest.icon name="file-text" :size="19" />
                    <div>
                        <strong>Records help</strong>
                        <span>Transaction references speed up a review</span>
                    </div>
                </div>
                <div class="trust-strip__item">
                    <x-guest.icon name="scale" :size="19" />
                    <div>
                        <strong>Not personal advice</strong>
                        <span>Support explains the platform, not your circumstances</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest.layout>
