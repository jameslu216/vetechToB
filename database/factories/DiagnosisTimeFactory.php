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
            'day' => rand(1,7),
            'time_zone' => rand(0,2),
            'start_at' => $this->faker->time,
            'end_at' => $this->faker->time,
        ];
    }
}
