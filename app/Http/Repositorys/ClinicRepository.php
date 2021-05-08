<?php

namespace App\Http\Repositorys;

use App\Models\Clinic;

class ClinicRepository
{
    /**
     * 取得診所資訊
     * @param  Int $clinic_id     [description]
     * @return object  $clinic_data    [診所資料]
     */
    public function getClinicData($clinic_id)
    {
        $clinic = Clinic::with('serveTimes')->find($clinic_id);
        return $clinic;
    }
}