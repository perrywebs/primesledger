@extends('mail.layout')

@section('email_content')
    <h1 style="margin:0 0 20px;color:#0b2430;font-size:24px;line-height:1.3;font-weight:700;">{{ $heading }}</h1>
    <div style="font-size:16px;line-height:1.75;color:#314b55;overflow-wrap:anywhere;">
        {!! $safeMessage !!}
    </div>
@endsection
