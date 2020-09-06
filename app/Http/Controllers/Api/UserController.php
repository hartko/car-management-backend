<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\Validation\UserRequest;

class UserController extends Controller{

    public function register(UserRequest $request){

        $registerData = $request->all();
        $user = User::create($registerData);

        if($user){
            /*return this if succesful in registering the user*/
            return response()->json([
                'msg' => 'Succesful!',
                'status' => 'success'
            ]);

        }else{
            /*if registration fails*/
            return response()->json([
                'msg' => 'Something went wrong, Please try again!',
                'status' => 'failed'
            ]);
        }
    }
}
