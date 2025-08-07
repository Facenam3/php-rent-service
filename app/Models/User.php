<?php 
namespace App\Models;

use Core\Model;
use Core\App;

class User extends Model {
    protected static string $table = 'users';
    public int $id;
    public ?string $oauth_provider = null;
    public ?string $oauth_uid = null;
    public string $first_name;
    public string $last_name;
    public string $email;
    public ?string $password = null;
    public ?string $gender = null;
    public ?string $locale = null;
    public ?string $picture = null;

    public string $role;
    public string $created;
    public string $modified;
    public static function findByEmail(string $email) : ?User {
        $db = App::get('database');

        $result = $db->fetch("SELECT * FROM users WHERE email = ?", [$email], static::class);

        return $result ? $result : null;
    }

    public static function findById(int $id) : ?User {
        $db = App::get('database');

        $result = $db->fetch("SELECT * FROM users WHERE id = ?", [$id], static::class);
        return $result ? $result : null;
    }

    public static function getRecent(?int $limit = null, ?int $page = null, ?string $search = null) {
        /** @var \Core\Database $db */
        $db = App::get('database');

        $query = "SELECT * FROM " . static::$table;

        $params = [];

        if ($search !== null) {
            $query .= " WHERE users.last_name LIKE ? OR users.first_name LIKE ? OR users.email LIKE ?";
            $params = ["%$search%", "%$search%", "%$search%"];
        }

        $query .= " ORDER BY users.created DESC";

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
            SELECT COUNT(*) FROM " . static::$table;
        $params = [];

        if ($search !== null) {
           $query .= " WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ?";
            $params = ["%$search%", "%$search%", "%$search%"];
        }

        return (int) $db->query($query, $params)->fetchColumn();
    }
}
