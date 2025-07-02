<?php

return[
    'app' => [
        'name' => 'Rent a Car',
        'debug' => true
    ],
    'database' => [
        'driver' => 'sqlite',
        'dbname' => __DIR__ . '/database/rent.sqlite'
    ],
    'google' => [
            'client_id' => "212135940004-u9gf5mos9sdf2j40i85a32u7cqd80pj3v3b.apps.googleusercontent.com",
            'client_secret' => "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ylS",
            'redirect_url' => "http://localhost:8000/auth/google/callback",
    ] 
];