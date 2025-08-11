<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LicenseClasses\StoreLicenseClassRequest;
use App\Http\Requests\Api\V1\LicenseClasses\UpdateLicenseClassRequest;
use App\Http\Resources\V1\LicenseClassResource;
use App\Models\LicenseClass;

class LicenseClassesController extends ApiController
{

    public function index()
    {
        return LicenseClassResource::collection(LicenseClass::all());
    }

    public function store(StoreLicenseClassRequest $request)
    {
        return new LicenseClassResource(LicenseClass::create($request->mappedAttributes()));
    }

    public function show(LicenseClass $licenseClass)
    {
        $toBeIncluded = [
            'Licenses',
            'LocalDrivingLicenseApplications'
        ];

        foreach ($toBeIncluded as $value)
        {
            if($this->include($value))
                $licenseClass->load($value);
        }

        return new LicenseClassResource($licenseClass);

    }

    public function update(UpdateLicenseClassRequest $request, LicenseClass $licenseClass)
    {
        $licenseClass->update($request->mappedAttributes());
        return new LicenseClassResource($licenseClass);
    }

    public function destroy(LicenseClass $licenseClass)
    {
        $licenseClass->delete();
        return $this->ok('License Class successfully deleted');
    }
}
