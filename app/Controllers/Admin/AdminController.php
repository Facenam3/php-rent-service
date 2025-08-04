<?php

namespace App\Controllers\Admin;

use Core\View;

class AdminController {
    public function index() {
        return View::render(
            template: 'admin/dashboard',
            data: [],
            layout: 'layouts/admin'
        );
    }
}