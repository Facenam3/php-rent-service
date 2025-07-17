<?php 

namespace App\Models;

use Core\App;
use Core\Model;

class Payment extends Model{
    public static string $table = 'payments';
    public int $id;
    public int $reservation_id;
    public string $payment_method;
    public float $amount;
    public string $status;
    public string $transaction_id;
    public string $created_at;
    public string $updated_at;

    public static function findByReservation($reservationId) {
        $db = App::get('database');
        return $db->fetch("SELECT * FROM payments WHERE reservation_id = ?", [$reservationId], static::class);
    }

    public static function markAsComplete($reservationId, $transactionId) {
        $db = App::get('database');
        $sql = "UPDATE payments SET status = 'complete' , transaction_id = ? WHERE reservation_id = ?";
        $db->query(
            $sql , 
            [ $transactionId,
            $reservationId ]
        );
    }
}