<?php

namespace Database\Factories;

use App\Models\DiagnosisInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;

class DiagnosisInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiagnosisInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_id' => $this->faker->numberBetween(1, Doctor::count()),
            'datetime' => $this->faker->dateTime(),
            'serve_type' => '一般門診',
        ];
    }
}
