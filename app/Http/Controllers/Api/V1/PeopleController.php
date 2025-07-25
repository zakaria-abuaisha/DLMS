<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\People\StorePersonRequest;
use App\Http\Requests\Api\V1\People\UpdatePersonRequest;
use App\Http\Resources\V1\PersonResource;
use App\Models\Person;
use App\Models\User;
use App\Policies\V1\UserPolicy;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeopleController extends ApiController
{

    protected $policyClass = UserPolicy::class;

    public function store(StorePersonRequest $request)
    {
        return new PersonResource(Person::create($request->mappedAttributes()));
    }

    public function show(Person $person)
    {
        return new PersonResource($person);
    }

    public function update(UpdatePersonRequest $request, Person $person)
    {
        if($person->load("user"))
        {
            if(!$this->isAble('update',  Auth::user()))
            {
                return $this->notAuthorized('You Are Not Authorized');
            }
            unset($person->user);
        }

        $person->update($request->mappedAttributes());
        return new PersonResource($person);
    }

    public function destroy(Person $person)
    {
        if($person->load("user"))
        {
            if(!$this->isAble('delete', Auth::user()))
            {
                return $this->notAuthorized('You Are Not Authorized');
            }
        }
        $person->delete();
        return $this->ok('Person successfully deleted');
    }
}
