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

    public static function getRecent(?int $limit = null, ?int $page = null, ?string $search = null) {
        /** @var \Core\Database $db */
        $db = App::get('database');

        $query = "
            SELECT payments.*,
                reservations.id AS reservation_id
            FROM payments
            JOIN reservations ON payments.reservation_id = reservations.id
        ";

        $params = [];

        if ($search !== null) {
            $query .= " WHERE payments.amount LIKE ? OR payments.status LIKE ?";
            $params = ["%$search%", "%$search%"];
        }

        $query .= " ORDER BY payments.created_at DESC";

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
            SELECT COUNT(*) FROM payments
            JOIN reservations ON payments.reservation_id = reservations.id
        ";
        $params = [];

        if ($search !== null) {
            $query .= " WHERE payments.amount LIKE ? OR payments.status LIKE ?";
            $params = ["%$search%", "%$search%"];
        }

        return (int) $db->query($query, $params)->fetchColumn();
    }
}