<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionRol extends FormRequest
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
            'name' =>'required|max:25|unique:roles,name'
        ];
    }
    public function messages()
   {
        return[
            'name.unique' => 'Este rol ya existe',
            'name.required' => 'El nombre del rol es requerido',
            'name.max' => 'El nombre del rol no debe superar los 25 digitos'
             ];

   }
}
