<?php

namespace App\Controllers\Admin;

use App\Models\Car;
use App\Models\CarSpecification;
use Core\Router;
use Core\View;

class CarController {
    public function index () {
        $search = $_GET['search'] ?? '';
        $limit = 6;
        $page = $_GET['page'] ?? 1;

        $cars = Car::getRecent($limit, $page,$search);
        $total = Car::count($search);
        return View::render(
            template: "admin/cars/cars",
            data: [
                'cars' => $cars,
                'search' => $search,
                'currentPage' => $page,
                'totalPages' => ceil($total/$limit)
            ],
            layout: "layouts/admin"
        );
    }   

    public function create() {
        return View::render(
            template: "admin/cars/create",
            data: [

            ],
            layout: "layouts/admin"
        );
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $type = $_POST['type'];
            $price_per_day = $_POST['price_per_day'];
            $year = $_POST['year'];
            $image_path = $_POST['image_path'];

            $doors = $_POST['doors'];
            $fuel_type = $_POST['fuel_type'];
            $fuel_consumption = $_POST['fuel_consumption'];
            $transmission = $_POST['transmission'];
            $air_condition = $_POST['air_condition'];
            $max_passengers = $_POST['max_passengers'];

            $carData = [
                'brand' => $brand,
                'model' => $model,
                'type' => $type,
                'price_per_day' => $price_per_day,
                'year' => $year,
                'status' => 'available',
                'image_path' => $image_path
            ];

            $imageContents = false;

            if (isset($carData['image_path']) && filter_var($carData['image_path'], FILTER_VALIDATE_URL)) {
                $ch = curl_init($carData['image_path']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                $imageContents = curl_exec($ch);

                if (curl_errno($ch)) {
                    $imageContents = false;
                }

                curl_close($ch);
            }

            if($imageContents !== false) {
                $uploadDir = "uploads/vehicle/";
                if(!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $extension = pathinfo(parse_url($carData['image_path'], PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                $filename = uniqid('car_') . '.' . $extension;
                $filePath = $uploadDir . $filename;

                file_put_contents($filePath, $imageContents);
                $carData['image_path'] = $filePath ?? '';;
            } else {
                $carData['image_path'] = $filePath ?? '';;
            }
            $car = Car::create($carData);

            $carSpecData = [
                'car_id' => $car->id,
                'doors' => $doors,
                'fuel_type' => $fuel_type,
                'transmission' => $transmission,
                'fuel_consumption' => $fuel_consumption,
                'air_condition' => $air_condition,
                'max_passengers' => $max_passengers
            ];

            
            if($car) {
                $carSpec = CarSpecification::create($carSpecData);
            }
            Router::redirect("/admin/cars");
            
        }
    }

    public function edit($id) {
        $car = Car::findById($id);
        return View::render(
            template: "admin/cars/edit",
            data: [
                'car' => $car
            ],
            layout: "layouts/admin"
        );
    }

   public function update($id) {
        $car = Car::find($id);
        $carSpec = CarSpecification::forCar($car->id);

        $car->brand = $_POST['brand'];
        $car->model = $_POST['model'];
        $car->type = $_POST['type'];
        $car->price_per_day = $_POST['price_per_day'];
        $car->year = $_POST['year'];

        $newImageUrl = trim($_POST['image_path']);
        $currentImage = $car->image_path; 

        if (!empty($newImageUrl) && filter_var($newImageUrl, FILTER_VALIDATE_URL)) {
            $ch = curl_init($newImageUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $imageContents = curl_exec($ch);
            curl_close($ch);

            if ($imageContents !== false) {
                $uploadDir = "uploads/vehicle/";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $extension = pathinfo(parse_url($newImageUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                $filename = uniqid('car_') . '.' . $extension;
                $filePath = $uploadDir . $filename;

                file_put_contents($filePath, $imageContents);
                $car->image_path = $filePath;
            } else {
                $car->image_path = $currentImage;
            }
        } else {
            $car->image_path = $currentImage; 
        }

        $car->save();

        $carSpec->doors = $_POST['doors'];
        $carSpec->fuel_type = $_POST['fuel_type'];
        $carSpec->fuel_consumption = $_POST['fuel_consumption'];
        $carSpec->transmission = $_POST['transmission'];
        $carSpec->air_condition = $_POST['air_condition'];
        $carSpec->max_passengers = $_POST['max_passengers'];
        $carSpec->save();

        if ($car && $carSpec) {
            Router::redirect('/admin/cars');
        }
    }


    public function delete($id) {
        $car = Car::findById($id);
        $carSpec = CarSpecification::find($car->id);
        if($car) {
            $car->delete();
            $carSpec->delete();
        }
        
        Router::redirect("/admin/cars");
    }
}