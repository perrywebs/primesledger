<?php

return [
    'logo_url' => env('MAIL_BRAND_LOGO_URL', env('APP_URL', 'http://localhost') . '/home-assets/assets/img/forex-logo.png'),
    'description' => 'Digital asset management and investment tools.',
    'social' => [
        'Facebook' => env('MAIL_BRAND_FACEBOOK_URL'),
        'Instagram' => env('MAIL_BRAND_INSTAGRAM_URL'),
        'LinkedIn' => env('MAIL_BRAND_LINKEDIN_URL'),
        'X' => env('MAIL_BRAND_X_URL'),
    ],
];
