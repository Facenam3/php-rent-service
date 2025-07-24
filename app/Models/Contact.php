<?php

namespace App\Models;

use Core\Model;

class Contact extends Model{
    public static string $table = 'contact';
    public int $id;
    public string $name;
    public string $email;
    public string $message;
    public string $created_at;
}