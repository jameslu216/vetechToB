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
        $next_id = DiagnosisRecord::where('clinic_id', '=', $reservation->clinic_id)
                                    ->max('id') + 1;
        $diagnosis_record = DiagnosisRecord::firstOrNew(
            [
                'id' => $next_id,
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


    /**
     * 取得看診紀錄
     * @param  Int $clinic_id [診所id]
     * @param  Int $customer_id     [顧客id]
     * @return Object  $diagnosis_record_data    [看診紀錄資料]
     */
    public function getDiagnosisRecordById($clinic_id, $customer_id)
    {
        // find() only works with single-column keys, so we use where() here
        $diagnosis_record_data = DiagnosisRecord::where('clinic_id', '=', $clinic_id)
                                    ->where('customer_id', '=', $customer_id)
                                    ->get();
        return $diagnosis_record_data;
    }
}
