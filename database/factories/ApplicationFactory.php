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
        $appType = ApplicationType::inRandomOrder()->first();
        return [
            'applicant_person_id' => Person::inRandomOrder()->first()->id,
            'application_type_id' => $appType->id,
            'applicationStatus' => fake()->randomElement(["P","C","X"]),
            'paidFees' => $appType->applicationFees,
            'created_by_user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
