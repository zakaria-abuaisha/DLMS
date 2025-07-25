<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\UserFilter;
use App\Http\Requests\Api\V1\Users\StoreUserRequest;
use App\Http\Requests\Api\V1\Users\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Policies\V1\UserPolicy;
use Illuminate\Support\Facades\Auth;

class UsersController extends ApiController
{
    protected $policyClass = UserPolicy::class;

    public function index(UserFilter $filters)
    {

        if($this->isAble("viewAny", Auth::user()))
        {
            return UserResource::collection(
                User::filter($filters)->paginate()
            );
        }
        return $this->notAuthorized("NOT Authorized");
    }

    public function store(StoreUserRequest $request)
    {
        if($this->isAble("store", Auth::user()))
        {
            return new UserResource(User::create($request->mappedAttributes()));
        }
        return $this->notAuthorized("NOT Authorized");
    }

    public function show(User $user)
    {

        if($this->isAble("viewAny", Auth::user()))
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

            foreach ($toBeIncluded as $key => $value)
            {
                if($this->include($key))
                    $user->load($value);
            }

            return new UserResource($user);
        }

        return $this->notAuthorized("NOT Authorized");
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        // PATCH
        if ($this->isAble('update', Auth::user()))
        {
            $user->update($request->mappedAttributes());

            return new UserResource($user);
        }

        return $this->notAuthorized("NOT Authorized");

    }

    public function destroy(User $user)
    {
        if($this->isAble('delete', Auth::user()))
        {
            $user->delete();

            return $this->ok('User successfully deleted');
        }

        return $this->notAuthorized("NOT Authorized");
    }
}
