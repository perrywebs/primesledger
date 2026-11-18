@php
    use App\Support\EmailContent;
    echo $heading . "\n\n";
    echo EmailContent::plainText($safeMessage) . "\n\n";
    echo config('app.name') . ' · ' . config('app.url') . "\n";
    foreach (array_filter(config('email_branding.social', [])) as $network => $url) {
        echo $network . ': ' . $url . "\n";
    }
    echo 'For communication preferences, contact ' . config('app.Admin_email') . ".\n";
    echo '© ' . date('Y') . ' ' . config('app.name') . '. All rights reserved.';
@endphp
