<?php

namespace App\Controllers;

use Core\View;
use App\Services\Auth;
use Core\Router;
use App\Services\CSRF;

class AuthController {
    public function create() {
        return View::render(
            template: "auth/create",
            layout: 'layouts/main'
        );
    }

    public function store() {
       if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(!CSRF::verify()) {
            Router::pageExpired();
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? (bool)$_POST['remember'] : false;

        if(Auth::attempt($email, $password, $remember)) {
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
