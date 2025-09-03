<?php

require_once __DIR__ . '/vendor/autoload.php';

return [
    'app' => [
        'name' => $_ENV['APP_NAME'] ?? 'Rent a Car',
        'debug' => filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN)
    ],
    'database' => [
    'driver' => $_ENV['DB_DRIVER'] ?? 'sqlite',
    'dbname' => realpath(__DIR__ . '/' . ($_ENV['DB_NAME'] ?? 'database/rent.sqlite'))
    ],
    'google' => [
        'client_id' => $_ENV['GOOGLE_CLIENT_ID'] ?? '',
        'client_secret' => $_ENV['GOOGLE_CLIENT_SECRET'] ?? '',
        'redirect_url' => $_ENV['GOOGLE_REDIRECT_URL'] ?? ''
    ],
    'mail' => [
        'host' => $_ENV['MAIL_HOST'] ?? '',
        'port' => $_ENV['MAIL_PORT'] ?? 587,
        'username' => $_ENV['MAIL_USERNAME'] ?? '',
        'password' => $_ENV['MAIL_PASSWORD'] ?? '',
        'from_email' => $_ENV['MAIL_FROM_EMAIL'] ?? '',
        'from_name' => $_ENV['MAIL_FROM_NAME'] ?? ''
    ],
    'stripe' => [
        'secret_key' => $_ENV['STRIPE_SECRET_KEY'] ?? '',
        'publishable_key' => $_ENV['STRIPE_PUBLISHABLE_KEY'] ?? ''
    ]
];