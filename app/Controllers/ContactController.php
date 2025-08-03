<?php

namespace App\Controllers;

use App\Models\Contact;
use Core\Router;
use Core\View;

class ContactController {
    public function contact() {
        return  View::render(
            template: "contact/contact-us",
            layout: "layouts/main"
        );
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $contact = Contact::create([
                'name' => $name,
                'email' => $email,
                'message' => $message
            ]);

            if($contact) {
                Router::redirect('/contact');
            }
        }
    }
}