<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TestTypes\StoreTestTypeRequest;
use App\Http\Requests\Api\V1\TestTypes\UpdateTestTypeRequest;
use App\Http\Resources\V1\TestTypeResource;
use App\Models\TestType;
use Illuminate\Http\Request;

class TestTypeController extends ApiController
{

    public function index()
    {
        return TestTypeResource::collection(TestType::all());
    }

    public function store(StoreTestTypeRequest $request)
    {
        return new TestTypeResource(TestType::create($request->mappedAttributes()));
    }

    public function show(TestType $testType)
    {
        if($this->include("testAppointments"))
            $testType->load('testAppointments');

        return new TestTypeResource($testType);
    }

    public function update(UpdateTestTypeRequest $request, TestType $testType)
    {
        $testType->update($request->mappedAttributes());
        return new TestTypeResource($testType);
    }

    public function destroy(TestType $testType)
    {
        $testType->delete();
        return $this->ok('Test Type successfully deleted');
    }
}
