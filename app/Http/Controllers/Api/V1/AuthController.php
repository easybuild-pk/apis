<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserSignupRequest;
use App\Http\Responses\CreatedResponse;
use App\Http\Responses\SuccessResponse;
use App\traits\AuthenticateUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AuthenticateUser
{
    public function signup(UserSignupRequest $request)
    {
        $user = new User(array_merge($request->validated(), [
            'password' => bcrypt($request->password)
        ]));
        $user->save();
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return CreatedResponse::toResponse('User created successfully. Please log in.');
        }
        return $this->authenticate(Auth::user(), $request, 'User created successfully!');
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid email or password.'
            ], Response::HTTP_BAD_REQUEST);
        }
        return $this->authenticate(Auth::user(), $request, 'Successfully logged in.');
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return SuccessResponse::toResponse('Successfully logged out.');
    }
}
