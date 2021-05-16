<?php

namespace App\Http\Services;

use App\Http\Repositorys\DiagnosisRecordRepository;

class DiagnosisRecordService
{
    public function __construct(
        DiagnosisRecordRepository $DiagnosisRecordRepository
    )
    {
        $this->DiagnosisRecordRepository = $DiagnosisRecordRepository;
    }
    /**
     * 新增看診紀錄
     * @param  Array $diagnosis_note [診後紀錄]    
     * @param  Array $reservation [預約資訊]
     */
    public function createDiagnosisRecord(&$diagnosis_note, &$reservation)
    {
        return $this->DiagnosisRecordRepository->createDiagnosisRecord($diagnosis_note, $reservation);
    }

}