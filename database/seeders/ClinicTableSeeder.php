<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clinic;
use App\Models\ServeTime;
use App\Models\Doctor;

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
        $count = 1;
        Clinic::factory()->count(5)->create()->each(function ($clinic) use (&$count){
            $clinic->serveTimes()->save(ServeTime::factory()->count(1)->make()[0]);
            $clinic->serveTimes()->save(Doctor::find($count));
            ++$count;
        });
    }
}
