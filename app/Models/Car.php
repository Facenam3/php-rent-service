<?php 
namespace App\Models;

use Core\Model;
use Core\App;
use core\Router;

class Car extends Model {
    protected static $table = 'cars';

    public $id;
    public $user;
    public $brand;
    public $model;
    public $type;
    public $registration_no;
    public $year;
    public $available;
    public $price_per_day;
    public $image_path;
    public $created_at;
    public $car_specification;

    public static function getRecent(int $limit) {
        /** @var \Core\Database $db */
        $db = App::get('database');
        return $db->fetchAll(
            "SELECT * FROM " . static::$table . " ORDER BY created_at DESC LIMIT ?" ,
            [$limit] ,
            static::class
        );
    }

}