<?php

namespace App\Controllers;

use Core\App;
use Core\Router;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Car;
use App\Models\Location;

class StripeController {

    private $stripe;
    private $config;

    public function __construct() {
        $this->config = App::get('config')['stripe'];
        $this->stripe = new \Stripe\StripeClient($this->config['secret_key']);
    }
    public function checkout() {

        $reservationId = $_GET['reservation_id'] ?? null;
        if(!$reservationId) {
            Router::redirect('/');
        }

        $reservation = Reservation::find($reservationId);
        if(!$reservation) {
            Router::redirect('/');
        }

        $payment = Payment::findByReservation($reservationId);
        if(!$payment) {
            Router::redirect('/');
        }

        $stripe = new \stripe\StripeClient('sk_test_51RlxuOPqdFmN8IPqZyP8ku0nIdWDyKeuCnQCebpnHeKglYQgN7B3Qi1mA49qaQPsEX5hQPNbqDdVdukH8uHNuC5N004smi2c60');

        $session = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => "Car Reservation: {$reservation->car_id}"
                        ],
                        'unit_amount' => intval($payment->amount * 100) // cents
                    ],
                    'quantity' => 1
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/payments/success?session_id={CHECKOUT_SESSION_ID}&reservation_id=' . $reservationId,
                'cancel_url'  => 'http://localhost:8000/payments/cancel?reservation_id=' . $reservationId
            ]);
        
            Router::redirect($session->url);
    }

    public function success() {
        $reservationId = $_GET['reservation_id'] ?? null;
        $sessionId = $_GET['session_id'] ?? null;

        if($sessionId && $reservationId) {
           
            $session = $this->stripe->checkout->sessions->retrieve($sessionId);

            if($session->payment_status === 'paid') {
                Payment::markAsComplete($reservationId, $session->payment_intent);

                $reservation = Reservation::find($reservationId);
                $car = Car::findById($reservation->car_id);
                $pickupLocation = Location::find($reservation->pickup_location_id);
                $dropOffLocation = Location::find($reservation->dropoff_location_id);

                $mailer = App::get('mailer');

                 $message = "
                    Hello,

                    ✅ Your payment was successfully processed! ✅

                    ✅ Car: {$car->brand} {$car->model}
                    ✅ Pickup: {$reservation->start_date} at {$pickupLocation->name}
                    ✅ Drop-off: {$reservation->end_date} at {$dropOffLocation->name}
                    ✅ Total Paid: €{$reservation->total_price}

                    Thank you for your reservation!
                ";

                $mailer->send(
                    $reservation->email,
                    "Your Car Reservation Payment Confirmation",
                    nl2br($message)
                );
            }
        }
        Router::redirect('/reservations/thank-you?id=' . $reservationId);
    }

    public function cancel() {
        $reservationId = $_GET['reservation_id'] ?? null;

        Router::redirect('/reservations/create?error=payment-canceled');
    }
}