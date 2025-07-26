<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\ApplicationTypeFilter;
use App\Http\Requests\Api\V1\ApplicationTypes\StoreApplicationTypeRequest;
use App\Http\Requests\Api\V1\ApplicationTypes\UpdateApplicationTypeRequest;
use App\Http\Resources\V1\ApplicationTypeResource;
use App\Models\ApplicationType;
use Illuminate\Http\Request;

class ApplicationTypeController extends ApiController
{
    public function index(ApplicationTypeFilter $filter)
    {
        return ApplicationTypeResource::collection(ApplicationType::filter($filter)->paginate());
    }

    public function store(StoreApplicationTypeRequest $request)
    {
        return new ApplicationTypeResource(ApplicationType::create($request->mappedAttributes()));
    }

    public function show(ApplicationType $applicationType)
    {
        if($this->include('applications'))
            $applicationType->load('applications');

        return new ApplicationTypeResource($applicationType);
    }

    public function update(UpdateApplicationTypeRequest $request, ApplicationType $applicationType)
    {
        $applicationType->update($request->mappedAttributes());
        return new ApplicationTypeResource($applicationType);
    }

    public function destroy(ApplicationType $applicationType)
    {
        $applicationType->delete();
        return $this->ok('Application Type successfully deleted');
    }
}
