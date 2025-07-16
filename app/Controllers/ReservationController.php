<?php

namespace App\Controllers;

use Core\App;
use Core\View;
use App\Models\Car;
use App\Models\Location;
use App\Models\Reservation;
use App\Models\User;
use App\Services\CSRF;
use Core\Router;

class ReservationController {
    public function create() : string {
        $cars = Car::getAvailable();
        $locations = Location::all();
        return View::render(
            template: 'reservation/create',
            layout: 'layouts/main',
            data: [
                 'cars' => $cars,
                 'locations' => $locations
                ]
        );
    }

    public function store() {
        if(!CSRF::verify()) {
                Router::pageExpired();
        }
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $mailer = App::get('mailer');
            $user_id = $_POST['user_id'] ?? null;
            $car_id = $_POST['car_id'];
            $email = $_POST['email'] ?? '';
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $price_per_day = $_POST['price_per_day'];
            $total_price = $_POST['total_price'];
            $pickup_location_id = $_POST['pickup_location_id'];
            $dropoff_location_id = $_POST['dropoff_location_id'];
            $status = 'complete';

            $user = $user_id ? User::findById($user_id) : null;
            $car = Car::findById($car_id);
            $pickupLocation = Location::find($pickup_location_id);
            $dropoffLocation = Location::find($dropoff_location_id);

            if(!$email && $user) {
                $email = $user->email;
            }

            $reservation = Reservation::create([
                'user_id' => $user_id,
                'car_id' => $car_id,
                'email' => $email,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'price_per_day' => $price_per_day,
                'total_price' => $total_price,
                'status' => $status,
                'pickup_location_id' => $pickup_location_id,
                'dropoff_location_id' => $dropoff_location_id
            ]);

            $message = "
                Hello,

                Thank you for choosing us! 

                ✅ Car: {$car->brand} {$car->model}
                ✅ Pickup: {$start_date} hour at {$pickupLocation->name}
                ✅ Drop-off: {$end_date} hour at {$dropoffLocation->name}
                ✅ Price per day: €{$price_per_day}
                ✅ Total: €{$total_price}

                We look forward to seeing you!
            ";

            if($reservation) {
                $mailer->send(
                    $email,
                    "Your Car Reservation Confirmation", 
                    nl2br($message)
                );
            }

            Router::redirect('/reservations/thank-you?id=' . $reservation->id);
        }else {
            Router::redirect('/reservations/create?error=failed');
        }
    }

    public function thankYou() {
    $reservationId = $_GET['id'] ?? null;

    if (!$reservationId) {
        Router::redirect('/');
    }

    $reservation = Reservation::find($reservationId);
    $car = $reservation ? Car::find($reservation->car_id) : null;

    return View::render(
        template: 'reservation/thank-you',
        layout: 'layouts/main',
        data: [
            'reservation' => $reservation,
            'car' => $car
            ]
    );
}
}