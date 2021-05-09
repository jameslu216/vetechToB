<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ClinicTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
    }
}
