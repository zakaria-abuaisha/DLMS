<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\DriverFilter;
use App\Http\Requests\Api\V1\Drivers\StoreDriverRequest;
use App\Http\Requests\Api\V1\Drivers\UpdateDriverRequest;
use App\Http\Requests\Api\V1\Users\StoreUserRequest;
use App\Http\Resources\V1\DriverResource;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriversController extends ApiController
{
    public function index(DriverFilter $filter)
    {
        return DriverResource::collection(Driver::filter($filter)->paginate());
    }

    public function store(StoreDriverRequest $request)
    {
        return new DriverResource(Driver::create($request->mappedAttributes()));
    }

    public function show(Driver $driver)
    {
        $toBeIncluded = [
            'driverInfo' => 'person',
            'createdByUser' => 'createdByUser',
            'license' => 'licenses',
        ];

        foreach ($toBeIncluded as $key => $value)
        {
            if($this->include($key))
                $driver->load($value);
        }
        return new DriverResource($driver);
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return $this->ok('Driver successfully deleted');
    }

}
