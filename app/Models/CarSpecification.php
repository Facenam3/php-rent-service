<?php 
namespace App\Models;

use Core\Model;
use Core\App;

class CarSpecification extends Model {
    protected static $table = 'car_specifications';
    public $id;
    public $car_id;
    public $fuel_type;
    public $transmission;
    public $air_condition;
    public $seats;
    public $created_at;

    public static function forCar($carId) : ?static {
        $db = App::get('database');
        return $db->fetch(
            "SELECT * FROM car_specifications WHERE car_id = ?",
            [$carId],
            static::class 
        );
    }
}