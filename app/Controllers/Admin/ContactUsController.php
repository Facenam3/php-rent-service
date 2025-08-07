<?php

namespace App\Controllers\Admin;

use App\Models\Contact;
use Core\Router;
use Core\View;

class ContactUsController {
    
    public function index() {
        $search = $_GET['search'] ?? '';
        $limit = 6;
        $page = $_GET['page'] ?? 1;

        $contacts = Contact::getRecent($limit, $page,$search);
        $total = Contact::count($search);

        return View::render(
            template: 'admin/contacts/contacts',
            data: [
                'contacts' => $contacts,
                'search' => $search,
                'currentPage' => $page,
                'totalPages' => ceil($total/$limit)
            ],
            layout: "layouts/admin"
        );
    }

    public function create() {
        return View::render(
            template: "admin/contacts/create",
            data: [],
            layout: "layouts/admin"
        );
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $data = [
                'name' => $name,
                'email' => $email,
                'message' => $message
            ];

            $contact = Contact::create($data);
            if($contact){
                Router::redirect('/admin/contacts');
            }
        }
    }

    public function edit($id) {
        $contact = Contact::find($id);
        return View::render(
            template: "admin/contacts/edit",
            data: [
                'contact' => $contact
            ],
            layout: "layouts/admin"
        );
    }
    
    public function update($id) {
        $contact = Contact::find($id);
        $contact->name = $_POST['name'];
        $contact->email = $_POST['email'];
        $contact->message = $_POST['message'];
        $contact->save();
        Router::redirect("/admin/contacts");
    }

    public function show($id) {
        $contact = Contact::find($id);
        return View::render(
            template: "admin/contacts/show",
            data: [
                'contact' => $contact
            ],
            layout: "layouts/admin"
        );
    }

    public function delete($id) {
        $contact = Contact::find($id);
        $contact->delete();
        Router::redirect("/admin/contacts");
    }
}