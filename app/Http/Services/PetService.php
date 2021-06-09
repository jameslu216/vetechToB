<?php

namespace App\Http\Services;

use App\Http\Repositorys\PetRepository;

class PetService
{
    public function __construct(
        PetRepository $PetRepository
    )
    {
        $this->PetRepository = $PetRepository;
    }

    /**
     * 新增寵物
     * @param  Array $user     [用戶資料]
     * @param  Array $new_pet_data     [新寵物資料]
     */
    public function createPetToUser(&$user, &$new_pet_data)
    {
        return $this->PetRepository->createPetToUser($user, $new_pet_data);
    }

    /**
     * 從用戶資料取得寵物
     * @param  Array $user     [用戶資料]
     */
    public function getPetsByUser(&$user)
    {
        return $this->PetRepository->getPetsByUser($user);
    }

    /**
     * 刪除用戶資料中所有的寵物
     * @param  Array $user     [用戶資料]
     */
    public function clearPetsByUser(&$user)
    {
        return $this->PetRepository->clearPetsByUser($user);
    }
}