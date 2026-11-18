@props([
    'title' => null,
    'description' => null,
    'robots' => 'index,follow',
    'image' => 'assets/guest/img/planning-session.jpg',
    'bodyClass' => '',
])

@php
    $site = config('app.name');
    $pageTitle = $title ? $title . ' | ' . $site : $site . ' | Digital asset management and investment tools';
    $metaDescription = $description ?: 'Manage digital assets, track portfolio activity and explore investment plans from one clearly organised PrimesLedger account.';
    $canonical = url()->current();
    $ogImage = str_starts_with($image, 'http') ? $image : asset($image);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0B2430">

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="robots" content="{{ $robots }}">
    <link rel="canonical" href="{{ $canonical }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $site }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="{{ $site }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" href="{{ asset('assets/guest/brand/favicon.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/guest/css/guest.css') }}?v=4">

    <script>document.documentElement.classList.add('js');</script>

    @stack('head')
</head>

<body class="site-body {{ $bodyClass }}">
    <a class="skip-link" href="#main">Skip to main content</a>

    <x-guest.utility-bar />
    <x-guest.nav />

    <main id="main">
        {{ $slot }}
    </main>

    <x-guest.footer />

    <script src="{{ asset('assets/guest/js/guest.js') }}?v=3" defer></script>
    @stack('scripts')
</body>
</html>
