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

    // facebook
    'facebook' => [
        'client_id' => '2212662022353184',
        'client_secret' => 'a144289911f80f64440e6ad5b5375452',
        'redirect' => 'https://localhost/twitter/facebook/callback',
    ],


    // google
    'google' => [
        'client_id' => '788299056107-a8kskenhkg41q1sqthfrd5kn057b93ur.apps.googleusercontent.com',
        'client_secret' => '-dg-8llHkfj4HzgRNuiP19wO',
        'redirect' => 'https://localhost/twitter/google/callback',
    ],

];

