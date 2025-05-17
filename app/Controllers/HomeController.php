<?php

namespace App\Controllers;

use Core\View;
use App\Models\Car;

class HomeController {

   
    public function index() {
        $cars = Car::getRecent(5);
        return View::render(
            template: 'home/index',
             layout:'layouts/main',
              data: ["cars" => $cars]
            );
    }
}