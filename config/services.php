<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' =>  env('95101330665-al6rok3r8s4e75ss9ll74209gk0qe121.apps.googleusercontent.com'),
        'client_secret' => env('IC4VoMkU7rltehehyVnCMFS2'),
        'redirect' => env('http://localhost/WEB-Assignment-1/home'),
    ],
    'facebook' => [
        'client_id' =>  env('1078962225517950'),
        'client_secret' => env('f236461b10bd58e89b7a70acdd1be18a'),
        'redirect' => env('http://localhost/WEB-Assignment-1/home'),
    ],
    'github' => [
        'client_id' =>  env('0b30a84a0fc007209668'),
        'client_secret' => env('6c2140aa334fd0fc6828d2febba7e89e2839278e'),
        'redirect' => env('GITHUB_REDIRECT'),
    ],
];
