<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Test;
use App\Models\TestAppointment;
use App\Models\User;

class TestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Test::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'test_appointment_id' => TestAppointment::factory(),
            'testResult' => fake()->boolean(),
            'notes' => fake()->text(),
            'created_by_user_id' => User::factory(),
        ];
    }
}
