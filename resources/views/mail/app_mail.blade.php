@extends('mail.layout')

@section('email_content')
    <h1 style="margin:0 0 20px;color:#0b2430;font-size:24px;line-height:1.3;font-weight:700;">{{ $body['title'] }}</h1>
    <p style="margin:0 0 16px;font-size:16px;line-height:1.65;color:#314b55;">Hi {{ $body['name'] }},</p>
    <div style="font-size:16px;line-height:1.75;color:#314b55;overflow-wrap:anywhere;">
        {!! $body['message'] !!}
    </div>
    <p style="margin:26px 0 0;color:#71858d;font-size:13px;line-height:1.6;">
        This is an automatically generated email. Please do not reply. Contact
        <a href="mailto:{{ config('app.Admin_email') }}" style="color:#0f6b4a;">{{ config('app.Admin_email') }}</a>
        if you need help.
    </p>
@endsection
