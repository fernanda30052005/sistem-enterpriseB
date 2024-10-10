<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'depart_id' => $this->faker->numberBetween(1, 5),
            'address' => $this->faker->address,
            'place_of_birth' => $this->faker->city,
            'dob' => $this->faker->dateOfBirth,
            'religion' => $this->faker->randomElement(['Islam', 'Christian', 'Buddhist', 'Hindu']),
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'phone' => $this->faker->phoneNumber,
            'salary' => $this->faker->numberBetween(1000000, 5000000),
        ];
    }
}