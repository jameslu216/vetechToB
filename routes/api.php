<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 註冊新用戶
Route::post('/user/register', 'App\Http\Controllers\UserController@registerUser');

// 用戶登入
Route::post('/user/login', 'App\Http\Controllers\UserController@loginUser')->name('login');

// 用戶修改資料
Route::middleware('auth:api')->post('/user/modify', 'App\Http\Controllers\UserController@modifyUser');

// 取得診所資料
Route::get('/clinic', 'App\Http\Controllers\ClinicController@getClinicInformation');

// 取得醫生可服務時段
Route::get('/clinic/doctor', 'App\Http\Controllers\ClinicController@getDoctorFreeTime');

// 建立預約
Route::post('/reservation/create', 'App\Http\Controllers\ReservationController@createReservation');

// 取得預約
Route::get('/reservation', 'App\Http\Controllers\ReservationController@getReservationInformation');

// 刪除預約
Route::post('/reservation/remove', 'App\Http\Controllers\ReservationController@removeReservation');

// 修改預約
Route::post('/reservation/modify', 'App\Http\Controllers\ReservationController@modifyReservation');

// 將預約移至看診紀錄
Route::post('/diagnosis/record/move_and_create', 'App\Http\Controllers\DiagnosisRecordController@moveAndCreateDiagnosisRecord');

// 取得看診紀錄
Route::get('/diagnosis/record', 'App\Http\Controllers\DiagnosisRecordController@getDiagnosisRecord');

// 取得看診時間
Route::get('/diagnosis/info', 'App\Http\Controllers\DiagnosisInfoController@getDiagnosisInfo');
