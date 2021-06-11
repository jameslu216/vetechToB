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
     * 新增看診時間
     * @param  Array $diagnosis_info_data     [看診時間資訊]
     * @return Bool  [是否新增成功]
     */
    public function createDiagnosisInfo(&$diagnosis_info_data)
    {
        $diagnosis_info = DiagnosisInfo::firstOrNew(
            [
                'doctor_id' => $diagnosis_info_data['doctor_id'],
                'datetime' => $diagnosis_info_data['date'],
            ]
        );
        $diagnosis_info->doctor_id = $diagnosis_info_data['doctor_id'];
        $datetime = Datetime::createFromFormat('Y-m-d', date('Y-m-d',strtotime($diagnosis_info_data['date'])));
        $time = Datetime::createFromFormat('H:i', date('H:i',strtotime($diagnosis_info_data['time'])));
        $datetime->setTime($time->format('H'), $time->format('i'), $time->format('s'));
        $diagnosis_info->datetime = $datetime;
        $diagnosis_info->serve_type = $diagnosis_info_data['serve_type'];
        $diagnosis_info->save();
        return true;
    }

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
