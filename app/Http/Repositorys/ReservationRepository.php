<?php

namespace App\Http\Repositorys;

use App\Models\Reservation;
use App\Models\Doctor;
use \Datetime;

use Illuminate\Support\Facades\Auth;

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
        $reservation_id = Reservation::where('clinic_id', '=', $reservation_data['clinic_id'])->max('id') + 1;

        $user = Auth::user();
        $customer = $user->customers()->first();
        $customer_name = $customer->name();

        $reservation = Reservation::firstOrNew(
            [
                'id' => $reservation_id,
                'clinic_id' => $reservation_data['clinic_id'],
                // 'customer_name' => $customer_name,
                'customer_id' => $customer->id,
                'pet_name' => $reservation_data['pet_name'],
                'datetime' => $reservation_data['date'],
            ]
        );
        $reservation->id = $reservation_id;
        $reservation->customer_name = $customer_name;
        $reservation->customer_id = $customer->id;
        $reservation->phone = $user->phone;
        $reservation->pet_name = $reservation_data['pet_name'];
        $reservation->pet_variety = $reservation_data['pet_variety'];
        $reservation->pet_gender = $reservation_data['pet_gender'];
        $reservation->pet_age = $reservation_data['pet_age'];
        $reservation->serve_type = $reservation_data['serve_type'];
        $reservation->note = $reservation_data['note'];
        $reservation->datetime = $reservation_data['date'];
        $reservation->doctor_id = $reservation_data['doctor_id'];
        $reservation->clinic_id = $reservation_data['clinic_id'];
        $reservation->save();
    }

    /**
     * 取得指定預約
     * @param  Int $clinic_id [診所id]
     * @param  Int $datetime  [預約時間]
     * @return Object  $reservation    [預約資料]
     */
    public function getReservationByClinicIdAndDatetime($clinic_id, $datetime)
    {
        $reservation = Reservation::where('clinic_id', '=', $clinic_id)
                                    ->where('datetime', '=', $datetime)
                                    ->first();
        return $reservation;
    }

    /**
     * 取得指定預約
     * @param  Int $clinic_id [診所id]
     * @param  Int $reservation_id     [預約id]
     * @return Object  $reservation    [預約資料]
     */
    public function getReservationById($clinic_id, $reservation_id)
    {
        // find() only works with single-column keys, so we use where() here
        $reservation = Reservation::where('clinic_id', '=', $clinic_id)
                                    ->where('id', '=', $reservation_id)
                                    ->first();
        return $reservation;
    }

    /**
     * 取得當日預約
     * @param  Int $clinic_id [診所id]
     * @param  Date $date     [日期]
     * @return Object  $reservations    [預約資料]
     */
    public function getReservationData($clinic_id, $date)
    {

        // find() only works with single-column keys, so we use where() here
        $date = DateTime::createFromFormat('Y-m-d', $date);
        $reservations = Reservation::where('clinic_id', '=', $clinic_id)
                                    ->whereDate('datetime', '=', $date)
                                    ->get()->each(function(&$reservation) {
                    $doctor = Doctor::where('id', '=', $reservation['doctor_id'])->first();
                    $reservation['doctor_name'] = $doctor->name();
                    $datetime = Datetime::createFromFormat('Y-m-d H:i', date('Y-m-d H:i',strtotime($reservation['datetime'])));
                    $reservation['date'] = $datetime->format('Y-m-d');
                    $reservation['time'] = $datetime->format('H:i');
                    $reservation['reservation_id'] = strval($reservation['id']);
                }
                )->makeHidden(['doctor_id', 'datetime', 'id']);
        return $reservations;
    }

    /**
     * 刪除預約
     * @param  Array $remove_reservation_data     [刪除Reservation資訊]
     */
    public function removeReservation(&$remove_reservation_data)
    {
        // find() only works with single-column keys, so we use where() here
        $reservation = Reservation::where('id', '=', $remove_reservation_data['reservation_id'])
                                    ->where('clinic_id', '=', $remove_reservation_data['clinic_id'])
                                    ->first();
        if ($reservation) {
            $reservation->delete();            
            return true;
        } else {
            return false;
        }
    }

    /**
     * 修改預約
     * @param  Array $modify_reservation_data     [修改Reservation資訊]
     */
    public function modifyReservation(&$modify_reservation_data)
    {
        // find() only works with single-column keys, so we use where() here
        $reservation = Reservation::where('id', '=', $modify_reservation_data['reservation_id'])
                                    ->where('clinic_id', '=', $modify_reservation_data['clinic_id'])
                                    ->first();
        if ($reservation) {
            $update_array = [];
            // should add in Reservation Model fillable
            if (!empty($modify_reservation_data['doctor_id'])) {
                $update_array['doctor_id'] = intval($modify_reservation_data['doctor_id']);
            }
            $datetime_str = $reservation->datetime;
            $datetime = Datetime::createFromFormat('Y-m-d H:i:s', $datetime_str);
            if (!empty($modify_reservation_data['date'])) {
                $date = DateTime::createFromFormat('Y-m-d', $modify_reservation_data['date']);
                $year = intval($date->format('Y'));
                $month = intval($date->format('m'));
                $day = intval($date->format('d'));
                $datetime->setDate($year, $month, $day);
            }
            if (!empty($modify_reservation_data['time'])) {
                $time = DateTime::createFromFormat('H:i', $modify_reservation_data['time']);
                $hour = intval($time->format('H'));
                $minute = intval($time->format('i'));
                $datetime->setTime($hour, $minute);
            }
            $update_array['datetime'] = $datetime->format('Y-m-d H:i:s');
            $reservation->update($update_array);            
        }
    }
}
