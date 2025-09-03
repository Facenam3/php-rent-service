<?php

namespace App\Controllers;

use Core\View;
use App\Models\Car;
use App\Models\Review;

class HomeController {

   
    public function index() {
        $cars = Car::getRecent(5);
        $reviews = Review::getReviews();
        return View::render(
            template: 'home/index',
             layout:'layouts/main',
              data: [
                "cars" => $cars,
                "reviews" => $reviews
                ]
            );
    }
}