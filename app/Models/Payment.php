<?php 

namespace App\Models;

use Core\App;
use Core\Model;

class Payment {
    public static string $table = 'payments';
    public int $id;
    public int $reservation_id;
    public string $payment_method;
    public float $amount;
    public string $transaction_id;
    public string $created_at;
    public string $updated_at;
}