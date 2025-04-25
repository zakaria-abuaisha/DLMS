<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Application;
use App\Models\DetainedLicense;
use App\Models\License;
use App\Models\LicenseClass;
use App\Models\User;

class DetainedLicenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetainedLicense::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'license_id' => License::factory(),
            'detainDate' => fake()->dateTime(),
            'fineFees' => fake()->randomFloat(2, 0, 99999999.99),
            'created_by_user_id' => User::factory(),
            'license_class_id' => LicenseClass::factory(),
            'isReleased' => fake()->boolean(),
            'releaseDate' => fake()->dateTime(),
            'released_by_user_id' => User::factory(),
            'release_application_id' => Application::factory(),
        ];
    }
}
