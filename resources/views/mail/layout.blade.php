<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ config('app.name') }}</title>
</head>

<body
    style="margin:0;padding:0;background:#f3f7f6;font-family:Arial,Helvetica,sans-serif;color:#314b55;-webkit-text-size-adjust:100%;">

    @php
        /* ---------- Footer configuration ---------- */
        $socialLinks = array_filter(config('email_branding.social', []));

        $appUrl = config('app.url');
        $unsubscribeUrl = config('email_branding.unsubscribe_url') ?: $appUrl . '/unsubscribe';
        $preferencesUrl = config('email_branding.preferences_url') ?: $appUrl . '/email/preferences';
        $privacyUrl = config('email_branding.privacy_url') ?: $appUrl . '/privacy';
        $termsUrl = config('email_branding.terms_url') ?: $appUrl . '/terms';

        /* Direct public CDN PNG icons (no local upload required) */
        $socialPngMap = [
            'facebook' => 'https://cdn-icons-png.flaticon.com/512/733/733547.png',
            'instagram' => 'https://cdn-icons-png.flaticon.com/512/2111/2111463.png',
            'linkedin' => 'https://cdn-icons-png.flaticon.com/512/3536/3536505.png',
            'x' => 'https://cdn-icons-png.flaticon.com/512/5969/5969020.png',
            'twitter' => 'https://cdn-icons-png.flaticon.com/512/5969/5969020.png',
            'youtube' => 'https://cdn-icons-png.flaticon.com/512/1384/1384060.png',
        ];
    @endphp

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
        style="background:#f3f7f6;border-collapse:collapse;">
        <tr>
            <td align="center" style="padding:28px 14px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0"
                    style="width:100%;max-width:600px;border-collapse:collapse;">

                    <!-- ================= HEADER ================= -->
                    <tr>
                        <td align="center" style="padding:20px 24px;background:#ffffff;border-radius:14px 14px 0 0;">
                            <a href="{{ $appUrl }}" style="display:inline-block;text-decoration:none;">
                                <img src="{{ config('email_branding.logo_url') }}" width="170"
                                    alt="{{ config('app.name') }}"
                                    style="display:block;width:170px;max-width:100%;height:auto;border:0;">
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
                        <td
                            style="padding:0;background:#fafcfb;border-top:1px solid #e8efed;border-radius:0 0 14px 14px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="border-collapse:collapse;">
                                <td align="center"
                                    style="padding:20px 24px;background:#ffffff;border-radius:14px 14px 0 0;">
                                    <a href="{{ $appUrl }}" style="display:inline-block;text-decoration:none;">
                                        <img src="{{ config('email_branding.logo_url') }}" width="90"
                                            alt="{{ config('app.name') }}"
                                            style="display:block;width:90px;max-width:100%;height:auto;border:0;">
                                    </a>
                                </td>

                                <!-- Social icons (public CDN PNGs) -->
                                @if ($socialLinks)
                                    <tr>
                                        <td align="center" style="padding:26px 28px 22px;">
                                            <table role="presentation" cellpadding="0" cellspacing="0" border="0"
                                                align="center" style="border-collapse:collapse;">
                                                <tr>
                                                    @foreach ($socialLinks as $network => $url)
                                                        @php
                                                            $networkKey = strtolower(trim($network));
                                                            $iconUrl =
                                                                $socialPngMap[$networkKey] ??
                                                                'https://cdn-icons-png.flaticon.com/512/1077/1077114.png';
                                                        @endphp
                                                        <td style="padding:0 7px;">
                                                            <a href="{{ $url }}" target="_blank"
                                                                rel="noopener noreferrer"
                                                                aria-label="{{ $network }}"
                                                                title="{{ $network }}"
                                                                style="display:block;text-decoration:none;border:0;outline:none;">
                                                                <img src="{{ $iconUrl }}" width="24"
                                                                    height="24" alt="{{ $network }}"
                                                                    style="display:block;width:24px;height:24px;border:0;">
                                                            </a>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                @endif

                                <!-- Company identity -->
                                <tr>
                                    <td align="center" style="padding:0 30px;">
                                        <p
                                            style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:15px;font-weight:bold;color:#0b2430;letter-spacing:.2px;">
                                            {{ config('app.name') }}
                                        </p>
                                        @if (config('email_branding.description'))
                                            <p
                                                style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.65;color:#71858d;">
                                                {{ config('email_branding.description') }}
                                            </p>
                                        @endif
                                        @if (config('email_branding.address'))
                                            <p
                                                style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.65;color:#93a4ab;">
                                                {{ config('email_branding.address') }}
                                            </p>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Divider -->
                                <tr>
                                    <td style="padding:22px 30px 0;">
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                                            border="0" style="border-collapse:collapse;">
                                            <tr>
                                                <td style="height:1px;background:#e8efed;font-size:0;line-height:0;">
                                                    &nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- Quick links -->
                                <tr>
                                    <td align="center" style="padding:16px 30px 0;">
                                        <p
                                            style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:1.9;color:#71858d;">
                                            <a href="{{ $appUrl }}"
                                                style="color:#0f6b4a;text-decoration:none;font-weight:bold;">Visit our
                                                website</a>
                                            <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                            <a href="{{ $privacyUrl }}"
                                                style="color:#0f6b4a;text-decoration:none;">Privacy Policy</a>
                                            <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                            <a href="{{ $termsUrl }}"
                                                style="color:#0f6b4a;text-decoration:none;">Terms of Service</a>
                                            @if (config('app.Admin_email'))
                                                <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                                <a href="mailto:{{ config('app.Admin_email') }}"
                                                    style="color:#0f6b4a;text-decoration:none;">Contact Support</a>
                                            @endif
                                        </p>
                                    </td>
                                </tr>

                                <!-- Compliance / consent notice -->
                                <tr>
                                    <td align="center" style="padding:16px 30px 0;">
                                        <p
                                            style="margin:0 0 8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.7;color:#8a9aa1;">
                                            You are receiving this email because you registered with or have an existing
                                            relationship with {{ config('app.name') }}.
                                        </p>
                                        <p
                                            style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.7;color:#8a9aa1;">
                                            <a href="{{ $unsubscribeUrl }}"
                                                style="color:#0f6b4a;text-decoration:underline;">Unsubscribe</a>
                                            <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                            <a href="{{ $preferencesUrl }}"
                                                style="color:#0f6b4a;text-decoration:underline;">Manage email
                                                preferences</a>
                                            @if (config('app.Admin_email'))
                                                <span style="color:#cfdcd7;">&nbsp;·&nbsp;</span>
                                                <a href="mailto:{{ config('app.Admin_email') }}?subject=Email%20preferences"
                                                    style="color:#0f6b4a;text-decoration:underline;">Email us</a>
                                            @endif
                                        </p>
                                    </td>
                                </tr>

                                <!-- Copyright -->
                                <tr>
                                    <td align="center" style="padding:18px 30px 28px;">
                                        <p
                                            style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:1.7;color:#a3b2b8;">
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
