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
}
