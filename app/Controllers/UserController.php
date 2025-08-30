<?php

namespace App\Controllers;

use App\Models\Reservation;
use Core\View;

class UserController {
    public function index() {
        $userId = $_SESSION['user_id'] ?? null;
        $reservations = Reservation::findbyUserId($userId);
        // var_dump($reservations);die();
        return View::render(
            template: 'users/dashboard',
            data: ['reservations' => $reservations],
            layout: 'layouts/main' 
        );
    }

    public function settings() {
        return View::render(
            template: 'users/settings',
            data: [],
            layout: "layouts/main"
        );
    }
}