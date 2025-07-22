<?php 
namespace App\Models;

use Core\Model;
use Core\App;

class Review extends Model {
    protected static string $table = 'reviews';
    public int $id;
    public $car_id;
    public $user_id;
    public $rating;
    public $comment;
    public $created_at;

    public $user_name;
    public $car_image;

    public static function forCars($carId) : array {
        $db = App::get('database');
        return $db->fetchAll(
            "SELECT * FROM reviews WHERE car_id = ? ORDER BY created_at DESC",
            [$carId],
            static::class
        );
    }

    public static function getReviews() {
        $db = App::get('database');
        $sql = "
        SELECT reviews.*, users.first_name AS user_name, cars.image_path AS car_image 
        FROM reviews
        JOIN users ON reviews.user_id = users.id
        JOIN cars ON reviews.car_id = cars.id
        ORDER BY reviews.created_at DESC
        ";
        $reviews = $db->fetchAll($sql,[],static::class);

        return $reviews;
    }
}