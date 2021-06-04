<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

use App\Http\Services\UserService;
use App\Http\Services\PetService;
use App\Http\Services\CustomerService;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(
        UserService $UserService, PetService $PetService, CustomerService $CustomerService
    ) {
        $this->UserService = $UserService;
        $this->PetService = $PetService;
        $this->CustomerService = $CustomerService;
    }

    /**
     * 註冊新用戶
     * @param  Request $request     [description]
     * @return Json  $register_data    [註冊資料]
     */
    public function registerUser(Request $request)
    {
        $register_data = $request->all();
        if (
            empty($register_data['email']) ||
            empty($register_data['password']) ||
            empty($register_data['name']) ||
            empty($register_data['phone'])
            // TODO check password SHA256
            // https://stackoverflow.com/questions/16875249/how-to-check-if-string-is-a-valid-sha256-hash-in-php
        ) {
            return response('error', 400);
        }
        $user = $this->UserService->createUser($register_data);
        $this->CustomerService->createCustomer($user);
        // TODO create customer from user
        // $user = $this->UserService->createUser($register_data);
        // FIXME this if statement might be useless
        if (empty($user['email'])) {
            return response('error', 400);            
        }
        $this->PetService->createPetToUser($user, $register_data);
        return response()->json($register_data, 200);
    }

    /**
     * 用戶登入
     * @param  Request $request     [description]
     * @return Json  $login_data    [登入資料]
     */
    public function loginUser(Request $request)
    {
        $login_data = $request->all();
        if (
            empty($login_data['email']) ||
            empty($login_data['password'])
            // TODO check password SHA256
            // https://stackoverflow.com/questions/16875249/how-to-check-if-string-is-a-valid-sha256-hash-in-php
        ) {
            return response()->json(["error_log" => "輸入資料不完整"], 200);
        }
        $user = $this->UserService->getUser($login_data);
        if (!$user) {
            return response()->json(["error_log" => "帳號或密碼輸入錯誤"], 200);
        }
        $api_token = Str::random(64);
        if($user->update(['api_token'=>$api_token])) {
            $user_data = $user->makeHidden(['id', 'password', 'email']);
            $user_data['pet'] = $this->PetService->getPetsByUser($user)->get()->makeHidden(['id', 'age', 'customer_id']);
            return response()->json($user_data, 200);
        }
    }

    /**
     * 修改用戶基本資料
     * @param  Request $request     [description]
     * @return Json  $modify_data    [修改資料]
     */
    public function modifyUser(Request $request)
    {
        $modify_data = $request->all();
        $user = $this->UserService->modifyUser($modify_data);
        $this->PetService->clearPetsByUser($user);
        $this->PetService->createPetToUser($user, $modify_data);
        return response()->json($modify_data, 200);
    }
}
