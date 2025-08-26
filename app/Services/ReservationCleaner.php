<?php

namespace App\Services;

use Core\App;
use DateTime;

class ReservationCleaner {
    public function handle() : void {
        $db = App::get('db');
        $now = (new DateTime())->format("Y-m-d H:i:s");

        $expired = $db->fetchAll("
            SELECT id, car_id 
            FROM reservations 
            WHERE end_date < :now AND status = 'pending'
        ",[':now' => $now]);

        foreach($expired as $reservation) {
            $db->query("
                UPDATE reservations
                SET status = 'completed', updated_at = :now
                WHERE id = :id
            ", [":id" => $reservation['id'], ':now' => $now]);

            $db->query("
                UPDATE cars
                SET status = 'available'
                WHERE id = :car_id
            ", [':car_id' => $reservation['car_id']]);
        }

        echo "[ReservationCleaner] Cleared " . count($expired) . " reservations at $now\n";
    }
}