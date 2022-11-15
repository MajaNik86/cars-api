<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->randomElement(['Alfa Romeo', 'Ferrari', 'McLaren']),
            'model' =>  $this->faker->text($maxNbChars = 20),
            'year' => $this->faker->numberBetween(1990, 2022),
            'maxSpeed' => $this->faker->numberBetween(0, 400),
            'isAutomatic' => $this->faker->boolean(),
            'engine' => $this->faker->randomElement(['diesel', 'electric', 'petrol', 'hybird']),
            'number_of_doors' =>  $this->faker->numberBetween(2, 10),

        ];
    }
}