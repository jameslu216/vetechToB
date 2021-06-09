<?php

namespace App\Http\Repositorys;

use App\Models\DiagnosisInfo;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\User;
use \Datetime;

class DiagnosisInfoRepository
{
    /**
     * 查詢看診資訊
     * @param  Int $clinic_id [診所id]
     * @param  Int $date     [日期]
     * @return Object  $doctors_data    [看診資料]
     */
    public function getDiagnosisInfoByDate($clinic_id, $date)
    {
        // find() only works with single-column keys, so we use where() here
        $doctors_data = [];
        Clinic::find($clinic_id)->doctors()->each(function($doctor) use (&$doctors_data, $date) {
            // Append doctor data to doctors
            $doctors_data[] = [
                'doctor_id' => $doctor->id,
                'doctor_name' => $doctor->name(),
                'diagnosis_time_list' => $doctor->diagnosisInfos()->whereDate('datetime', '=', $date)->get()->each(function(&$diagnosis_info) {
                    $diagnosis_time = Datetime::createFromFormat('Y-m-d H:i:s', $diagnosis_info['datetime']);
                    $diagnosis_info['diagnosis_time'] = $diagnosis_time->format('H:i');
                }
                )->makeHidden(['doctor_id', 'datetime']),
            ];
        });
        return $doctors_data;
    }
}
