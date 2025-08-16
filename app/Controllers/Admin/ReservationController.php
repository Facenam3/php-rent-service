<?php

namespace App\Controllers\Admin;

use Core\View;
use Core\App;
use Core\Router;
use App\Models\Reservation;
use App\Models\Payment;
use App\Models\Location;
use App\Models\User;
use App\Models\Car;
use DateTime;

class ReservationController {
        public function index() {
        $search = $_GET['search'] ?? '';
        $limit = 6;
        $page = $_GET['page'] ?? 1;

        $reservations = Reservation::getRecent($limit, $page,$search);
        $total = Reservation::count($search);   

        return View::render(
            template: "admin/reservations/reservations",
            data: [
                'reservations' => $reservations,
                'search' => $search,
                'currentPage' => $page,
                'totalPages' => ceil($total/$limit)
            ],
            layout: "layouts/admin"
        );
    }

    public function create() {
        $locations = Location::all();
        $cars = Car::getAvailable();
        $users = User::all();
         return View::render(
            template: "admin/reservations/create",
            data: [
                'users' => $users,
                'cars' => $cars,
                'locations' => $locations
            ],
            layout: "layouts/admin"
        );
    }
    
    public function store() {
        if($_SERVER['REQUEST_METHOD']  === "POST") {
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
            $payment_method = $_POST['payment_method'];
            $amount = (float)$_POST['amount'];
            $status = $_POST['payment_status'];

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
                'status' => 'complete',
                'pickup_location_id' => $pickup_location_id,
                'dropoff_location_id' => $dropoff_location_id
            ]);

            if($reservation) {
                Payment::create([
                'reservation_id' => $reservation->id,
                'payment_method' => $payment_method,
                'amount' => $reservation->total_price,
                'status' => $status,
                'transaction_id' => $reservation->id
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

                $mailer->send(
                    $email,
                    "Your Car Reservation Confirmation", 
                    nl2br($message)
                );
            }

            Router::redirect("/admin/reservations");
        }
    }

    public function edit($id) {
        $reservation = Reservation::findById($id);
        $cars = Car::all();
        $locations = Location::all();
        $users = User::all();
        $payment = Payment::findByReservation($reservation->id);

         return View::render(
            template: "admin/reservations/edit",
            data: [
              'reservation' =>  $reservation ,
              'payment' => $payment,
              'users' => $users,
              'locations' => $locations,
              'cars' => $cars
            ],
            layout: "layouts/admin"
        );
    }

    public function update($id) {
       if($_SERVER['REQUEST_METHOD'] === "POST") {
            $reservation = Reservation::find($id);
            $payment = Payment::findByReservation($reservation->id);

            $reservation->car_id = (int)$_POST['car_id'];
            $reservation->user_id = $_POST['user_id'];
            $reservation->email = $_POST['email'];
            $reservation->start_date = $_POST['start_date'];
            $reservation->end_date = $_POST['end_date'];
            $reservation->pickup_location_id = $_POST['pickup_location_id'];
            $reservation->dropoff_location_id = $_POST['dropoff_location_id'];
            $reservation->status = $_POST['status'];            
            $reservation->price_per_day = $_POST['price_per_day'];
            
            $start = new DateTime($_POST['start_date']);
            $end = new DateTime($_POST['end_date']);
            $interval = $start->diff($end);
            $days = max(1, $interval->days);

            $reservation->total_price = $reservation->price_per_day * $days;

            unset(
                $reservation->car_brand,
                $reservation->car_model,
                $reservation->user_name,
                $reservation->pickup_location,
                $reservation->dropoff_location,
                $reservation->image_path);

            $reservation->save();

            if($reservation) {
                Car::reserved($reservation->car_id);

                $payment->payment_method = $_POST['payment_method'];
                $payment->amount = $reservation->total_price;
                $payment->status = $_POST['payment_status'];
                $payment->save();
            }

            Router::redirect("/admin/reservations");
        }
    }

    public function show($id) {
        $reservation = Reservation::findById($id);
         return View::render(
            template: "admin/reservations/show",
            data: [
                'reservation' => $reservation
            ],
            layout: "layouts/admin"
        );
    }


    public function delete($id) {
        $reservation = Reservation::find($id);
        $payment = Payment::findByReservation($reservation->id);
        if($reservation) {
            $reservation->delete();
            $payment->delete();
        }
        
        Router::redirect("/admin/reservations");
    }
}