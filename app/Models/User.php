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
}
