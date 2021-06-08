<?php

namespace App\Http\Repositorys;

use App\Models\User;
use App\Models\Customer;
use \Datetime;

class UserRepository
{
    /**
     * 新增用戶
     * @param  Array $register_data     [註冊資料]
     */
    public function createUser(&$register_data)
    {
        $check_user = User::where('email', '=', $register_data['email'])->first();
        if ($check_user) {
            return [];
        }

        $user = User::firstOrNew(
            [
                'email' => $register_data['email']
            ]
        );
        $user->email = $register_data['email'];
        $user->password = $register_data['password'];
        $user->name = $register_data['name'];
        $user->phone = $register_data['phone'];
        $user->save();
        return $user;
    }

    /**
     * 取得用戶
     * @param  Array $login_data     [登入資料]
     */
    public function getUser(&$login_data)
    {
        $user = User::where('email', '=', $login_data['email'])->where('password', '=', $login_data['password'])->first();
        return $user;
    }

    /**
     * 修改用戶資料
     * @param  Array $user     [用戶]
     * @param  Array $modify_data     [修改資料]
     */
    public function modifyUser(&$user, &$modify_data)
    {
        $user->update($modify_data);
        return $user;
    }
}
