<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ApplicationType;

class ApplicationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApplicationType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'applicantTypeTitle' => fake()->word(),
            'applicationFees' => fake()->randomFloat(2, 0, 99999999.99),
        ];
    }
}
