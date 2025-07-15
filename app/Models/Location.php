<?php

namespace App\Models;
use Core\Model;
use Core\App;
use Google\Service\Bigquery\Resource\Models;

class Location extends Model {
    protected static string $table = 'locations';

    public int $id;
    public string $name;
    public string $created_at;
}