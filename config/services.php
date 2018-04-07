<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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

    'facebook' => [
        'client_id' => env('CLIENT_ID'),         // Need to update .enc file with CLIENT_ID
        'client_secret' => env('CLIENT_SECRET'), // need to update .env file with CLIENT_SECRET
        'redirect' => env('CLIENT_REDIRECT'),  // need to update .enc file with CLIENT_REDIRECT link needs to be https!
//        'client_id' => ('424529497975253'),         // Your facebook Client ID
 //       'client_secret' => env('CLIENT_SECRET'), // Your facebook Client Secret // //fc1d69a1769eaaaaf261c555318c2d7b
//        'redirect' => 'https://localhost/login/facebook/callback/',
    ],

];
