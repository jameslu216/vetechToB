<?php

namespace Database\Factories;

use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clinic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $service_type = [
            '年度體檢',
            '新客戶(請於10分鐘前抵達)',
            '疫苗接種',
            '藥物Refill',
            '手術',
            '生病動物檢查',
            '超音波',
            '血檢',
            '其他'
        ];
        $rand_service_types = array_rand($service_type, 3);
        foreach($rand_service_types as $rand_service_type){
            unset($service_type[$rand_service_type]);
        }
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'introduction' => $this->faker->text,
            'service_type' => implode(',', $service_type),
            'phone' => $this->faker->phoneNumber,
            'picture' => $this->faker->image,
        ];
    }
}
