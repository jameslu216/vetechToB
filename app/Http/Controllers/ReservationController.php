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
        if (
            empty($reservation_data['clinic_id']) ||
            empty($reservation_data['datetime']) ||
            $reservation_data['datetime'] < date("Y-m-d H:i")
        ) {
            return response('error', 400);
        }
        $is_success = $this->ReservationService->createReservation($reservation_data);
        if(!$is_success){
            return response('該時段已有人預約', 400);
        }
        return response()->json($reservation_data, 200);
    }

    /**
     * 取得該日預約
     * @param  Request $request     [description]
     * @return Json  $get_reservations_data    [修改Reservation資料]
     */
    public function getReservationInformation(Request $request)
    {
        $clinic_id = $request->clinic_id;
        $date = $request->date;
        if (empty($clinic_id) || empty($date)) {
            return response('error', 400);
        }
        $reservation_data = $this->ReservationService->getReservationData($clinic_id, $date);
        $return_data = [];
        $return_data["reservation_list"] = $reservation_data;
        return response()->json($return_data, 200);
    }
 

    /**
     * 刪除預約
     * @param  Request $request     [description]
     * @return Json  $remove_reservation_data    [刪除Reservation資料]
     */
    public function removeReservation(Request $request)
    {
        $remove_reservation_data = $request->all();
        if (
            empty($remove_reservation_data['reservation_id']) || 
            empty($remove_reservation_data['clinic_id']) 
        ) {
            return response('Error: request data not fulfilled', 400);
        }
        $success = $this->ReservationService->removeReservation($remove_reservation_data);
        if ($success == true) {

            return response()->json($remove_reservation_data, 200);

        } else {

            return response('Error', 400);

        }
    }

    /**
     * 修改預約
     * @param  Request $request     [description]
     * @return Json  $modify_reservation_data    [修改Reservation資料]
     */
    public function modifyReservation(Request $request)
    {
        $modify_reservation_data = $request->all();
        if (
            empty($modify_reservation_data['reservation_id']) || 
            empty($modify_reservation_data['clinic_id'])
        ) {
            return response('error', 400);
        }
        $this->ReservationService->modifyReservation($modify_reservation_data);
        return response()->json($modify_reservation_data, 200);
    }

    /**
     * 查詢看診資訊
     * @param  Request $request     [description]
     * @return Json  $reservation_info_data    [轉移預約資料]
     */
    public function getReservationInfo(Request $request)
    {
        $clinic_id = $request->clinic_id;
        $date = date($request->date);
        if (
            empty($clinic_id) ||
            empty($date)
        ) {
            return response('error', 400);
        }
        $reservation_info_data = $this->ReservationService->getReservationInfoByDate($clinic_id, $date);
        return response()->json($reservation_info_data, 200);            
    }
}
