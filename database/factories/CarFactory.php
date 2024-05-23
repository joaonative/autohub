<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use App\Rules\ValidType;
use App\Rules\ValidColor;

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

        $typeRule = new ValidType();
        $randomType = $typeRule->randomAllowedType();

        $colorRule = new ValidColor();
        $randomColor = $colorRule->randomAllowedColors();

        return [
            'transmission' => $this->faker->boolean(),
            'description' => $this->faker->sentence(),
            'state' => $this->faker->boolean(),
            'color'=> $randomColor,
            'price' => $this->faker->randomDigit(),
            'km' => $this->faker->randomFloat(null, 0, 100000),
            'brand' => $car['brand'],
            'type' => $randomType,
            'name' => $car['model'],
            'year' => $this->faker->biasedNumberBetween(1990, date('Y'), 'sqrt'),
            'admId' => User::factory(),
        ];
    }
}
