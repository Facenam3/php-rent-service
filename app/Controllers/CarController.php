<?php

namespace App\Controllers;

use App\Models\Car;
use App\Models\CarSpecification;
use App\Models\Review;
use Core\Router;
use Core\View;

class CarController{
    public function index() {
        return "All carss";
    }

   
    public function show($id) {
        $car = Car::find($id);
        if(!$car) {
            Router::notFound();
        }

        $reviews = Review::forCars($id);
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