<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Driver;
use App\Models\Person;
use App\Models\User;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'personId' => Person::factory(),
            'created_by_user_id' => User::factory(),
            'createdDate' => fake()->dateTime(),
        ];
    }
}
