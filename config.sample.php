return [
    'app' => [
        'name' => 'Rent a Car',
        'debug' => true
    ],
    'database' => [
        'driver' => 'sqlite',
        'dbname' => __DIR__ . '/database/rent.sqlite'
    ],
    'google' => [
        'client_id' => 'your-client-id',
        'client_secret' => 'your-client-secret',
        'redirect_url' => 'http://localhost:8000/auth/google/callback',
    ],
    'mail' => [
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'username' => 'your-email@gmail.com',
        'password' => 'your-app-password',
        'from_email' => 'your-email@gmail.com',
        'from_name' => 'Rent A Car App'
    ]
];