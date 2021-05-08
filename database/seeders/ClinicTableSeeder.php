<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clinic;
use App\Models\ServeTime;

class ClinicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Clinic::factory()->count(5)->create()->each(function ($clinic) {
            $clinic->serveTimes()->save(ServeTime::factory()->count(1)->make()[0]);
        });;
    }
}
