<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'account' => Str::random(10),
            'password' => Str::random(10),
            'phone' => Str::random(10),

        ]);
        //
    }
}
