<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Validation\AuthRequest;

class AuthController extends Controller
{
    public function login(AuthRequest $request){

        if (! $token = auth()->attempt(request(['email', 'password']))) {
            return response()->json(['message' => 'Invalid Credentials! Please check your username or password.']);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
