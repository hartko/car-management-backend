<?php
/*validation for user controller*/

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules(){
        /*register function*/
        return [
            'firstname' => 'required|regex:/^[\pL\s]+$/u',
            'lastname' => 'required|regex:/^[\pL\s]+$/u',
            'middlename' => 'regex:/^[\pL\s]+$/u',
            'email' => 'required|unique:users|email',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ];
    }

    public function messages(){
        /*customized message for validation error*/

        /*register function*/
        return [
            'firstname.required' => 'Please enter your Firstname!',
            'firstname.regex' => 'Please enter a valid Firstname!',
            'lastname.required' => 'Please enter your Lastname!',
            'lastname.regex' => 'Please enter a valid Lastname!',
            'middlename.regex' => 'Please enter a valid Middlename!',
            'email.required' => 'Please enter your Email!',
            'email.email' => 'Please enter a valid Email!',
            'email.unique' => 'The email that you enter is already in use! Please use a different one.',
            'password.required' => 'Please enter your password',
            'password.confirmed' => 'Password doesn`t` match! Please confirm your password.',
            'password.regex' => 'Your password must be more than 8 characters long, should contain at-least 1, Uppercase, 1 Lowercase, 1 Numeric and 1 special character.',

        ];


    }
}
