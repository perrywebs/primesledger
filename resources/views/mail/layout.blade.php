<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ config('app.name') }}</title>
</head>
<body style="margin:0;padding:0;background:#f3f7f6;font-family:Arial,Helvetica,sans-serif;color:#314b55;-webkit-text-size-adjust:100%;">

@php
    /* ---------- Footer configuration ---------- */
    $socialLinks = array_filter(config('email_branding.social', []));

    $appUrl         = config('app.url');
    $unsubscribeUrl = config('email_branding.unsubscribe_url') ?: $appUrl . '/unsubscribe';
    $preferencesUrl = config('email_branding.preferences_url') ?: $appUrl . '/email/preferences';
    $privacyUrl     = config('email_branding.privacy_url')     ?: $appUrl . '/privacy';
    $termsUrl       = config('email_branding.terms_url')       ?: $appUrl . '/terms';

    /* Brand-coloured SVG icons (24x24) */
    $socialIconSvgs = [
        'Facebook' => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#1877F2" style="display:block;border:0;"><path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.413c0-3.017 1.792-4.684 4.533-4.684 1.313 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.93-1.956 1.886v2.27h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>',

        'Instagram' => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#E4405F" style="display:block;border:0;"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>',

        'LinkedIn' => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#0A66C2" style="display:block;border:0;"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',

        'X'         => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000" style="display:block;border:0;"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>',

        'YouTube'   => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#FF0000" style="display:block;border:0;"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
    ];
    // Aliases so a legacy "Twitter" key still renders the X icon
    $socialIconSvgs['Twitter'] = $socialIconSvgs['X'];
@endphp

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f3f7f6;border-collapse:collapse;">
    <tr>
        <td align="center" style="padding:28px 14px;">
            <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;border-collapse:collapse;">

                <!-- ================= HEADER ================= -->
                <tr>
                    <td align="center" style="padding:20px 24px;background:#ffffff;border-radius:14px 14px 0 0;">
                        <a href="{{ $appUrl }}" style="display:inline-block;text-decoration:none;">
                            <img src="{{ config('email_branding.logo_url') }}" width="170" alt="{{ config('app.name') }}" style="display:block;width:170px;max-width:100%;height:auto;border:0;">
                        </a>
                    </td>
                </tr>

                <!-- ================= BODY ================= -->
                <tr>
                    <td style="padding:34px 38px 38px;background:#ffffff;border-top:1px solid #e8efed;">
                        @yield('email_content')
                    </td>
                </tr>

                <!-- ================= FOOTER ================= -->
                <tr>
                    <td style="padding:0;background:#fafcfb;border-top:1px solid #e8efed;border-radius:0 0 14px 14px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;">

                            <!-- Social icons -->
                            @if ($socialLinks)
                                <tr>
                                    <td align="center" style="padding:26px 28px 22px;">
                                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;">
                                            <tr>
                                                @foreach ($socialLinks as $network => $url)
                                                    @if (!empty($socialIconSvgs[$network]))
                                                        <td style="padding:0 7px;">
                                                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                                                               aria-label="{{ $network }}" title="{{ $network }}"
                                                               style="display:block;text-decoration:none;border:0;outline:none;">
                                                                {!! $socialIconSvgs[$network] !!}
                                                            </a>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            @endif

                            <!-- Company identity -->
                            <tr>
                                <td align="center" style="padding:0 30px;">
                                    <p style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:15px;font-weight:bold;color:#0b2430;letter-spacing:.2px;">
                                        {{ config('app.name') }}
                                    </p>
                                    @if (config('email_branding.description'))
                                        <p style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.65;color:#71858d;">
                                            {{ config('email_branding.description') }}
                                        </p>
                                    @endif
                                    @if (config('email_branding.address'))
                                        <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.65;color:#93a4ab;">
                                            {{ config('email_branding.address') }}
                                        </p>
                                    @endif
                                </td>
                            </tr>

                            <!-- Divider -->
                            <tr>
                                <td style="padding:22px 30px 0;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;">
                                        <tr>
                                            <td style="height:1px;background:#e8efed;font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Quick links -->
                            <tr>
                                <td align="center" style="padding:16px 30px 0;">
                                    <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.9;color:#71858d;">
                                        <a href="{{ $appUrl }}" style="color:#0f6b4a;text-decoration:none;font-weight:bold;">Visit our website</a>
                                        <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                        <a href="{{ $privacyUrl }}" style="color:#0f6b4a;text-decoration:none;">Privacy Policy</a>
                                        <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                        <a href="{{ $termsUrl }}" style="color:#0f6b4a;text-decoration:none;">Terms of Service</a>
                                        @if (config('app.Admin_email'))
                                            <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                            <a href="mailto:{{ config('app.Admin_email') }}" style="color:#0f6b4a;text-decoration:none;">Contact Support</a>
                                        @endif
                                    </p>
                                </td>
                            </tr>

                            <!-- Compliance / consent notice -->
                            <tr>
                                <td align="center" style="padding:16px 30px 0;">
                                    <p style="margin:0 0 8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.7;color:#8a9aa1;">
                                        You are receiving this email because you registered with or have an existing
                                        relationship with {{ config('app.name') }}.
                                    </p>
                                    <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.7;color:#8a9aa1;">
                                        <a href="{{ $unsubscribeUrl }}" style="color:#0f6b4a;text-decoration:underline;">Unsubscribe</a>
                                        <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                        <a href="{{ $preferencesUrl }}" style="color:#0f6b4a;text-decoration:underline;">Manage email preferences</a>
                                        @if (config('app.Admin_email'))
                                            <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                            <a href="mailto:{{ config('app.Admin_email') }}?subject=Email%20preferences" style="color:#0f6b4a;text-decoration:underline;">Email us</a>
                                        @endif
                                    </p>
                                </td>
                            </tr>

                            <!-- Copyright -->
                            <tr>
                                <td align="center" style="padding:18px 30px 28px;">
                                    <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:1.7;color:#a3b2b8;">
                                        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                                    </p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <!-- ================= /FOOTER ================= -->

            </table>
        </td>
    </tr>
</table>
</body>
</html>