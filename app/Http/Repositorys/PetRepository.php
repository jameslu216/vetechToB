<?php

namespace App\Http\Repositorys;

use App\Models\Pet;
use App\Models\User;
use \Datetime;

class PetRepository
{
    /**
     * 新增寵物
     * @param  Array $user     [用戶資料]
     * @param  Array $new_pet_data     [新寵物資料]
     */
    public function createPetToUser(&$user, &$new_pet_data)
    {
        if (!empty($new_pet_data['pet'])) {
            foreach ($new_pet_data['pet'] as $pet_data) {
                if (is_array($pet_data)) {
                    $pet = Pet::firstOrNew(
                        [
                            'name' => $pet_data['name'],
                            'variety' => $pet_data['variety'],
                            'age' => 1,
                            'gender' => $pet_data['gender'],
                        ]
                    );
                    $pet->customer_id = $user->id;
                    $pet->name = $pet_data['name'];
                    $pet->variety = $pet_data['variety'];
                    $pet->age = 1;
                    $pet->gender = $pet_data['gender'];
                    $pet->save();
                }
            }
            return true;            
        } else {
            return false;
        }
    }

    /**
     * 從用戶資料取得寵物
     * @param  Array $user     [用戶資料]
     */
    public function getPetsByUser(&$user)
    {
        $pet = $user->customers()->first()->pets();
        return $pet;
    }

    /**
     * 刪除用戶資料中所有的寵物
     * @param  Array $user     [用戶資料]
     */
    public function clearPetsByUser(&$user)
    {
        return $user->customers()->first()->pets()->delete();

    }
}
