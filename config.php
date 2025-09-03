<?php

require_once __DIR__ . '/vendor/autoload.php';

return [
    'app' => [
        'name' => getenv('APP_NAME') ?: 'Rent a Car',
        'debug' => filter_var(getenv('APP_DEBUG') ?: false, FILTER_VALIDATE_BOOLEAN)
    ],
    'database' => [
        'driver' => getenv('DB_DRIVER') ?: 'sqlite',
        'dbname' => realpath(__DIR__ . '/' . (getenv('DB_NAME') ?: 'database/rent.sqlite'))
    ],
    'google' => [
        'client_id' => getenv('GOOGLE_CLIENT_ID') ?: '',
        'client_secret' => getenv('GOOGLE_CLIENT_SECRET') ?: '',
        'redirect_url' => getenv('GOOGLE_REDIRECT_URL') ?: ''
    ],
    'mail' => [
        'host' => getenv('MAIL_HOST') ?: '',
        'port' => getenv('MAIL_PORT') ?: 587,
        'username' => getenv('MAIL_USERNAME') ?: '',
        'password' => getenv('MAIL_PASSWORD') ?: '',
        'from_email' => getenv('MAIL_FROM_EMAIL') ?: '',
        'from_name' => getenv('MAIL_FROM_NAME') ?: ''
    ],
    'stripe' => [
        'secret_key' => getenv('STRIPE_SECRET_KEY') ?: '',
        'publishable_key' => getenv('STRIPE_PUBLISHABLE_KEY') ?: ''
    ]
];