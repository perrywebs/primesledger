@props([
    'title' => 'Account access',
    'description' => 'Access your PrimesLedger account.',
    'wide' => false,
    'asideTitle' => 'One account for the whole picture.',
    'asideText' => 'Track balances, supported wallets, active plans and withdrawal requests from a single clearly organised dashboard.',
])

@php
    $site = config('app.name');
    $pageTitle = $title . ' | ' . $site;
    $canonical = url()->current();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0B2430">
    <meta name="robots" content="noindex,nofollow">

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ $canonical }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $site }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ asset('assets/guest/img/planning-session.jpg') }}">

    <link rel="icon" href="{{ asset('assets/guest/brand/favicon.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/guest/css/guest.css') }}?v=3">

    <script>document.documentElement.classList.add('js');</script>

    @stack('head')
</head>
<body class="site-body auth-body">
    <a class="skip-link" href="#auth-main">Skip to form</a>

    <div class="auth-page">
        <main class="auth-main" id="auth-main">
            <div class="auth-main__bar">
                <x-guest.brand :href="url('/')" />

                <a href="{{ url('/') }}" class="auth-back" aria-label="Back to website">
                    <x-guest.icon name="arrow-right" :size="15" style="transform: rotate(180deg)" />
                    <span>Back to website</span>
                </a>
            </div>

            <div class="auth-main__body">
                <div class="auth-card {{ $wide ? 'auth-card--wide' : '' }}">
                    {{ $slot }}

                    <div class="auth-foot">
                        <span>&copy; {{ date('Y') }} {{ $site }}</span>
                        <span class="auth-foot__dot" aria-hidden="true"></span>
                        <a href="{{ route('terms') }}">Terms</a>
                        <span class="auth-foot__dot" aria-hidden="true"></span>
                        <a href="{{ route('terms') }}#risk-disclosure">Risk disclosure</a>
                        <span class="auth-foot__dot" aria-hidden="true"></span>
                        <a href="{{ route('contact') }}">Support</a>
                    </div>
                </div>
            </div>
        </main>

        <aside class="auth-aside" aria-label="About PrimesLedger">
            <x-guest.brand :href="url('/')" variant="light" />

            <div class="auth-aside__body">
                <p class="eyebrow" style="color: #59D3A2;">PrimesLedger account</p>
                <h2>{{ $asideTitle }}</h2>
                <p>{{ $asideText }}</p>

                <ul class="auth-aside__list">
                    <li>
                        <x-guest.icon name="shield-check" :size="18" />
                        <span>
                            <strong>Verification built in</strong>
                            <span>Identity checks before key features are enabled</span>
                        </span>
                    </li>
                    <li>
                        <x-guest.icon name="file-text" :size="18" />
                        <span>
                            <strong>Activity you can review</strong>
                            <span>Deposits, plans, stakes and withdrawals recorded</span>
                        </span>
                    </li>
                    <li>
                        <x-guest.icon name="clock" :size="18" />
                        <span>
                            <strong>Withdrawals reviewed</strong>
                            <span>Requests checked before funds are released</span>
                        </span>
                    </li>
                </ul>
            </div>

            <p class="auth-aside__foot">
                Capital at risk. Target returns and staking estimates are not guarantees.
                <a href="{{ route('terms') }}#risk-disclosure">Read the risk disclosure</a>.
            </p>
        </aside>
    </div>

    <script src="{{ asset('assets/guest/js/guest.js') }}?v=3" defer></script>
    @stack('scripts')
</body>
</html>
