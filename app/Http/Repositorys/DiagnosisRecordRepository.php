<?php

namespace App\Http\Repositorys;

use App\Models\DiagnosisRecord;
use App\Models\Reservation;
use \Datetime;

class DiagnosisRecordRepository
{
    /**
     * 新增看診紀錄
     * @param  Array $diagnosis_note [診後紀錄]    
     * @param  Array $reservation [預約資訊]
     */
    public function createDiagnosisRecord(&$diagnosis_note, &$reservation)
    {
        echo $reservation;
        $diagnosis_record = DiagnosisRecord::firstOrNew(
            [
                'id' => DiagnosisRecord::count(),
                'customer_name' => $reservation->customer_name,
                'customer_id' => $reservation->customer_id,
                'pet_name' => $reservation->pet_name,
                'datetime' => $reservation->datetime,
                'clinic_id' => $reservation->clinic_id,
            ]
        );
        $diagnosis_record->customer_name = $reservation->customer_name;
        $diagnosis_record->customer_id = $reservation->customer_id;
        $diagnosis_record->phone = $reservation->phone;
        $diagnosis_record->pet_name = $reservation->pet_name;
        $diagnosis_record->pet_variety = $reservation->pet_variety;
        $diagnosis_record->pet_gender = $reservation->pet_gender;
        $diagnosis_record->pet_age = $reservation->pet_age;
        $diagnosis_record->serve_type = $reservation->serve_type;
        $diagnosis_record->note = $reservation->note;
        $diagnosis_record->datetime = $reservation->datetime;
        $diagnosis_record->doctor_id = $reservation->doctor_id;
        $diagnosis_record->clinic_id = $reservation->clinic_id;
        $diagnosis_record->diagnosis_note = $diagnosis_note;
        $diagnosis_record->save();
        return $diagnosis_record;
    }

}
