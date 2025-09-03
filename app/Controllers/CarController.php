<?php

namespace App\Controllers;

use App\Models\Car;
use App\Models\CarSpecification;
use App\Models\Review;
use Core\Router;
use Core\View;

class CarController{
   public function index() {
        $search = $_GET['search'] ?? '';
        $limit = 6;
        $page = $_GET['page'] ?? 1;
       

        $cars = Car::getRecent($limit, $page, $search);
        $total = Car::countSearch($search);

        return View::render(
            template: 'cars/index',
            layout:'layouts/main',
            data: [
                "cars" => $cars,
                'search' => $search,
                'currentPage' => $page,
                'totalPages' => ceil($total / $limit)
                ]
            );
    }

   
    public function show($id) {
        $id = (int)$id;
        $car = Car::findById($id);
        if(!$car) {
            Router::notFound();
        }

        $reviews = Review::getByCarId($id);
        $car_specifications = CarSpecification::forCar($id);

        return View::render(
            template: 'cars/show',
            layout: 'layouts/main',
            data: [
                'car' => $car,
                'reviews' => $reviews,
                'car_specifications' => $car_specifications
                ]
        );
    }
}