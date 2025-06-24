<?php

namespace App\Controllers;

use Core\View;
use App\Services\Auth;
use Core\Router;

class AuthController {
    public function create() {
        return View::render(
            template: "auth/create",
            layout: 'layouts/main'
        );
    }

    public function store() {
       if($_SERVER['REQUEST_METHOD'] === "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(Auth::attempt($email, $password)) {
         Router::redirect('/');
        }
       }

       return View::render(
            template: "auth/create",
            layout: 'layouts/main',
            data: [
                "error" => "Invalid credentials"
            ]
        );
    }

    public function destroy() {
        Auth::logout();
        Router::redirect('/login');
    }
}
