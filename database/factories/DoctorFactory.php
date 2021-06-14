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

    private static $order = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /*
        $available_clinic_id_collection = Clinic::whereNotIn('id', Doctor::get(['clinic_id'])->toArray())->get()->map(function ($clinic) {
            return $clinic->id; 
        });
        if (count($available_clinic_id_collection) == 0) {
            $clinic_id = 1;
        } else {
            $clinic_id = $available_clinic_id_collection->random();
        }
        echo $clinic_id;
        return [
            'user_id' => self::$order++,
            'clinic_id' => $clinic_id
        ];
        */
        return [
            'user_id' => self::$order,
            'clinic_id' => self::$order++
        ];
    }
}
