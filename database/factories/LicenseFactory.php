<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Application;
use App\Models\Driver;
use App\Models\License;
use App\Models\LicenseClass;
use App\Models\User;

class LicenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = License::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'application_id' => Application::factory(),
            'driver_id' => Driver::factory(),
            'license_class_id' => LicenseClass::factory(),
            'issueDate' => fake()->dateTime(),
            'expirationDate' => fake()->dateTime(),
            'notes' => fake()->text(),
            'paidFees' => fake()->randomFloat(2, 0, 99999999.99),
            'isActive' => fake()->boolean(),
            'created_by_user_id' => User::factory(),
        ];
    }
}
