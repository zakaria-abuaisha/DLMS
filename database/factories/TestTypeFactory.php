<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TestType;

class TestTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TestType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'testTypeTitle' => fake()->word(),
            'testTypeDescription' => fake()->text(),
            'textTypeFees' => fake()->randomFloat(2, 0, 99999999.99),
        ];
    }
}
