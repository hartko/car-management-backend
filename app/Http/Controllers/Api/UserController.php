<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller{

    public function register(Request $request){

        /*validate register data*/
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|regex:/^[\pL\s]+$/u',
            'lastname' => 'required|regex:/^[\pL\s]+$/u',
            'middlename' => 'regex:/^[\pL\s]+$/u',
            'email' => 'required|unique:users|email',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ],[
            'password.regex' => 'Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.'
        ]);

        /*check validation*/
        if(!$validator->fails()){
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

        }else{
            /*if validation fails, return error*/
            return response()->json([
                'msg' => $validator->errors(),
                'status' => 'failed'
            ]);

        }
    }
}
