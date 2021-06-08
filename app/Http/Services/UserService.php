<?php

namespace App\Http\Services;

use App\Http\Repositorys\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function __construct(
        UserRepository $UserRepository
    )
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * 新增用戶
     * @param  Array $register_data     [註冊資料]
     */
    public function createUser(&$register_data)
    {
        return $this->UserRepository->createUser($register_data);
    }

    /**
     * 取得用戶
     * @param  Array $login_data     [登入資料]
     */
    public function getUser(&$login_data)
    {
        return $this->UserRepository->getUser($login_data);
    }

    /**
     * 修改用戶資料
     * @param  Array $modify_data     [修改資料]
     */
    public function modifyUser(&$modify_data)
    {
        $user = Auth::user();
        return $this->UserRepository->modifyUser($user, $modify_data);
    }
}