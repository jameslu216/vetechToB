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
        // Doctor::factory()->count(5)->create()->each(function ($doctor) use (&$count){
        Doctor::all()->each(function ($doctor) use (&$count){
            for($i = 1 ; $i <= 7 ; ++$i){
                $DiagnosisTime = DiagnosisTime::factory()->count(1)->make()[0];
                $DiagnosisTime->day = $i;
                $DiagnosisTime->start_at = '09:00';
                $DiagnosisTime->end_at = '12:00';
                $doctor->diagnosisTimes()->save($DiagnosisTime);
                $DiagnosisTime = DiagnosisTime::factory()->count(1)->make()[0];
                $DiagnosisTime->day = $i;
                $DiagnosisTime->start_at = '13:30';
                $DiagnosisTime->end_at = '21:30';
                $doctor->diagnosisTimes()->save($DiagnosisTime);
            }
            $doctor->diagnosisInfos()->save(DiagnosisInfo::factory()->count(1)->make()[0]);
            $doctor->reservations()->save(Reservation::factory()->count(1)->make()[0]);
            ++$count;
        });
    }
}
