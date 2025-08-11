<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\ApplicationType;
use App\Models\Driver;
use App\Models\LicenseClass;
use App\Models\Person;
use App\Models\TestType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function appTypes()
    {
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

    public function licenseClasses()
    {
        LicenseClass::factory()->create(
            [
                'className' => 'Small motorcycle license',
                'classDescription' => 'It allows the driver to drive small motorcycles.',
                'minimumAllowedAge' => 18,
                'defaultValidityLength' => 5,
                'classFees' => 15.00
            ]
        );
        LicenseClass::factory()->create(
            [
                'className' => 'Heavy motorcycle license',
                'classDescription' => 'It allows the driver to drive large and powerful motorcycles.',
                'minimumAllowedAge' => 21,
                'defaultValidityLength' => 5,
                'classFees' => 30.00
            ]
        );
        LicenseClass::factory()->create(
            [
                'className' => 'Regular driving license',
                'classDescription' => 'It allows the driver to drive light vehicles and personal cars',
                'minimumAllowedAge' => 18,
                'defaultValidityLength' => 10,
                'classFees' => 20.00
            ]
        );
        LicenseClass::factory()->create(
            [
                'className' => 'Commercial driving license',
                'classDescription' => 'It allows the driver to drive taxis or limousine cars.',
                'minimumAllowedAge' => 21,
                'defaultValidityLength' => 10,
                'classFees' => 200.00
            ]
        );
        LicenseClass::factory()->create(
            [
                'className' => 'Agricultural vehicle driving license',
                'classDescription' => 'It allows the driver to drive all agricultural vehicles.',
                'minimumAllowedAge' => 21,
                'defaultValidityLength' => 10,
                'classFees' => 50.00
            ]
        );
        LicenseClass::factory()->create(
            [
                'className' => 'Small and medium bus license',
                'classDescription' => 'It allows the driver to drive small and medium buses.',
                'minimumAllowedAge' => 21,
                'defaultValidityLength' => 10,
                'classFees' => 250.00
            ]
        );
        LicenseClass::factory()->create(
            [
                'className' => 'Trucks and heavy vehicles license',
                'classDescription' => 'It allows the driver to drive trucks and heavy vehicles such as buses and large trucks.',
                'minimumAllowedAge' => 21,
                'defaultValidityLength' => 10,
                'classFees' => 300.00
            ]
        );
    }

    public function testTypes()
    {
        TestType::factory()->create(
          [
              'testTypeTitle' => 'Vision Test',
              'testTypeDescription' => 'Medical tests to verify the health
                    of the applicant for driving and its visual walls and record
                    the result in the system, and information about the date of the
                    examination and the result must be kept if it is successful or failed.',
              'testTypeFees' => 10.00
          ]
        );
        TestType::factory()->create(
            [
                'testTypeTitle' => 'Theoretical test',
                'testTypeDescription' => 'It requires the applicant to answer questions related to traffic laws and safety',
                'testTypeFees' => 20.00
            ]
        );
        TestType::factory()->create(
            [
                'testTypeTitle' => 'Practical driving test',
                'testTypeDescription' => 'The applicant must pass a practical testing of the driving that evaluates his capabilities to control the vehicle and comply with the traffic rules',
                'testTypeFees' => 30.00
            ]
        );
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        Person::factory()->count(20)->create();
//        User::factory()->count(5)->create();
//        Driver::factory()->count(10)->create();
//        $this->appTypes();
//        Application::factory()->count(10)->create();
//        $this->licenseClasses();
//        $this->testTypes();
    }
}
