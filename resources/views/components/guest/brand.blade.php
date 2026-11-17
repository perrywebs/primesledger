@props([
    'variant' => 'default',
    'href' => null,
])

@php
    $tag = $href ? 'a' : 'span';
@endphp

<{{ $tag }} @if ($href) href="{{ $href }}" @endif
    {{ $attributes->class(['brand', 'brand--light' => $variant === 'light']) }}
    aria-label="{{ config('app.name') }} home">
    <span class="brand__mark" aria-hidden="true">
        <svg viewBox="0 0 32 32" width="30" height="30" fill="none">
            <rect width="32" height="32" rx="8.5" fill="currentColor"/>
            <path d="M9 22.5v-7M15.5 22.5v-12M22 22.5v-16" stroke="{{ $variant === 'light' ? '#0B2430' : '#fff' }}" stroke-width="2.4"
                stroke-linecap="round"/>
            <circle cx="22" cy="9" r="2.1" fill="#59D3A2"/>
        </svg>
    </span>
    <span class="brand__name">Primes<span class="brand__thin">Ledger</span></span>
</{{ $tag }}>
