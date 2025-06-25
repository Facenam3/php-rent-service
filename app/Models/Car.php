<?php 
namespace App\Models;

use Core\Model;
use Core\App;
use core\Router;

class Car extends Model {
    protected static string $table = 'cars';

    public int $id;
    public string $user;
    public string $brand;
    public string $model;
    public string $type;
    public string $registration_no;
    public int $year;
    public string $available;
    public string $price_per_day;
    public string $image_path;
    public string $created_at;
    public string $car_specification;

    public static function store(array $data) : static {
         $imageContents = false;

        if (isset($data['image_path']) && filter_var($data['image_path'], FILTER_VALIDATE_URL)) {
            $ch = curl_init($data['image_path']);
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

            $extension = pathinfo(parse_url($data['image_path'], PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
            $filename = uniqid('car_') . '.' . $extension;
            $filePath = $uploadDir . $filename;

            file_put_contents($filePath, $imageContents);
            $data['image_path'] = $filePath;
        } else {
            $data['image_path'] = null;
        }

        return static::create($data);
    }

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