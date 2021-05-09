<?php

namespace App\Http\Repositorys;

use App\Models\Reservation;

class ReservationRepository
{
    /**
     * 新增預約
     * @param  Array $reservation_data     [預約資訊]
     */
    public function createReservation(&$reservation_data)
    {
        $reservation = Reservation::firstOrNew(
            [
                'customer_name' => $reservation_data['customer_name'],
                'pet_name' => $reservation_data['pet_name'],
                'date' => $reservation_data['date'],
                'clinic_id' => $reservation_data['clinic_id'],
            ]
        );
        $reservation->customer_name = $reservation_data['customer_name'];
        $reservation->phone = $reservation_data['phone'];
        $reservation->pet_name = $reservation_data['pet_name'];
        $reservation->pet_variety = $reservation_data['pet_variety'];
        $reservation->pet_gender = $reservation_data['pet_gender'];
        $reservation->pet_age = $reservation_data['pet_age'];
        $reservation->serve_type = $reservation_data['serve_type'];
        $reservation->note = $reservation_data['note'];
        $reservation->date = $reservation_data['date'];
        $reservation->doctor_id = $reservation_data['doctor_id'];
        $reservation->clinic_id = $reservation_data['clinic_id'];
        $reservation->save();
    }
}
