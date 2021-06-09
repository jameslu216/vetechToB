<?php

namespace Database\Factories;

use App\Models\DiagnosisTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiagnosisTimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiagnosisTime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => 1,
            // 'time_zone' => rand(0,2),
            'start_at' => '09:00',
            'end_at' => '12:30',
        ];
    }
}
