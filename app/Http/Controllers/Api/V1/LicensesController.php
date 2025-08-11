<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\LicenseFilter;
use App\Http\Requests\Api\V1\Licenses\StoreLicenseRequest;
use App\Http\Requests\Api\V1\Licenses\UpdateLicenseRequest;
use App\Http\Resources\V1\LicenseResource;
use App\Models\License;
use Illuminate\Http\Request;

class LicensesController extends ApiController
{

    public function index(LicenseFilter $filters)
    {
        return LicenseResource::collection(License::filter($filters)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLicenseRequest $request)
    {
        return new LicenseResource(License::create($request->mappedAttributes()));
    }

    /**
     * Display the specified resource.
     */
    public function show(License $license)
    {
        $toBeIncluded = [
            'application' => 'application',
            'driver' => 'driver',
            'personInfo' => 'person',
            'licenseClass' => 'licenseClass',
            'createdByUser' => 'createdByUser',
        ];

        foreach ($toBeIncluded as $key => $value)
        {
            if($this->include($key))
                $license->load($value);
        }

        return new LicenseResource($license);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLicenseRequest $request, License $license)
    {
        $license->update($request->mappedAttributes());
        return new LicenseResource($license);
    }

    public function toggleActivation(License $license)
    {
        $license->update([
            'isActive' => !$license->isActive
        ]);
        return new LicenseResource($license);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(License $license)
    {
        $license->delete();
        return $this->ok('License successfully deleted');
    }
}
