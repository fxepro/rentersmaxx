<?php

return [

    // ── Stripe ──────────────────────────────────────────────────
    'stripe' => [
        'key'            => env('STRIPE_KEY'),
        'secret'         => env('STRIPE_SECRET'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
    ],

    // ── Razorpay (India) ────────────────────────────────────────
    'razorpay' => [
        'key'            => env('RAZORPAY_KEY'),
        'secret'         => env('RAZORPAY_SECRET'),
        'webhook_secret' => env('RAZORPAY_WEBHOOK_SECRET'),
    ],

    // ── Flutterwave (Africa) ────────────────────────────────────
    'flutterwave' => [
        'public_key'      => env('FLUTTERWAVE_PUBLIC_KEY'),
        'secret_key'      => env('FLUTTERWAVE_SECRET_KEY'),
        'encryption_key'  => env('FLUTTERWAVE_ENCRYPTION_KEY'),
        'webhook_secret'  => env('FLUTTERWAVE_WEBHOOK_SECRET'),
    ],

    // ── Xendit (SE Asia) ────────────────────────────────────────
    'xendit' => [
        'secret_key'     => env('XENDIT_SECRET_KEY'),
        'webhook_token'  => env('XENDIT_WEBHOOK_TOKEN'),
    ],

    // ── Mercado Pago (LatAm) ────────────────────────────────────
    'mercadopago' => [
        'access_token'   => env('MERCADOPAGO_ACCESS_TOKEN'),
        'webhook_secret' => env('MERCADOPAGO_WEBHOOK_SECRET'),
    ],

    // ── FX / Exchange Rate API ──────────────────────────────────
    'fx' => [
        'api_key' => env('FX_API_KEY'),
        'api_url' => env('FX_API_URL', 'https://v6.exchangerate-api.com/v6'),
    ],

    // ── Mail ────────────────────────────────────────────────────
    'mailgun' => [
        'domain'    => env('MAILGUN_DOMAIN'),
        'secret'    => env('MAILGUN_SECRET'),
        'endpoint'  => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme'    => 'https',
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
