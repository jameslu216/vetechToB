<?php

namespace App\Http\Repositorys;

use App\Models\Clinic;

class ClinicRepository
{
    /**
     * 取得診所資訊
     * @param  Int $clinic_id     [診所id]
     * @return Object  $clinic_data    [診所資料]
     */
    public function getClinicData($clinic_id)
    {
        $clinic = Clinic::with('serveTimes')->find($clinic_id);
        return $clinic;
    }

    /**
     * 取得診所所有醫生資訊
     * @param  Int $clinic_id     [診所id]
     * @return Collection  $doctors    醫生資料]
     */
    public function getDoctorDataByClinic($clinic_id)
    {
        $clinic = Clinic::find($clinic_id);
        $doctors = $clinic->doctors()->with(['diagnosisTimes', 'user'])->get();
        return $doctors;
    }
}