<?php

namespace App\Controllers;

use App\Services\GoogleAuth;
use App\Services\Auth;
use Core\App;
use Core\Router;
use App\Models\User;

class GoogleController {
    private GoogleAuth $googleAuth;

    public function __construct() {
        $config = App::get('google');
        $this->googleAuth = new GoogleAuth($config);
    }

    public function redirectToGoogle() {
        $url = $this->googleAuth->getAuthUrl();
        Router::redirect($url);
    }

    public function handleGoogleCallback() {
        if(!isset($_GET['code'])) {
            Router::redirect('/login');
        }

        $mailer = App::get('mailer');

        try {
            $userData = $this->googleAuth->authenticate($_GET['code']);

            $user = User::findByEmail($userData['email']);

            if(!$user) {
                $user = User::create([
                    'oauth_provider' => 'google',
                    'oauth_uid' => $userData['id'],
                    'first_name' => $userData['first_name'],
                    'last_name' => $userData['last_name'],
                    'email' => $userData['email'],
                    'picture' => $userData['picture'],
                    'locale' => $userData['locale'],
                    'password' => null
                ]);
            }
            $mailer->send(
                    $user->email,
                    'Welcome to Rent-a-Car',
                    "Hi {$user->first_name},<br>Thank you for registering with Rent-a-Car using Google!"
            );

           Auth::login($user);

           Router::redirect('/');

        } catch (\Exception $e) {
           $_SESSION['error'] = 'Google login failed: ' . $e->getMessage();
            Router::redirect('/login');
        }
    }
}