<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clinic;
use App\Models\ServeTime;
use App\Models\Doctor;
use App\Models\Reservation;

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
            for($i = 1 ; $i <= 7 ; ++$i){
                $ServeTime = ServeTime::factory()->count(1)->make()[0];
                $ServeTime->day = $i;
                $ServeTime->start_at = '09:00';
                $ServeTime->end_at = '12:00';
                $clinic->serveTimes()->save($ServeTime);
                $ServeTime = ServeTime::factory()->count(1)->make()[0];
                $ServeTime->day = $i;
                $ServeTime->start_at = '13:30';
                $ServeTime->end_at = '21:30';
                $clinic->serveTimes()->save($ServeTime);
            }
            $clinic->doctors()->save(Doctor::find($count));
            ++$count;
        });
    }
}
