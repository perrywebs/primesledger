@php
    use App\Support\EmailContent;
    echo $body['title'] . "\n\n";
    echo 'Hi ' . $body['name'] . ",\n\n";
    echo EmailContent::plainText($body['message']) . "\n\n";
    echo 'This is an automatically generated email. Please do not reply. Contact ' . config('app.Admin_email') . " if you need help.\n\n";
    echo config('app.name') . ' · ' . config('app.url') . "\n";
    foreach (array_filter(config('email_branding.social', [])) as $network => $url) {
        echo $network . ': ' . $url . "\n";
    }
    echo '© ' . date('Y') . ' ' . config('app.name') . '. All rights reserved.';
@endphp
