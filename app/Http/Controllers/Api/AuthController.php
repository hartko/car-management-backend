<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){

        /*validate login data*/
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        /*check validation*/
        if(!$validator->fails()){
            if (! $token = auth()->attempt(request(['email', 'password']))) {
                return response()->json(['msg' => 'Invalid Credentials! Please check your username or password.']);
            }

            return $this->respondWithToken($token);

        }else{

            return response()->json([
                'msg' => $validator->errors(),
                'status' => 'failed'
        ]);


        }
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
