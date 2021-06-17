<?php

namespace App\Http\Services;

use App\Http\Repositorys\ClinicRepository;
use App\Http\Repositorys\ReservationRepository;

class ClinicService
{
    public function __construct(
        ClinicRepository $ClinicRepository,
        ReservationRepository $ReservationRepository
    ) {
        $this->ClinicRepository = $ClinicRepository;
        $this->ReservationRepository = $ReservationRepository;
    }

    /**
     * 取得診所資訊
     * @param  Int $clinic_id     [診所id]
     * @return Array  $clinic_data    [診所資料]
     */
    public function getClinicData($clinic_id)
    {
        $clinic_data = $this->ClinicRepository->getClinicData($clinic_id);
        return $clinic_data;
    }

    /**
     * 取得診所資訊
     * @param  Int $clinic_id [診所id]
     * @param  Int $date      [查詢日期]
     * @return Array  $clinic_data    [診所資料]
     */
    public function getDoctorFreeData($clinic_id, $date, $day)
    {
        $doctor_datas = $this->ClinicRepository->getDoctorDataByClinic($clinic_id);
        $doctor_free_datas = [];
        foreach ($doctor_datas as $doctor) {
            $diagnosis_times = $doctor->diagnosisTimes->where('day', $day);
            $time_collection = collect([]);
            foreach ($diagnosis_times as $diagnosis_time) {
                $time_collection = $time_collection->merge($this->getTimeCollectonByStartAndEnd($diagnosis_time->start_at, $diagnosis_time->end_at));
            }
            $reservation = $this->ReservationRepository->getReservationByClinicIdAndDate($clinic_id, $date)->groupBy('doctor_id');
            $reservation = empty($reservation[$doctor->user_id]) ? collect([]) : $reservation[$doctor->user_id];
            $reservation = $reservation->pluck('datetime')->map(function ($date) {
                return date('H:i', strtotime($date));
            });
            $time_collection = $time_collection->diff($reservation); //醫生當天可用時間與被預約的時間取差集
            if ($date == date('Y-m-d')) {
                $time_collection = $time_collection->filter(function ($time) {
                    return $time > date('H:i');
                });
            }
            $doctor_free_datas[$doctor->user->name] = ['times' => array_values($time_collection->toArray()), 'doctor_id' => $doctor->user_id];
        }
        return $doctor_free_datas;
    }

    /**
     * 取得一段時間內 所有的time節點，半小時一個單位
     * @param  String $start_at [看診開始時間]
     * @param  String $end_at   [看診結束時間]
     * @return collection  $time_collection  [所有時間節點]
     */
    private function getTimeCollectonByStartAndEnd($start_at, $end_at)
    {
        $start_time = strtotime($start_at);
        $end_time = strtotime($end_at);
        $time_collection = [];
        while ($start_time <= $end_time) {
            $time_collection[] = $start_at;
            $start_at = date("H:i", strtotime('+30 minutes', $start_time));
            $start_time = strtotime($start_at);
        }
        return collect($time_collection);
    }
}
