<?php

namespace App\Controllers;

use App\Models\Review;
use Core\Router;

class ReviewController {
    public function store() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {

            $user_id = $_POST['user_id'];
            $car_id = $_POST['car_id'];
            $rating = $_POST['rating'];
            $comment = $_POST['comment'];
            $carID = (int)$car_id;

           $review = Review::create([
                'user_id' => $user_id,
                'car_id' => $car_id,
                'rating' => $rating,
                'comment' => $comment
            ]);

            if($review) {
                Router::redirect('/cars/' . $carID);
            }
        }
    }
}