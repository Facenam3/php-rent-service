<?php

namespace App\Controllers\Admin;

use App\Services\Authorization;
use Core\View;

class AdminController {
    public function index() {
        Authorization::verify('dashboard');
        return View::render(
            template: 'admin/dashboard',
            data: [],
            layout: 'layouts/admin'
        );
    }
}