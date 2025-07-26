<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RegisterRequest;
use App\Http\Requests\Api\V1\Users\LoginUserRequest;
use App\Models\user;
use App\Permissions\V1\Abilities;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request) {
        $request->validated($request->all());


        if (!Auth::attempt($request->only('userName', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::firstWhere('userName', $request->userName);

        if(!$user->isActive)
        {
            return $this->error('This User Is Not Active.', 401);
        }

        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken(
                    'API token for ' . $user->userName,
                    Abilities::getAbilities($user),
                    now()->addMonth())->plainTextToken
            ]
        );
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return $this->ok('Logged Out Successfully');
    }
}
