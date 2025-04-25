<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LicenseClass;

class LicenseClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LicenseClass::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'className' => fake()->word(),
            'classDescription' => fake()->text(),
            'minimumAllowedAge' => fake()->randomNumber(),
            'defaultValidityLength' => fake()->randomNumber(),
            'classFees' => fake()->randomFloat(2, 0, 99999999.99),
        ];
    }
}
