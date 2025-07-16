<?php 
namespace App\Models;

use Core\Model;

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

    public function car() {
        return Car::find($this->car_id);
    }
}