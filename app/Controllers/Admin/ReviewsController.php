<?php

namespace App\Controllers\Admin;

use App\Models\Review;
use App\Models\Car;
use App\Models\User;
use Core\Router;
use Core\View;

class ReviewsController {
public function index() {
        $search = $_GET['search'] ?? '';
        $limit = 6;
        $page = $_GET['page'] ?? 1;

        $reviews = Review::getRecent($limit, $page,$search);
        $total = Review::count($search);

        return View::render(            
           template: 'admin/reviews/reviews',
           data: [
            'reviews' => $reviews,
            'search' => $search,
            'currentPage' => $page,
            'totalPages' => ceil($total/$limit)
            ],
           layout: "layouts/admin"
        );
    }

    public function create() {
        $cars = Car::all();
        $users = User::all();
        return VIew::render(
            template: 'admin/reviews/create',
            data: [
                'cars' => $cars,
                'users' => $users
            ],
            layout: 'layouts/admin'
        );
    }

    public function show($id) {
        $review = Review::getReviewById($id);
        return View::render(
            template: '/admin/reviews/show',
            data: [
                'review' => $review
            ],
            layout: "layouts/admin"
        );
    }

    public function updateStatus($id) {
        $review = Review::find($id);
       if(isset($_POST['status']) && in_array($_POST['status'], ['approved', 'rejected'])) {
         unset($review->user_name, $review->car_name, $review->car_model, $review->car_image);
        $review->status = $_POST['status'];
        $review->save();
       }
               
        Router::redirect("/admin/reviews");
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
           $user_id = $_POST['user_id'];
           $car_id = $_POST['car_id'];
           $rating = $_POST['rating'];
           $comment = $_POST['comment'];

           $data = [
            'user_id' => $user_id,
            'car_id' => $car_id,
            'rating' => $rating,
            'comment' => $comment
           ];

           $review = Review::create($data);
           if($review) {
            Router::redirect('/admin/reviews');
           }            
        }
    }

    public function edit($id) {
        $cars = Car::all();
        $users = User::all();
        $review = Review::getReviewById($id);
        return VIew::render(
            template: 'admin/reviews/edit',
            data: [
                'review' => $review,
                'cars' => $cars,
                'users' => $users
            ],
            layout: 'layouts/admin'
        );
    }

    public function update($id) {
        $review = Review::find($id);
        unset($review->user_name, $review->car_name, $review->car_model, $review->car_image);
        $review->user_id = $_POST['user_id'];
        $review->car_id = $_POST['car_id'];
        $review->rating = $_POST['rating'];
        $review->comment = $_POST['comment'];
        $review->save();
        Router::redirect('/admin/reviews');
    }

    public function delete($id) {
        $review = Review::find($id);
        $review->delete();
        Router::redirect('/admin/reviews');
    }
}