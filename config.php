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
            'client_id' => "your_client_id",
            'client_secret' => "your_client_secret",
            'redirect_url' => "your_redirect_url",
    ] 
];