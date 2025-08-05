<?php 

namespace App\Controllers\Admin;

use App\Models\Location;
use Core\Router;
use Core\View;

class LocationsController {
    public function index() {
        $locations = Location::all();
        return View::render(            
            template: 'admin/locations/locations',
            data: ['locations' => $locations],
            layout: 'layouts/admin'
        );
    }

    public function create() {
        return VIew::render(
            template: 'admin/locations/create',
            data: [],
            layout: 'layouts/admin'
        );
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
           $data = [
            'name' => $_POST['name']
           ];

           $location = Location::create($data);
           if($location) {
            Router::redirect('/admin/locations');
           }            
        }
    }

    public function edit($id) {
        $location = Location::find($id);
        return VIew::render(
            template: 'admin/locations/edit',
            data: ['location' => $location],
            layout: 'layouts/admin'
        );
    }

    public function update($id) {
        $location = Location::find($id);
        $location->name = $_POST['name'];
        $location->save();
        Router::redirect('/admin/locations');
    }

    public function delete($id) {
        $location = Location::find($id);
        $location->delete();
        Router::redirect('/admin/locations');
    }
}