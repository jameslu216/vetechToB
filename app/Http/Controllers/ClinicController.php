<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Services\ClinicService;

class ClinicController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(
        ClinicService $ClinicService
    ) {
        $this->ClinicService = $ClinicService;
    }

    /**
     * 取得診所資訊
     * @param  Request $request     [description]
     * @return Json  $clinic_data    [診所資料]
     */
    public function getClinicInformation(Request $request)
    {
        $clinic_id = $request->clinic_id;
        if (empty($clinic_id) || !is_numeric($clinic_id)) {
            return response('error', 400);
        }
        $clinic_data = $this->ClinicService->getClinicData($clinic_id);
        return response()->json($clinic_data, 200);
    }

    /**
     * 取得特定日子所有醫生的空閑時間
     * @param  Request $request     [description]
     * @return Json  $doctor_data    [診所資料]
     */
    public function getDoctorFreeTime(Request $request)
    {
        $clinic_id = $request->clinic_id;
        $date = date($request->date);
        $day = $request->day;
        if (empty($clinic_id) || !is_numeric($clinic_id) || empty($date) || !is_numeric($day) || $day < 1 || $day > 7) {
            return response('error', 400);
        }
        if($date < date("Y-m-d")){
            return response()->json([], 200);
        }
        $doctor_data = $this->ClinicService->getDoctorFreeData($clinic_id, $date, $day);
        return response()->json($doctor_data, 200);
    }
}
