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
    public $status;

    
    public $user_name;
    public $car_image;
    public $car_name;
    public $car_model;

    public static function forCars($carId) : array {
        $db = App::get('database');
        return $db->fetchAll(
            "SELECT * FROM reviews WHERE car_id = ? ORDER BY created_at DESC",
            [$carId],
            static::class
        );
    }

    public static function getByCarId($carId) {
        $db = App::get('database');
        $sql = "
            SELECT reviews.*, users.first_name AS user_name 
            FROM reviews
            JOIN users ON reviews.user_id = users.id
            WHERE reviews.car_id = ?
            ORDER BY reviews.created_at DESC
        ";
        return $db->fetchAll($sql, [$carId]);
    }

    public static function getReviews() {
        $db = App::get('database');
        $sql = "
        SELECT reviews.*, 
            users.first_name AS user_name,
            cars.image_path AS car_image,
            cars.brand as car_name,
            cars.model as car_model
        FROM reviews
        JOIN users ON reviews.user_id = users.id
        JOIN cars ON reviews.car_id = cars.id
        ";
        $reviews = $db->fetchAll($sql, [], static::class);

        return $reviews;
    }

    public static function getReviewById($id) {
        $db = App::get('database');
        $sql = "
        SELECT reviews.*, 
            users.first_name AS user_name,
            cars.brand as car_name,
            cars.model as car_model
        FROM reviews
        JOIN users ON reviews.user_id = users.id
        JOIN cars ON reviews.car_id = cars.id
        WHERE reviews.id = :id
        LIMIT 1
        ";
        $reviews = $db->fetch($sql, ['id' => $id], static::class);

        return $reviews;
    }

    public static function getRecent(?int $limit = null, ?int $page = null, ?string $search = null) {
        /** @var \Core\Database $db */
        $db = App::get('database');

        $query = "
            SELECT reviews.*, 
                users.first_name AS user_name, 
                cars.brand AS car_name, 
                cars.model AS car_model
            FROM reviews
            JOIN users ON reviews.user_id = users.id
            JOIN cars ON reviews.car_id = cars.id
        ";

        $params = [];

        if ($search !== null) {
            $query .= " WHERE reviews.comment LIKE ? OR users.first_name LIKE ?";
            $params = ["%$search%", "%$search%"];
        }

        $query .= " ORDER BY reviews.created_at DESC";

        if ($limit !== null) {
            $query .= " LIMIT ?";
            $params[] = $limit;
        }

        if ($page !== null && $limit !== null) {
            $offset = ($page - 1) * $limit;
            $query .= " OFFSET ?";
            $params[] = $offset;
        }

        return $db->fetchAll($query, $params, static::class);
    }

    public static function count(?string $search = null): int {
        /** @var \Core\Database $db */
        $db = App::get('database');

        $query = "
            SELECT COUNT(*) FROM reviews
            JOIN users ON reviews.user_id = users.id
        ";
        $params = [];

        if ($search !== null) {
            $query .= " WHERE reviews.comment LIKE ? OR users.first_name LIKE ?";
            $params = ["%$search%", "%$search%"];
        }

        return (int) $db->query($query, $params)->fetchColumn();
    }
}