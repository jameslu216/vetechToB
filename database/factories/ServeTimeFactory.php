<?php

namespace Database\Factories;

use App\Models\ServeTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServeTimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServeTime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => rand(1,7),
            // 'time_zone' => rand(0,2),
            'start_at' => "09:00",
            'end_at' => "21:00",
        ];
    }
}
