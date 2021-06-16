<?php

namespace App\Http\Repositorys;

use App\Models\DiagnosisRecord;
use App\Models\Reservation;
use App\Models\Doctor;
use \Datetime;

class DiagnosisRecordRepository
{
    /**
     * 新增看診紀錄
     * @param  Array $diagnosis_note [診後紀錄]    
     * @param  Object $reservation [預約資訊]
     */
    public function createDiagnosisRecord(&$diagnosis_note, &$reservation)
    {
        $next_id = DiagnosisRecord::where('clinic_id', '=', $reservation->clinic_id)
                                    ->max('id') + 1;
        $diagnosis_record = DiagnosisRecord::firstOrNew(
            [
                'id' => $next_id,
                'patient_name' => $reservation->patient_name,
                'customer_id' => $reservation->customer_id,
                'pet_name' => $reservation->pet_name,
                'datetime' => $reservation->datetime,
                'clinic_id' => $reservation->clinic_id,
            ]
        );
        $diagnosis_record->patient_name = $reservation->patient_name;
        $diagnosis_record->customer_id = $reservation->customer_id;
        $diagnosis_record->phone = $reservation->phone;
        $diagnosis_record->pet_name = $reservation->pet_name;
        $diagnosis_record->pet_variety = $reservation->pet_variety;
        $diagnosis_record->pet_gender = $reservation->pet_gender;
        $diagnosis_record->pet_age = $reservation->pet_age;
        $diagnosis_record->service_type = $reservation->service_type;
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
                                    ->get()->each(function(&$record) {
                                        $doctor = Doctor::where('user_id', '=', $record['doctor_id'])->first();
                                        $record['doctor_name'] = $doctor->name();
                                        $datetime = Datetime::createFromFormat('Y-m-d H:i', date('Y-m-d H:i',strtotime($record['datetime'])));
                                        $record['date'] = $datetime->format('m-d');
                                        $record['time'] = $datetime->format('H:i');
                                        $record['reservation_id'] = strval($record['id']);
                                    }
                                    )->makeHidden(['doctor_id', 'datetime', 'id', 'clinic_id','cost','patient_name','pet_name','pet_age','pet_gender','pet_variety','phone','reservation_id','customer_id']);
        return $diagnosis_record_data;
    }
}
