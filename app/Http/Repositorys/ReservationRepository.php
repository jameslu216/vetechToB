<?php

namespace App\Http\Repositorys;

use App\Models\Reservation;

class ReservationRepository
{
    /**
     * 取得特定診所特定日子的預約
     * @param  Integer $clinic_id    [診所id]
     * @param  Date $date    [特定日子]
     */
    public function getReservationByClinicIdAndDate($clinic_id, $date)
    {
        $reservation = Reservation::where('clinic_id', $clinic_id)->where('date', 'like', $date . '%')->get();
        return $reservation;
    }

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
    /**
     * 刪除預約
     * @param  Array $remove_reservation_data     [刪除預約資訊]
     */
    public function removeReservation(&$remove_reservation_data)
    {
        $reservation = Reservation::find($remove_reservation_data['reservation_id']);
        $reservation->delete();
    }
}
