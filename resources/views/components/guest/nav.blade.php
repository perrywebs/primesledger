@php
    $home = url('/');
    $isFunding = request()->routeIs('funding');
    $isFaq = request()->routeIs('faq');
    $isContact = request()->routeIs('contact');
    $isTerms = request()->routeIs('terms');
@endphp

<header class="site-header" data-site-header>
    <div class="container site-header__inner">
        <x-guest.brand :href="$home" />

        <nav class="nav-links" aria-label="Primary navigation">
            <a href="{{ $home }}#platform">Platform</a>
            <a href="{{ $home }}#products">Products</a>
            <a href="{{ route('funding') }}" @if ($isFunding) aria-current="page" @endif>Plans &amp; services</a>
            <a href="{{ route('faq') }}" @if ($isFaq) aria-current="page" @endif>FAQ</a>
            <a href="{{ route('contact') }}" @if ($isContact) aria-current="page" @endif>Contact</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="nav-signin">Sign in</a>
            <a href="{{ route('register') }}" class="btn btn--primary btn--sm">
                Open an account
                <x-guest.icon name="arrow-right" :size="15" />
            </a>
            <button type="button" class="nav-toggle" data-nav-toggle aria-expanded="false"
                aria-controls="mobile-navigation" aria-label="Open menu">
                <x-guest.icon name="menu" :size="23" />
            </button>
        </div>
    </div>
</header>

<div class="nav-overlay" data-nav-overlay hidden></div>

<div class="mobile-nav" id="mobile-navigation" data-mobile-nav inert aria-label="Mobile navigation">
    <div class="mobile-nav__head">
        <x-guest.brand :href="$home" />
        <button type="button" class="mobile-nav__close" data-nav-close aria-label="Close menu">
            <x-guest.icon name="x" :size="22" />
        </button>
    </div>

    <nav class="mobile-nav__links" aria-label="Mobile primary navigation">
        <a href="{{ $home }}#platform">Platform <x-guest.icon name="arrow-up-right" :size="17" /></a>
        <a href="{{ $home }}#products">Products <x-guest.icon name="arrow-up-right" :size="17" /></a>
        <a href="{{ route('funding') }}" @if ($isFunding) aria-current="page" @endif>Plans &amp; services <x-guest.icon name="arrow-up-right" :size="17" /></a>
        <a href="{{ route('faq') }}" @if ($isFaq) aria-current="page" @endif>FAQ <x-guest.icon name="arrow-up-right" :size="17" /></a>
        <a href="{{ route('contact') }}" @if ($isContact) aria-current="page" @endif>Contact <x-guest.icon name="arrow-up-right" :size="17" /></a>
        <a href="{{ route('terms') }}" @if ($isTerms) aria-current="page" @endif>Terms &amp; risk <x-guest.icon name="arrow-up-right" :size="17" /></a>
    </nav>

    <div class="mobile-nav__actions">
        <a href="{{ route('login') }}" class="btn btn--secondary btn--block">
            <x-guest.icon name="log-in" :size="17" /> Sign in
        </a>
        <a href="{{ route('register') }}" class="btn btn--primary btn--block">
            Open an account <x-guest.icon name="arrow-right" :size="16" />
        </a>
    </div>

    <div class="mobile-nav__foot">
        <span>Questions before you start?</span>
        <a href="{{ route('contact') }}">{{ config('app.Admin_email') }}</a>
    </div>
</div>
