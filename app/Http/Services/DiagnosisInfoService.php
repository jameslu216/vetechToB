<?php

namespace App\Http\Services;

use App\Http\Repositorys\DiagnosisInfoRepository;

class DiagnosisInfoService
{
    public function __construct(
        DiagnosisInfoRepository $DiagnosisInfoRepository
    )
    {
        $this->DiagnosisInfoRepository = $DiagnosisInfoRepository;
    }

    /**
     * 查詢看診資訊
     * @param  Int $clinic_id [診所id]    
     * @param  Int $date [日期]    
     */
    public function getDiagnosisInfoByDate($clinic_id, $date)
    {
        return $this->DiagnosisInfoRepository->getDiagnosisInfoByDate($clinic_id, $date);
    }

}