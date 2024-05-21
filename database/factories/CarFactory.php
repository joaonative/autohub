<?php

namespace Database\Factories;

use App\Models\Car;
use Faker\Provider\FakeCar;
use Illuminate\Database\Eloquent\Factories\Factory;


class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Car::class;

    public function definition(): array
    {
        $this->faker->addProvider(new FakeCar($this->faker));
        $car = $this->faker->vehicleArray();
        return [
            'transmission' => false,
            'description' => $this->faker->sentence(),
            'state' => false,
            'color'=> $this->faker->hexColor(),
            'price' => $this->faker->randomDigit(),
            'km' => 0,
            'brand' => $car['brand'],
            'type' => 'car',
            'name' => $car['model'],
            'year' => $this->faker->biasedNumberBetween(1990, date('Y'), 'sqrt'),
        ];
    }
}
