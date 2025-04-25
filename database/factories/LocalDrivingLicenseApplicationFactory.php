<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Application;
use App\Models\LicenseClass;
use App\Models\LocalDrivingLicenseApplication;

class LocalDrivingLicenseApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LocalDrivingLicenseApplication::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'application_id' => Application::factory(),
            'license_class_id' => LicenseClass::factory(),
        ];
    }
}
