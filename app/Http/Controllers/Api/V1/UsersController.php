<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\UserFilter;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Policies\V1\UserPolicy;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class UsersController extends ApiController
{

    protected $policyClass = UserPolicy::class;

    public function index(UserFilter $filters)
    {
        try{
            $this->isAble("viewAny", User::class);

            return UserResource::collection(
                User::with('person')::filter($filters)->paginate()
            );
        }
        catch (AuthenticationException $e)
        {
            return $this->error('Not Authorized', 401);
        }

    }

    public function store(StoreUserRequest $request)
    {
        try
        {
            $this->isAble("store", User::class);

            return new UserResource(User::create($request->mappedAttributes()));
        }
        catch (AuthenticationException $e)
        {
            return $this->error('Not Authorized', 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $toBeIncluded = [
            'userInfo' => 'person',
            'createdDrivers' => 'drivers',
            'detainedLicenses' => 'createdDetainedLicenses',
            'createdLicenses' => 'createdLicenses',
            'releasedDetainedLicense' => 'releasedDetainedCards',
            'createdTests' => 'createdTests',
            'createdTestAppointments' => 'createdTestAppointments',
            'createdApplications' => 'createdApplications',
        ];

        try{
            $this->isAble("view", User::class);

            foreach ($toBeIncluded as $key => $value)
            {
                if($this->include($key))
                    $user->load($value);
            }

            return new UserResource($user);
        }
        catch(AuthenticationException $e)
        {
            return $this->error('Not Authorized', 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
