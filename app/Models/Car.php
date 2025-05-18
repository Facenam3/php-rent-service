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

    public static function getRecent(?int $limit = null, ?int $page = null, ?string $search = null) {
        /** @var \Core\Database $db */
        $db = App::get('database');

        $query = "SELECT * FROM " . static::$table;
        $params = [];
 
        if($search !== null) {
            $query .= " WHERE brand LIKE ? OR model LIKE ?";
            $params = ["%$search%" , "%$search%"];
        }

        if($limit !== null) {
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

    public static function count(?string $search = null): int {
        /** @var \Core\Database $db */
        $db = App::get('database');

        $query = "SELECT COUNT(*) FROM " . static::$table;
        $params = [];
 
        if($search !== null) {
            $query .= " WHERE brand LIKE ? OR model LIKE ?";
            $params = ["%$search%" , "%$search%"];
        }

        return (int) $db->query($query, $params)->fetchColumn();
    }

}