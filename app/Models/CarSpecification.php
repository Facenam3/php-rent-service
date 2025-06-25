<?php 
namespace App\Models;

use Core\Model;
use Core\App;

class CarSpecification extends Model {
    protected static string $table = 'car_specifications';
    public int $id;
    public int $car_id;
    public string $fuel_type;
    public string $transmission;
    public string $air_condition;
    public string $seats;
    public string $created_at;

    public static function forCar($carId) : ?static {
        $db = App::get('database');
        return $db->fetch(
            "SELECT * FROM car_specifications WHERE car_id = ?",
            [$carId],
            static::class 
        );
    }
}