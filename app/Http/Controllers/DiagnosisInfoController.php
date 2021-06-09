<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Services\DiagnosisInfoService;

class DiagnosisInfoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(
        DiagnosisInfoService $DiagnosisInfoService
    ) {
        $this->DiagnosisInfoService = $DiagnosisInfoService;
    }

    /**
     * 查詢看診資訊
     * @param  Request $request     [description]
     * @return Json  $diagnosis_info_data    [轉移預約資料]
     */
    public function getDiagnosisInfo(Request $request)
    {
        $clinic_id = $request->clinic_id;
        $date = date($request->date);
        if (
            empty($clinic_id) ||
            empty($date)
        ) {
            return response('error', 400);
        }
        $diagnosis_info_data = $this->DiagnosisInfoService->getDiagnosisInfoByDate($clinic_id, $date);
        return response()->json($diagnosis_info_data, 200);            
    }

}
