<?php 

namespace App\Controllers\Admin;

use Core\View;

class LocationsController {
    public function index() {
        return View::render(
            template: 'admin/locations/locations',
            data: [],
            layout: 'layouts/admin'
        );
    }
}