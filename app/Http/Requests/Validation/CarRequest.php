<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;


class CarRequest extends FormRequest
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

        switch ($this->method()) {
            case 'POST':{
                return [
                    'make' => 'required',
                    'model' => 'required',
                    'year' => 'required',
                    'price' => 'required',
                ];
            }
            case 'PUT':{
                return [
                'make' => 'required',
                'model' => 'required',
                'year' => 'required',
                'price' => 'required',
            ];

            }


            default:
            // code...
            break;
        }

    }

    public function messages(){
        switch ($this->method()) {
            case 'POST':{
                return [
                    'make.required' => 'Make is required!',
                    'model.required' => 'Model is required!',
                    'year.required' => 'Year is required!',
                    'price.required' => 'Price is required!',
                ];
            }
            case 'PUT':{
                return [
                    'make.required' => 'Make is required!',
                    'model.required' => 'Model is required!',
                    'year.required' => 'Year is required!',
                    'price.required' => 'Price is required!',
                ];
            }
            default:
            // code...
            break;
        }
    }
}
