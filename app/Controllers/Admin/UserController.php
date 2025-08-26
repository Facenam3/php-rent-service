<?php

namespace App\Controllers\Admin;

use App\Models\User;
use Core\Router;
use Core\View;

class UserController{

    public function index() {
        $search = $_GET['search'] ?? '';
        $limit = 6;
        $page = $_GET['page'] ?? 1;

        $users = User::getRecent($limit, $page,$search);
        $total = User::countSearch($search);
        return View::render(
            template: 'admin/users/users',
            data: [
                'users' => $users,
                'search' => $search,
                'currentPage' => $page,
                'totalPages' => ceil($total/$limit)
            ],
            layout: 'layouts/admin'
        );
    }

    public function create() {
        return View::render(
            template: 'admin/users/create',
            data: [],
            layout: 'layouts/admin'
        );
    }

    public function store() {
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $role = $_POST['role'];
            $password = $_POST['password'];
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'gender' => $gender,
                'role' => $role,
                'password' => $hashedPassword
            ];

            $user = User::create($data);
            if($user) {
                Router::redirect('/admin/users');
            }

        }
    }

    public function edit($id) {
        $user = User::find($id);
        return View::render(
            template: 'admin/users/edit',
            data: [
                'user' => $user
            ],
            layout: 'layouts/admin'
        );
    }

    public function update($id) {
        $user = User::find($id);
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->gender = $_POST['gender'];
        $user->role = $_POST['role'];
        $user->save();

        Router::redirect('/admin/users');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        Router::redirect("/admin/users");
    }
}