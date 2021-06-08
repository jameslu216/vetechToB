<?php

namespace App\Http\Repositorys;

use App\Models\User;
use App\Models\Customer;
use \Datetime;

class CustomerRepository
{
     /**
     * 新增顧客
     * @param  Array $user     [用戶資料]
     */
    public function createCustomer(&$user)
    {
        $customer = Customer::firstOrNew(
            [
                'user_id' => $user->id,
            ]
        );
        $customer->user_id = $user->id;
        $customer->save();
        return $customer;
    }
}
