<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Application;
use App\Models\ApplicationType;
use App\Models\Person;
use App\Models\User;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'applicant_person_id' => Person::factory(),
            'applicationDate' => fake()->dateTime(),
            'application_type_id' => ApplicationType::factory(),
            'applicationStatus' => fake()->randomElement(["P","C","F"]),
            'lastStatusDate' => fake()->dateTime(),
            'paidFees' => fake()->randomFloat(2, 0, 99999999.99),
            'created_by_user_id' => User::factory(),
        ];
    }
}
