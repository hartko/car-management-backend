<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
    public function rules()
    {

        switch ($this->method()) {
            /*for login function*/
            case 'POST':{
                return [
                    'email' => 'required|email',
                    'password' => 'required',
                ];
            }

            default:
            break;
        }
    }

    /*custom validation message*/
    public function messages(){

        switch ($this->method())  {
            case 'POST':{
                return [
                    'email.required' => 'Email is required!',
                    'email.email' => 'Please enter a valid email!',
                    'password.required' => 'Password id required!',
                ];
            }
            default:
            break;
        }
    }

}
