<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Person;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'person_id' => Person::factory(),
            'userName' => fake()->word(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'isActive' => fake()->boolean(),
            'isAdmin' => fake()->boolean(),
            'remember_token' => Str::random(10),
        ];
    }
}
