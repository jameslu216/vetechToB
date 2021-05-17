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
     * @param  String $diagnosis_note [診後紀錄]    
     * @param  Array $reservation [預約資訊]
     */
    public function createDiagnosisRecord(&$diagnosis_note, &$reservation)
    {
        return $this->DiagnosisRecordRepository->createDiagnosisRecord($diagnosis_note, $reservation);
    }

    /**
     * 查詢看診紀錄
     * @param  Int $clinic_id [診所id]    
     * @param  Int $customer_id [顧客id]    
     */
    public function getDiagnosisRecordById($clinic_id, $customer_id)
    {
        return $this->DiagnosisRecordRepository->getDiagnosisRecordById($clinic_id, $customer_id);
    }

}