<?php

namespace App\Http\Services;

use App\Http\Repositorys\ReservationRepository;

class ReservationService
{
    public function __construct(
        ReservationRepository $ReservationRepository
    )
    {
        $this->ReservationRepository = $ReservationRepository;
    }
    /**
     * 新增預約
     * @param  Array $reservation_data     [預約資訊]
     */
    public function createReservation(&$reservation_data)
    {
        $this->ReservationRepository->createReservation($reservation_data);
    }

    /**
     * 取得該日預約
     * @param  Array $get_reservations_data     [刪除Reservation資訊]
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