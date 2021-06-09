<?php

namespace App\Http\Services;

use App\Http\Repositorys\ReservationRepository;

class ReservationService
{
    public function __construct(
        ReservationRepository $ReservationRepository
    ) {
        $this->ReservationRepository = $ReservationRepository;
    }
    /**
     * 新增預約
     * @param  Array $reservation_data     [預約資訊]
     * @return Bool  [是否預約成功]
     */
    public function createReservation(&$reservation_data)
    {
        $available = $this->checkReservationAvailable($reservation_data['clinic_id'], $reservation_data['date']);
        if($available){
            $this->ReservationRepository->createReservation($reservation_data);
            return true;
        } else {
            return false;
        }
    }

    /**
     * 確認預約
     * @param  Array $reservation_data  [預約資訊]
     * @return Bool  [是否可以預約資料]
     */
    private function checkReservationAvailable($clinic_id, $datetime)
    {
        $reservation = $this->ReservationRepository->getReservationByClinicIdAndDatetime($clinic_id, $datetime);
        if (empty($reservation)) {
            return true; //代表可以預約
        } else {
            return false;
        }
    }

    /**
     * 取得特定預約
     * @param  Int $clinic_id     [診所id]
     * @param  Int $reservation_id     [預約id]
     */
    public function getReservationById($clinic_id, $reservation_id)
    {
        return $this->ReservationRepository->getReservationById($clinic_id, $reservation_id);
    }

    /**
     * 取得該日預約
     * @param  Array $clinic_id     [診所id]
     * @param  Datetime $date     [日期]
     */
    public function getReservationData($clinic_id, $date)
    {
        return $this->ReservationRepository->getReservationData($clinic_id, $date);
    }

    /**
     * 刪除預約
     * @param  Array $remove_reservation_data     [刪除Reservation資訊]
     */
    public function removeReservation(&$remove_reservation_data)
    {
        return $this->ReservationRepository->removeReservation($remove_reservation_data);
    }

    /**
     * 修改預約
     * @param  Array $modify_reservation_data     [修改Reservation資訊]
     */
    public function modifyReservation(&$modify_reservation_data)
    {
        $this->ReservationRepository->modifyReservation($modify_reservation_data);
    }
}
