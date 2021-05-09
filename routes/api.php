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

//取得診所資料
Route::get('/clinic', 'App\Http\Controllers\ClinicController@getClinicInformation');

//建立預約
Route::post('/reservation', 'App\Http\Controllers\ReservationController@createReservation');
