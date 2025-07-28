<?php

namespace Database\Seeders;

use App\Models\ApplicationType;
use App\Models\Driver;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Driver::factory()->count(5)->create();
        ApplicationType::factory()->create(
            [
                'title' => 'First Time License',
                'description' => 'Issue a license for the first time.',
                'applicationFees' => 5.00
            ]
        );
        ApplicationType::factory()->create(
            [
                'title' => 'Re-Examine',
                'description' => 'Dont Know',
                'applicationFees' => 5.00
            ]);
        ApplicationType::factory()->create(
            [
                'title' => 'Renew A License',
                'description' => 'Renew an old license.',
                'applicationFees' => 5.00
            ]
        );
        ApplicationType::factory()->create(
            [
                    'title' => 'Missing A License',
                    'description' => 'Issue a license after missing the previous one.',
                    'applicationFees' => 5.00
            ]
        );
        ApplicationType::factory()->create(
            [
                'title' => 'Damaged A License',
                'description' => 'Issue a license after the previous one has been damaged.',
                'applicationFees' => 5.00
            ]
        );
        ApplicationType::factory()->create(
            [
                'title' => 'Retain A License',
                'description' => 'Retain a license after detain the previous one.',
                'applicationFees' => 5.00
            ]
        );
    }
}
