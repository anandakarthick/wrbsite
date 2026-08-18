<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Google Services
    |--------------------------------------------------------------------------
    */
    'google' => [
        'analytics_id' => env('GOOGLE_ANALYTICS_ID'),
        'search_console_verification' => env('GOOGLE_SEARCH_CONSOLE_VERIFICATION'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Google reCAPTCHA (v2 checkbox)
    |--------------------------------------------------------------------------
    | Register at https://www.google.com/recaptcha/admin and set both keys
    | in .env. When the keys are empty, the contact form falls back to the
    | built-in math security check.
    */
    'recaptcha' => [
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret_key' => env('RECAPTCHA_SECRET_KEY'),
        // 'v3' = invisible score-based, 'v2' = "I'm not a robot" checkbox.
        // Must match the key type chosen in the reCAPTCHA admin console.
        'type' => env('RECAPTCHA_TYPE', 'v3'),
        // v3 only: submissions scoring below this are treated as bots (0..1)
        'min_score' => (float) env('RECAPTCHA_MIN_SCORE', 0.5),
    ],

    /*
    |--------------------------------------------------------------------------
    | Bing Services
    |--------------------------------------------------------------------------
    */
    'bing' => [
        'webmaster_verification' => env('BING_WEBMASTER_VERIFICATION'),
    ],

];
