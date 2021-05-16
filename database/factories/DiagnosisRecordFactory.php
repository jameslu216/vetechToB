<?php

namespace Database\Factories;

use App\Models\DiagnosisRecord;
use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\Factory;


class DiagnosisRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiagnosisRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(7),
            'customer_name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'pet_name' => $this->faker->name,
            'pet_variety' => "doge",
            'pet_gender' => "male",
            'pet_age' => 2,
            'serve_type' => "surgery",
            'note' => "No note, no",
            'diagnosis_note' => "This is diagnosis note.",
            'datetime' => $this->faker->dateTime(),
            // FIXME don't know whether this add foreign key method is valid
            'doctor_id' => $this->faker->numberBetween(1, Doctor::count()),
            'clinic_id' => $this->faker->numberBetween(1, Clinic::count())
        ];
    }
}
