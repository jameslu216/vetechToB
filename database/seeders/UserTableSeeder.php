<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pet;
use App\Models\DiagnosisTime;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;
        User::factory()->count(5)->create()->each(function ($user) {
            $user->doctors()->create();
            $user->customers()->create()->pets()->save(Pet::factory()->count(1)->make()[0]);
        });
    }
}
