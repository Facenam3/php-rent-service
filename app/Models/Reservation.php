<?php 
namespace App\Models;

use Core\Model;
use Core\App;

class Reservation extends Model {
    protected static string $table = 'reservations';

    public int $id;
    public ?int $user_id;
    public int $car_id;
    public string $email;
    public string $start_date;
    public string $end_date;
    public float $price_per_day;
    public float $total_price;
    public string $status;
    public int $pickup_location_id;
    public int $dropoff_location_id;
    public string $created_at;
    public string $updated_at;

   public $car_brand;
    public $car_model;
    public $image_path;
    public $user_name;
    public $pickup_location;
    public $dropoff_location;

    public function car() {
        return Car::find($this->car_id);
    }
     public static function getRecent(?int $limit = null, ?int $page = null, ?string $search = null) {
        $db = App::get('database');

        $query = "
            SELECT reservations.*, 
                users.first_name AS user_name, 
                cars.image_path,
                cars.brand AS car_brand, 
                cars.model AS car_model,
                lp.name AS pickup_location,
                ld.name AS dropoff_location
            FROM reservations
            LEFT JOIN users ON reservations.user_id = users.id
            LEFT JOIN cars ON reservations.car_id = cars.id
            LEFT JOIN locations lp ON reservations.pickup_location_id = lp.id
            LEFT JOIN locations ld ON reservations.dropoff_location_id = ld.id
        ";

        $params = [];

        if ($search !== null) {
            $query .= " WHERE reservations.email LIKE ?
                        OR users.first_name LIKE ?
                       ";
            $params = ["%$search%", "%$search%",];
        }

        $query .= " ORDER BY reservations.created_at DESC";

        if ($limit !== null) {
            $query .= " LIMIT ?";
            $params[] = $limit;
        }

      if($page !== null && $limit !== null) {
            $offset = ($page - 1) * $limit;
            $query .= " OFFSET ?";
            $params[] = $offset;
        }

        return $db->fetchAll($query, $params, static::class);
    }


    public static function countSearch(?string $search = null): int {
        $db = App::get('database');

        $query = "
            SELECT COUNT(*) 
            FROM reservations
            LEFT JOIN users ON reservations.user_id = users.id
            LEFT JOIN cars ON reservations.car_id = cars.id
        ";

        $params = [];

        if ($search !== null && $search !== '') {
            $query .= " WHERE reservations.email LIKE ?
                        OR users.first_name LIKE ?
                        OR cars.brand LIKE ?
                        OR cars.model LIKE ?";
            $params = ["%$search%", "%$search%", "%$search%", "%$search%"];
        }

        return (int) $db->query($query, $params)->fetchColumn();
    }

    public static function findById($id) : ?Reservation {
        $db = App::get('database');

        $sql = "SELECT reservations.*, 
                users.first_name AS user_name, 
                cars.image_path,
                cars.brand AS car_brand, 
                cars.model AS car_model,
                lp.name AS pickup_location,
                ld.name AS dropoff_location
            FROM reservations
            LEFT JOIN users ON reservations.user_id = users.id
            LEFT JOIN cars ON reservations.car_id = cars.id
            LEFT JOIN locations lp ON reservations.pickup_location_id = lp.id
            LEFT JOIN locations ld ON reservations.dropoff_location_id = ld.id
            WHERE reservations.id = ?
            ";

        $result = $db->fetch($sql, [$id], self::class);

        return $result ? $result : null;
    }

    public static function reservationsPending() {
        $db = App::get('database');

        $sql = "
            SELECT COUNT(*) as total
            FROM reservations
            WHERE status = 'pending'
        ";

        $row = $db->fetch($sql);

        return (int) ($row['total'] ?? 0);
    }

    public static function reservationsCompleted() {
        $db = App::get('database');

        $sql = "
            SELECT COUNT(*) as total
            FROM reservations
            WHERE status = 'complete'
        ";

        $row = $db->fetch($sql);

        return (int) ($row['total'] ?? 0);
    }
}