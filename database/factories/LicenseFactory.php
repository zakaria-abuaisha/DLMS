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
        $lc = LicenseClass::inRandomOrder()->first();
        $dt = fake()->dateTime();
        return [
            'application_id' => Application::factory(),
            'driver_id' => Driver::inRandomOrder()->first()->id,
            'license_class_id' => $lc->id,
            'issueDate' => $dt,
            'expirationDate' => $dt->addYear($lc->defaultValidityLength),
            'notes' => fake()->text(),
            'paidFees' => $lc->classFees,
            'isActive' => fake()->boolean(),
            'created_by_user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
