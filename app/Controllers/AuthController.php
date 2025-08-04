<?php

namespace App\Controllers;

use Core\View;
use App\Services\Auth;
use Core\Router;
use Core\Validator;
use App\Models\User;
use Core\App;

class AuthController {
    public function create() {
        return View::render(
            template: "auth/create",
            layout: 'layouts/main'
        );
    }

    public function register() : string {
        return View::render(
            template: "auth/register",
            layout: "layouts/main"
        );
    }

    public function store(): void {
         if($_SERVER['REQUEST_METHOD'] === "POST") {
           
            $email = $_POST['email'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']) ? (bool)$_POST['remember'] : false;
            $errors = Validator::validate($_POST,[
                'email' => 'required',
                'password' => 'required'
            ]);

            if(empty($errors)) {
                if(Auth::attempt($email, $password, $remember)) {
                    $user = User::findByEmail($email);
                    if($user->role === "admin") {
                        Router::redirect('/admin/dashboard');
                    }
                    Router::redirect('/');
                } else {
                    $_SESSION['error'] = "Invalid email or password.";
                    $_SESSION['old'] = ['email' => $email, 'remember' => $remember];
                    Router::redirect('/login');
                }
            } else {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = ['email' => $email, 'remember' => $remember];
                Router::redirect('/login');
            }           
       }
    }

    public function storeUser() {
        if($_SERVER["REQUEST_METHOD"] === "POST") {

            $mailer = App::get('mailer');
            $first_name = trim(ucfirst($_POST['first_name']));
            $last_name = trim(ucfirst($_POST['last_name']));
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            
            $errors = Validator::validate($_POST,[
                'first_name' => "required",
                'last_name' => "required",
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6'
            ]);

            if(!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email
                ];
                Router::redirect('/register');
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $hashedPassword
            ]);

            if($user) {
                $mailer->send(
                    $user->email,
                    "Welcome to Rent A Car",
                    "Hi {$user->first_name}, thanks for registering!"
                );
                $_SESSION['success'] = "Registration successfull. Please log in.";
                Router::redirect('/login');
            }
        }
    }

    public function destroy() {
        Auth::logout();
        Router::redirect('/login');
    }
}
