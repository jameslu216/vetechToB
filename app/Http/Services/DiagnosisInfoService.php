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
     * 新增看診時間
     * @param  Array $diagnosis_info_data     [看診時間資訊]
     * @return Bool  [是否新增成功]
     */
    public function createDiagnosisInfo(&$diagnosis_info_data)
    {
        return $this->DiagnosisInfoRepository->createDiagnosisInfo($diagnosis_info_data);
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