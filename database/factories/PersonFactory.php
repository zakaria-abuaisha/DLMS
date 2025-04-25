<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Person;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nationalityNo' => fake()->word(),
            'firstName' => fake()->word(),
            'lastName' => fake()->word(),
            'dateOfBirth' => fake()->date(),
            'sex' => fake()->randomElement(["m","f"]),
            'address' => fake()->word(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'imagePath' => fake()->word(),
        ];
    }
}
