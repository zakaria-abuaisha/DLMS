<?php

namespace App\Policies\V1;

use App\Models\User;
use App\Permissions\V1\Abilities;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\AuthenticationException;

class UserPolicy
{

    public function viewAny(User $user): bool
    {
        if($user->tokenCan(Abilities::ViewUsers))
            return true;

        throw new AuthenticationException('You Are Not Authorized');
    }


    public function store(User $user): bool
    {
        if($user->tokenCan(Abilities::CreateUser))
            return true;

        throw new AuthenticationException('You Are Not Authorized');
    }


    public function update(User $user, User $model): bool
    {
        if($user->tokenCan(Abilities::UpdateUser))
            return true;

        throw new AuthenticationException('You Are Not Authorized');
    }


    public function delete(User $user, User $model): bool
    {
        if($user->tokenCan(Abilities::DeleteUser))
            return true;

        throw new AuthenticationException('You Are Not Authorized');
    }

    public function deactivateUser(User $user, User $model): bool
    {
        if($user->tokenCan(Abilities::DeactivateUser))
            return true;

        throw new AuthenticationException('You Are Not Authorized');
    }
}
