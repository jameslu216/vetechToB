<?php

namespace App\Http\Services;

use App\Http\Repositorys\CustomerRepository;

class CustomerService
{
    public function __construct(
        CustomerRepository $CustomerRepository
    )
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    /**
     * 新增顧客
     * @param  Array $user     [用戶資料]
     */
    public function createCustomer(&$user)
    {
        return $this->CustomerRepository->createCustomer($user);
    }
}