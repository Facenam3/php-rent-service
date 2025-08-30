<?php

namespace App\Controllers\Admin;

use App\Services\Authorization;
use Core\View;
use App\Models\User;
use App\Models\Car;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\Payment;
use App\Models\Review;

class AdminController {
    public function index() {
        Authorization::verify('dashboard');
        //users
        $allUsers = User::count();
        $usersThisMonth = User::newUsersThisMonth();

        //cars
        $totalCars = Car::count();
        $availableCars = Car::availableCars();
        $bookedCars = Car::bookedCars();
        
        //reservations
        $totalReservations = Reservation::count();
        $pendingReservations = Reservation::reservationsPending();
        $completeReservations = Reservation::reservationsCompleted();

        //payments
        $totalPayments = Payment::count();
        $monthlyRavenue = Payment::totalRevenueThisMonth();
        $pendingRavenue = Payment::pendingPaymentsThisMonth();

        //contact messages
        $totalContacts = Contact::count();
        $montlyContacts = Contact::contactsThisMonth();

        //reviews
        $totalReviews = Review::count();
        $montlyReviews = Review::reviewsThisMonth();

        $data = [
            'users' => [
                'allUsers' => $allUsers,
                'monthlyUsers' => $usersThisMonth,
            ],
            'cars' => [
                'allCars' => $totalCars,
                'bookedCars' => $bookedCars,
                'availableCars' => $availableCars,
            ],
            'reservations' => [
                'allReservations' => $totalReservations,
                'pendingRes' => $pendingReservations,
                'completeRes' => $completeReservations,
            ],
            'payments' => [
                'totalPayments' => $totalPayments,
                'monthlyRev' => $monthlyRavenue,
                'pendingRev' => $pendingRavenue,
            ],
            'contact-us' => [
                'allContacts' => $totalContacts,
                'monthlyContacts' => $montlyContacts,
            ],
            'reviews' => [
                'allReviews' => $totalReviews,
                'monthlyReviews' => $montlyReviews
            ]
        ];
    
            
        
        return View::render(
            template: 'admin/dashboard',
            data: $data,
            layout: 'layouts/admin'
        );
    }
}