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
            'open_at' => $this->faker->time,
            'close_at' => $this->faker->time,
        ];
    }
}
