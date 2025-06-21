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
        'type' => "sedan",
        'registration_no' => "BT8531AV",
        'year' => "2014",
        'available' => 'available',
        'price_per_day' => '1500',
        'image_path' => "https://imgs.search.brave.com/A2icrZy1N4BzXbrV-LtoYFciShrmIMYTZ9RJ4A5VdLo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/aWlocy5vcmcvY2Ru/LWNnaS9pbWFnZS93/aWR0aD02MzYvYXBp/L3JhdGluZ3MvbW9k/ZWwteWVhci1pbWFn/ZXMvMjAwNC8"      
    ],
    [
        'brand'  => "BMW",
        'model' => "1 Series",
        'type' => "Hatchback",
        'registration_no' => "KR1234AB",
        'year' => "2020",
        'available' => 'available',
        'price_per_day' => '1500',
        'image_path' => "https://imgs.search.brave.com/VJ-PcY5TdiC14jfZ5Bxn8zlS9kW9ETj_NhschGk4ZKs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jYXJz/YWxlcy5weGNydXNo/Lm5ldC9nZW5lcmFs/L2Nhci9zcGVjL1Mw/MDBBSkhZLmpwZz93/aWR0aD02MTgmaGVp/Z2h0PTQxMiZ3YXRl/cm1hcms9MTgzMTg0/MDI2NA"      
    ],
    [
        'brand'  => "Ford",
        'model' => "Mustang",
        'type' => "limousine",
        'registration_no' => "BT2315SK",
        'year' => "2021",
        'available' => 'available',
        'price_per_day' => '2500',
        'image_path' => "https://imgs.search.brave.com/0UrlP6oTPQoMOHhJUu0YD5mAYJkWQ8k-BOt3Y7gohfk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9oaXBz/LmhlYXJzdGFwcHMu/Y29tL2htZy1wcm9k/L2ltYWdlcy8yMDIx/LWZvcmQtbXVzdGFu/Zy1tYWNoLTEtMTA5/LTE1OTIyMzE4OTEu/anBnP2Nyb3A9MC44/MjJ4dzowLjY5NXho/OzAuMTQxeHcsMC4x/OTJ4aCZyZXNpemU9/MTIwMDoq"      
    ],
    [
        'brand'  => "Peugeot",
        'model' => "207",
        'type' => "hatchback",
        'registration_no' => "SK2345FF",
        'year' => "2014",
        'available' => 'available',
        'price_per_day' => '700',
        'image_path' => "https://imgs.search.brave.com/VtHqirKb6gzZfT9WLtF3smlAMXrnmqrJY3CrOLfC96o/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/Y2Fyc2l6ZWQuY29t/L3Jlc291cmNlcy9w/ZXVnZW90LzIwNy9k/LzIwMDYvc2xfMjQ3/MTA4MDg5X3BldWdl/b3QtMjA3LTIwMDYt/c2lkZS12aWV3XzR4/LnBuZw"      
    ],
    [
        'brand'  => "Peugeot",
        'model' => "308",
        'type' => "hatchback",
        'registration_no' => "BT2321SK",
        'year' => "2021",
        'available' => 'available',
        'price_per_day' => '2300',
        'image_path' => "https://imgs.search.brave.com/l-NP9tAQKmsozVbh3kFNMnHH8BlDIs6DJQ1z9UNssvI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/aW1hZ2VzLm1vdG9y/LmVzL2ltYWdlL20v/MTMyMHcvZm90b3Mt/bm90aWNpYXMvMjAy/MS8wMy9wZXVnZW90/LTMwOC0yMDIxLTIw/MjE3NjI3OS0xNjE2/MDM2Njk1XzEuanBn"      
    ],
    [
        'brand'  => "Opel",
        'model' => "Corsa",
        'type' => "hatchback",
        'registration_no' => "BT1325SK",
        'year' => "2024",
        'available' => 'available',
        'price_per_day' => '2600',
        'image_path' => "https://www.opel.ie/content/dam/opel/master/vehicles/new-corsa(2023)/opel-corsa-ice-exterior-side_21x9_cosol23_e01_002.png?imwidth=1920"      
    ],
    [
        'brand'  => "Opel",
        'model' => "Astra",
        'type' => "hatchback",
        'registration_no' => "KR4455AF",
        'year' => "2024",
        'available' => 'available',
        'price_per_day' => '2600',
        'image_path' => "https://stellantis3.dam-broadcast.com/medias/domain12808/media108535/2560786-1667nnhf8t-whr.jpg"      
    ],
    [
        'brand'  => "Hyundai",
        'model' => "i20",
        'type' => "hatchback",
        'registration_no' => "KR5566AB",
        'year' => "2021",
        'available' => 'available',
        'price_per_day' => '2200',
        'image_path' => "https://imgs.search.brave.com/O-DL3BXINZFiVjcb1z8BNxfYoTIXBVosR_yzWK5qOFA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/Y29uY2VwdGNhcnou/Y29tL2ltYWdlcy9I/eXVuZGFpL2h5dW5k/YWktaTIwLTIwMjAt/MDEtMTI4MC5qcGc"      
    ],
    [
        'brand'  => "Hyundai",
        'model' => "i30",
        'type' => "sedan",
        'registration_no' => "KR3256AVK",
        'year' => "2022",
        'available' => 'available',
        'price_per_day' => '2800',
        'image_path' => "https://imgs.search.brave.com/_xDzv769nqHBK4O1Jxy6NVkhHQpaZyCZ-EkU0HQRt64/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9lZ2Zj/dm00N2o1Yy5leGFj/dGRuLmNvbS93cC1j/b250ZW50L3VwbG9h/ZHMvMjAyMi8wOC9I/eXVuZGFpLWkzMC1T/ZWRhbi1OLXByb2Zp/bGUtc2NhbGVkLmpw/Zz9zdHJpcD1hbGwm/bG9zc3k9MSZzc2w9/MQ"      
    ],
    [
        'brand'  => "Mercedes",
        'model' => "CLA",
        'type' => "coupe",
        'registration_no' => "SK4422RF",
        'year' => "2021",
        'available' => 'available',
        'price_per_day' => '2500',
        'image_path' => "https://imgs.search.brave.com/j-9T-nAaUuYIeicM_5hSmg2-qN2Dg3UzE_vcfOcNQLE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9kZWFs/ZXJpbnNwaXJlLWlt/YWdlLWxpYnJhcnkt/cHJvZC5zMy51cy1l/YXN0LTEuYW1hem9u/YXdzLmNvbS9pbWFn/ZXMvMnp1Tm5UdThh/N3hSOXJLeU1HbTZ5/WUxMUmtTZzJSdFY0/VzJUNVZHMy5qcGc"      
    ],
    [
        'brand'  => "BMW",
        'model' => "Z4",
        'type' => "convertible",
        'registration_no' => "KU1234AF",
        'year' => "2020",
        'available' => 'available',
        'price_per_day' => '3200',
        'image_path' => "https://imgs.search.brave.com/eK0HzyF-tIMXeRiOLEzRkSDUU_bcwFCnGPiv3YnYl7g/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuY2Fycy5jb20v/Y2xkc3RhdGljL3dw/LWNvbnRlbnQvdXBs/b2Fkcy9ibXctejQt/MzBpLXNkcml2ZS0y/MDIwLTAyLWJsdWUt/LWV4dGVyaW9yLS1w/cm9maWxlLS10ZXh0/dXJlcy1hbmQtcGF0/dGVybnMuanBn"      
    ],
    [
        'brand'  => "BMW",
        'model' => "M 3",
        'type' => "coupe",
        'registration_no' => "KR2233AB",
        'year' => "2020",
        'available' => 'available',
        'price_per_day' => '2800$',
        'image_path' => "https://imgs.search.brave.com/O57lnoFW1smFZXbvdOuj3PV5FEyjSTkDXgiung8Lldo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuY2FyZXhwZXJ0/LmNvbS5hdS9yZXNp/emUvNzAwLy0vdmVo/aWNsZXMvc291cmNl/LWcvMy9mLzNmNzAz/OWQ1LmpwZw"      
    ],
];

$car_specifications = [
    [
        'car_id'  => "0",
        'fuel_type' => "diesel",
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
        'seats' => "4"  
    ],
    [
        'car_id'  => "3",
        'fuel_type' => "petrol",
        'transmission' => "automatic",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
    [
        'car_id'  => "4",
        'fuel_type' => "petrol",
        'transmission' => "manual",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
    [
        'car_id'  => "5",
        'fuel_type' => "petrol",
        'transmission' => "automatic",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
    [
        'car_id'  => "6",
        'fuel_type' => "diesel",
        'transmission' => "manual",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
    [
        'car_id'  => "7",
        'fuel_type' => "petrol",
        'transmission' => "manual",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
    [
        'car_id'  => "8",
        'fuel_type' => "petrol",
        'transmission' => "automatic",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
    [
        'car_id'  => "9",
        'fuel_type' => "petrol",
        'transmission' => "automatic",
        'air_condition' => "yes",
        'seats' => "5"  
    ],
    [
        'car_id'  => "10",
        'fuel_type' => "petrol",
        'transmission' => "automatic",
        'air_condition' => "yes",
        'seats' => "2"  
    ],
    [
        'car_id'  => "11",
        'fuel_type' => "petrol",
        'transmission' => "manual",
        'air_condition' => "yes",
        'seats' => "4"  
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
    Car::store($car);
}

foreach($car_specifications as $car_specification) {
    CarSpecification::create($car_specification);
}

foreach($reviews as $review) {
    Review::create($review);
}

echo "Fixtures loaded successfully.\n";