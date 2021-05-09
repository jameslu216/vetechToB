<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Services\ReservationService;

class ReservationController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(
        ReservationService $ReservationService
    ) {
        $this->ReservationService = $ReservationService;
    }

    /**
     * 新增預約
     * @param  Request $request     [description]
     * @return Json  $reservation_data    [診所資料]
     */
    public function createReservation(Request $request)
    {
        $reservation_data = $request->all();
        $reservation_data['date'] = date($reservation_data['date']);
        if (
            empty($reservation_data['customer_name']) ||
            empty($reservation_data['clinic_id']) ||
            empty($reservation_data['date']) ||
            empty($reservation_data['phone']) ||
            $reservation_data['date'] < date("Y-m-d H:i")
        ) {
            return response('error', 400);
        }
        $this->ReservationService->createReservation($reservation_data);
        return response()->json($reservation_data, 200);
    }
}
