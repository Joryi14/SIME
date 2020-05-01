<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuarioRol extends FormRequest
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
        return [
            'model_id'=>'required',
            'role_id'=>'required'       
         ];
    }
    public function messages()
    {
        return [
            //

            'model_id.required' =>'El usuario es requerido',
            'role_id.required' =>'El rol es requerido'
        ];
    }
}
