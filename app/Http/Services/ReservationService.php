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
}