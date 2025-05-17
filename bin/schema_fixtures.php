<?php
require_once __DIR__ . '/../bootstrap.php';

use Core\App;
use App\Models\User;
use App\Models\Car;
use App\Models\CarSpecification;
use App\Models\Review;

$users = [
    [
        'name'  => "Dalibor",
        'surname' => "Jovanovski",
        'email' => "dalibor@test.com",
        'password' => password_hash('dacko123', PASSWORD_BCRYPT),
        'role' => "admin"        
    ],
    [
        'name'  => "Sara",
        'surname' => "Jovanovska",
        'email' => "sarchito@test.com",
        'password' => password_hash('sarchito', PASSWORD_BCRYPT),
        'role' => "admin"        
    ],
    [
        'name'  => "Grujo",
        'surname' => "Jovanovski",
        'email' => "grujo@test.com",
        'password' => password_hash('grujo123', PASSWORD_BCRYPT),
        'role' => "admin"        
    ]
];

$cars = [
    [
        'brand'  => "BMW",
        'model' => "5 Series",
        'type' => "limousine",
        'registration_no' => "BT8531AV",
        'year' => "2014",
        'available' => 'available',
        'price_per_day' => '1500$',
        'image_path' => "asdasdasdas"      
    ],
    [
        'brand'  => "BMW",
        'model' => "116i",
        'type' => "Hatchback",
        'registration_no' => "KR1234AB",
        'year' => "2011",
        'available' => 'available',
        'price_per_day' => '500$',
        'image_path' => "asdasdasdas"      
    ],
    [
        'brand'  => "Ford",
        'model' => "Mustang",
        'type' => "limousine",
        'registration_no' => "BT2315SK",
        'year' => "2021",
        'available' => 'available',
        'price_per_day' => '2500$',
        'image_path' => "asdasdasdas"      
    ],
];

$car_specifications = [
    [
        'car_id'  => "0",
        'fuel_type' => "petrol",
        'transmission' => "manual",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
     [
        'car_id'  => "1",
        'fuel_type' => "petrol",
        'transmission' => "manual",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
    [
        'car_id'  => "2",
        'fuel_type' => "diesel",
        'transmission' => "automatic",
        'air_condition' => "yes",
        'seats' => "2"  
    ]
];

$reviews = [
    [
        'car_id'  => "0",
        'user_id' => "1",
        'rating' => 3,
        'comment' => "The best car i have ever drived."
    ],
    [
        'car_id'  => "1",
        'user_id' => "2",
        'rating' => '5',
        'comment' => "The best services and their cars are always clean."
    ],
   [
        'car_id'  => "2",
        'user_id' => "2",
        'rating' => "3",
        'comment' => "Best service in this town."
    ],
];

$db = App::get('database');

$db->query("DELETE FROM users");
$db->query("DELETE FROM cars");
$db->query("DELETE FROM car_specifications");
$db->query("DELETE FROM reviews");

$db->query(
    "DELETE FROM sqlite_sequence WHERE name IN ('users', 'cars', 'car_specifications', 'reviews')"
);

foreach($users as $user) {
    User::create($user);
}

foreach($cars as $car) {
    Car::create($car);
}

foreach($car_specifications as $car_specification) {
    CarSpecification::create($car_specification);
}

foreach($reviews as $review) {
    Review::create($review);
}

echo "Fixtures loaded successfully.\n";