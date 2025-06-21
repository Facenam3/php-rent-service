<?php 
namespace App\Models;

use Core\Model;
use Core\App;

class Review extends Model {
    protected static $table = 'reviews';
    public $id;
    public $car_id;
    public $user_id;
    public $rating;
    public $comment;
    public $created_at;

    public static function forCars($carId) : array {
        $db = App::get('database');
        return $db->fetchAll(
            "SELECT * FROM reviews WHERE car_id = ? ORDER BY created_at DESC",
            [$carId],
            static::class
        );
    }
}