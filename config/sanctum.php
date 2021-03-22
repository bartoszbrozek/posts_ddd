<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Stateful Domains
    |--------------------------------------------------------------------------
    |
    | Requests from the following domains / hosts will receive stateful API
    | authentication cookies. Typically, these should include your local
    | and production domains which access your API via a frontend SPA.
    |
    */

    'stateful' => [
        'my-clusters.local',
        'my-clusters.local:8080',
        'localhost',
        'localhost:8080',
        '::1',
        '::1:8080', '[::1]:80', '[::1]:8080',
        '127.0.0.1',
        '127.0.0.1:8080'
    ],

    /*
    |--------------------------------------------------------------------------
    | Expiration Minutes
    |--------------------------------------------------------------------------
    |
    | This value controls the number of minutes until an issued token will be
    | considered expired. If this value is null, personal access tokens do
    | not expire. This won't tweak the lifetime of first-party sessions.
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Sanctum Middleware
    |--------------------------------------------------------------------------
    |
    | When authenticating your first-party SPA with Sanctum you may need to
    | customize some of the middleware Sanctum uses while processing the
    | request. You may change the middleware listed below as required.
    |
    */

    'middleware' => [
        'verify_csrf_token' => \App\Presentation\UI\Web\Frontend\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => \App\Presentation\UI\Web\Frontend\Http\Middleware\EncryptCookies::class,
    ],

    'prefix' => 'api',
    // 'guard' => 'api',

];
