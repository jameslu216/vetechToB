<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\DiagnosisTime;
use App\Models\DiagnosisInfo;
use App\Models\Reservation;

class DoctorTableSeeder extends Seeder
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
        Doctor::factory()->count(5)->create()->each(function ($doctor) use (&$count){
            $doctor->diagnosisTimes()->save(DiagnosisTime::factory()->count(1)->make()[0]);
            $doctor->diagnosisInfos()->save(DiagnosisInfo::factory()->count(1)->make()[0]);
            $doctor->reservations()->save(Reservation::factory()->count(1)->make()[0]);
            ++$count;
        });
    }
}
