<?php

namespace App\Services;

use Core\App;
use DateTime;

class ReservationCleaner {
    public function handle(): void {
        $db = App::get('db');
        $now = (new \DateTime())->format("Y-m-d H:i:s");
        $startOfToday = (new \DateTime())->format("Y-m-d") . "T00:00";
        
        $completedReservations = $db->fetchAll("
            SELECT id, car_id, end_date, status
            FROM reservations
            WHERE end_date < :today
            AND status = 'complete'
            ORDER BY end_date
        ", [':today' => $startOfToday]);
        
        echo "Found " . count($completedReservations) . " completed reservations to process:\n";
        
        $carsFreed = 0;
        
        foreach ($completedReservations as $reservation) {
            $carId = $reservation['car_id'];
            
            $futureReservations = $db->fetchAll("
                SELECT id 
                FROM reservations 
                WHERE car_id = :car_id 
                AND end_date >= :today
                LIMIT 1
            ", [
                ':car_id' => $carId, 
                ':today' => $startOfToday
            ]);
            
            if (empty($futureReservations)) {
                echo "Freeing car ID: {$carId} from reservation {$reservation['id']} (ended: {$reservation['end_date']})\n";
                
                $db->query("
                    UPDATE cars
                    SET status = 'available'
                    WHERE id = :car_id
                ", [':car_id' => $carId]);
                
                $carsFreed++;
            } else {
                echo "Skipping car ID: {$carId} - has future reservations\n";
            }
        }

        echo "[ReservationCleaner] Successfully freed up {$carsFreed} cars at $now\n";
    }
}


 
