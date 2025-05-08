<?php

namespace App\Controller;

class CarController{
    public function index() {
        return "All carss";
    }

    public function show($id) {
        return "Car number $id";
    }
}