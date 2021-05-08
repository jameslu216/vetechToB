<?php

namespace App\Http\Services;

use App\Http\Repositorys\ClinicRepository;

class ClinicService
{
    public function __construct(
        ClinicRepository $ClinicRepository
    )
    {
        $this->ClinicRepository = $ClinicRepository;
    }
    /**
     * 取得診所資訊
     * @param  Int $clinic_id     [description]
     * @return Array  $clinic_data    [診所資料]
     */
    public function getClinicData($clinic_id)
    {
        $clinic_data = $this->ClinicRepository->getClinicData($clinic_id);
        return $clinic_data;
    }
}