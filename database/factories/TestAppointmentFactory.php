<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LocalDrivingLicenseApplication;
use App\Models\TestAppointment;
use App\Models\TestTypes;
use App\Models\User;

class TestAppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TestAppointment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'test_type_id' => TestTypes::factory(),
            'Local_dl_application_id' => LocalDrivingLicenseApplication::factory(),
            'appointmentDate' => fake()->dateTime(),
            'paidFees' => fake()->randomFloat(2, 0, 99999999.99),
            'created_by_user_id' => User::factory(),
            'isLocked' => fake()->boolean(),
        ];
    }
}
