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
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f3f7f6;border-collapse:collapse;">
        <tr>
            <td align="center" style="padding:28px 14px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;border-collapse:collapse;">
                    <tr>
                        <td align="center" style="padding:20px 24px;background:#ffffff;border-radius:14px 14px 0 0;">
                            <a href="{{ config('app.url') }}" style="display:inline-block;text-decoration:none;">
                                <img src="{{ config('email_branding.logo_url') }}" width="170" alt="{{ config('app.name') }}" style="display:block;width:170px;max-width:100%;height:auto;border:0;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:34px 38px 38px;background:#ffffff;border-top:1px solid #e8efed;">
                            @yield('email_content')
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:26px 24px 12px;color:#71858d;font-size:13px;line-height:1.6;">
                            <strong style="color:#0b2430;font-size:14px;">{{ config('app.name') }}</strong>
                            <p style="margin:6px 0 14px;">{{ config('email_branding.description') }}</p>
                            <p style="margin:0 0 14px;">
                                <a href="{{ config('app.url') }}" style="color:#0f6b4a;text-decoration:underline;">Visit our website</a>
                                @if (config('app.Admin_email'))
                                    &nbsp;·&nbsp;
                                    <a href="mailto:{{ config('app.Admin_email') }}" style="color:#0f6b4a;text-decoration:underline;">{{ config('app.Admin_email') }}</a>
                                @endif
                            </p>
                            @php($socialLinks = array_filter(config('email_branding.social', [])))
                            @if ($socialLinks)
                                <p style="margin:0 0 14px;">
                                    @foreach ($socialLinks as $network => $url)
                                        @php($socialIcons = ['Facebook' => 'f', 'Instagram' => '◎', 'LinkedIn' => 'in', 'X' => 'X'])
                                        <a href="{{ $url }}" aria-label="{{ $network }}" style="display:inline-block;margin:0 5px;color:#0f6b4a;text-decoration:none;">
                                            <span style="display:inline-block;width:24px;height:24px;border:1px solid #cfe2d9;border-radius:50%;font-size:12px;font-weight:bold;line-height:24px;text-align:center;">{{ $socialIcons[$network] ?? $network }}</span>
                                            <span style="margin-left:3px;text-decoration:underline;">{{ $network }}</span>
                                        </a>
                                    @endforeach
                                </p>
                            @endif
                            <p style="margin:0 0 14px;">
                                You are receiving this message because of your relationship with {{ config('app.name') }}.
                                @if (config('app.Admin_email'))
                                    <a href="mailto:{{ config('app.Admin_email') }}?subject=Email%20preferences" style="color:#0f6b4a;text-decoration:underline;">Contact us to manage communication preferences.</a>
                                @else
                                    Contact us to manage communication preferences.
                                @endif
                            </p>
                            <p style="margin:0;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
