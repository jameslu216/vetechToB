<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // FIXME don't know whether this add foreign key method is valid
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'clinic_id' => $this->faker->numberBetween(1, Clinic::count())
        ];
    }
}
