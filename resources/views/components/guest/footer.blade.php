@php
    $supportEmail = config('app.Admin_email');
@endphp

<footer class="site-footer">
    <div class="container">
        <div class="site-footer__top">
            <div class="site-footer__brand">
                <x-guest.brand :href="url('/')" variant="light" />
                <p>
                    A digital finance platform for managing supported assets, tracking account activity
                    and exploring investment plans from one clearly organised account.
                </p>
                <a class="site-footer__email" href="mailto:{{ $supportEmail }}">
                    <x-guest.icon name="mail" :size="16" /> {{ $supportEmail }}
                </a>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__title">Platform</p>
                <a href="{{ url('/') }}#platform">Portfolio overview</a>
                <a href="{{ url('/') }}#products">Products</a>
                <a href="{{ route('funding') }}">Plans &amp; services</a>
                <a href="{{ url('/') }}#how-it-works">How it works</a>
                <a href="{{ route('register') }}">Open an account</a>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__title">Support</p>
                <a href="{{ route('faq') }}">FAQ</a>
                <a href="{{ route('contact') }}">Contact us</a>
                <a href="{{ route('login') }}">Client sign in</a>
                <a href="{{ route('forgot_password') }}">Forgot password</a>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__title">Legal</p>
                <a href="{{ route('terms') }}">Terms of use</a>
                <a href="{{ route('terms') }}#risk-disclosure">Risk disclosure</a>
                <a href="{{ route('terms') }}#company-information">Company information</a>
                <a href="{{ route('terms') }}#refund-policy">Refund policy</a>
            </div>
        </div>

        <div class="site-footer__risk">
            <x-guest.icon name="alert" :size="18" />
            <p>
                Trading and investing involve risk. The value of investments can go down as well as up, and you
                may lose some or all of your capital. Target returns, projections and staking estimates shown on
                the platform are not guarantees. Nothing on this website is personal investment, legal or tax advice.
                Only commit funds you can afford to lose. <a href="{{ route('terms') }}#risk-disclosure">Read the full risk disclosure</a>.
            </p>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>
                {{ config('app.name') }} is operated by MCF Group FZCO (Reg. No. DSCO-FZCO-24876) and
                RSRD Limited. <a href="{{ route('terms') }}#company-information">Company information</a>.
            </p>
        </div>
    </div>
</footer>
