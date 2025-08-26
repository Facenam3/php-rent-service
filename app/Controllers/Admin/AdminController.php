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
        $monthlyRavenue = Payment::totalRevenueThisMonth();
        $pendingRavenue = Payment::pendingPaymentsThisMonth();

        //contact messages
        $totalContacts = Contact::count();
        $montlyContacts = Contact::contactsThisMonth();

        //reviews
        $totalReviews = Review::count();
        $montlyReviews = Review::reviewsThisMonth();
        
        return View::render(
            template: 'admin/dashboard',
            data: [
                'allUsers' => $allUsers,
                'monthlyUsers' => $usersThisMonth,
                'allCars' => $totalCars,
                'bookedCars' => $bookedCars,
                'availableCars' => $availableCars,
                'allReservations' => $totalReservations,
                'pendingRes' => $pendingReservations,
                'completeRes' => $completeReservations,
                'monthlyRev' => $monthlyRavenue,
                'pendingRev' => $pendingRavenue,
                'allContacts' => $totalContacts,
                'monthlyContacts' => $montlyContacts,
                'allReviews' => $totalReviews,
                'monthlyReviews' => $montlyReviews
            ],
            layout: 'layouts/admin'
        );
    }
}