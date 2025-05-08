<?php

namespace App\Controller;

use Core\View;

class HomeController {
    public function index() {
        return View::render(
            template: 'home/index',
             layout:'layouts/main',
              data: ["message" => "Home"]
            );
    }
}