<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Datetime;
use \DateInterval;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (Reservation::count() == 0) {
            $latest_reservation = DateTime::createFromFormat('Y-m-d H:i', '2021-05-28 22:11');
        } else {
            $latest_reservation = DateTime::createFromFormat('Y-m-d H:i:s', Reservation::latest('datetime')->first()->datetime); 
            $latest_reservation->modify('+ 1 hour');
        }
        $doctor_id = $this->faker->numberBetween(1, Doctor::count());
        $clinic_id = Doctor::where('user_id', '=', $doctor_id)->first()->clinic_id;
        return [
            'id' => $this->faker->unique()->randomNumber(7),
            'customer_name' => $this->faker->name,
            'customer_id' => $this->faker->numberBetween(1, Customer::count()),
            'phone' => $this->faker->phoneNumber,
            'pet_name' => $this->faker->name,
            'pet_variety' => "doge",
            'pet_gender' => "male",
            'pet_age' => 2,
            'serve_type' => "surgery",
            'note' => "No note, no",
            'datetime' => $latest_reservation,
            'doctor_id' => $doctor_id,
            'clinic_id' => $clinic_id
        ];
    }
}
