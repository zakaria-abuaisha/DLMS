<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\ApplicationFilter;
use App\Http\Requests\Api\V1\Applications\StoreApplicationRequest;
use App\Http\Requests\Api\V1\Applications\UpdateApplicationRequest;
use App\Http\Resources\V1\ApplicationResource;
use App\Models\Application;

class ApplicationController extends ApiController
{
    public function index(ApplicationFilter $filter)
    {
        return ApplicationResource::collection(Application::filter($filter)->paginate());
    }

    public function show(Application $application)
    {
        $toBeIncluded = [
            'applicantInfo' => 'applicantPerson',
            'applicationType' => 'applicationType',
            'createdByUser' => 'createdByUser',
        ];

        foreach ($toBeIncluded as $key => $value)
        {
            if($this->include($key))
                $application->load($value);
        }

        return new ApplicationResource($application);
    }

    public function store(StoreApplicationRequest $request)
    {

        $app = Application::where('applicant_person_id', $request->input('data.relationships.person.id'))
            ->where('application_type_id', $request->input('data.relationships.applicationType.id'))
            ->where('applicationStatus', 'P')
            ->first();
        if($app)
        {
            return $this->error('There is already a pending application for this person with this application type.', 401);
        }

        return new ApplicationResource(Application::create($request->mappedAttributes()));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        if(in_array($application->applicationStatus, ['X', 'C']))
        {
            return $this->error('You Can Only Update Pending Application', 401);
        }
        $application->update($request->mappedAttributes());
        return new ApplicationResource($application);
    }

    public function destroy(Application $application)
    {
        if(in_array($application->applicationStatus, ['X', 'C']))
        {
            return $this->error('You Can Only Delete Pending Application', 401);
        }

        $application->delete();
        return $this->ok('Application successfully deleted');
    }
}
