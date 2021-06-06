<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clinic;
use App\Models\ServeTime;
use App\Models\Doctor;
use App\Models\Reservation;

class ServeTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "clinic_id" => "1",
                "day" => "2",
                "time_zone" => "1",
                "start_at" => "09:00:00",
                "end_at" => "18:00:00"
            ],
            [
                "clinic_id" => 1,
                "day" => 2,
                "time_zone" => 1,
                "start_at" => "09:00:00",
                "end_at" => "18:00:00"
            ],
        ];
        ServeTime::factory()->insert($data);
    }
}

$a = new App\Models\ServeTime
$a->clinic_id = "1";
$a->day = "2";
$a->time_zone = "1";
$a->start_at = "09:00:00";
$a->end_at = "18:00:00";
$a->save();

