<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validarRol extends FormRequest
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
            'NombreRol' => 'required|max:50|unique:roles,NombreRol'
        ];
    }
    public function messages()
    {
        return[
        'NombreRol.unique'=>'El nombre ya existe',
        'NombreRol.required' => 'El nombre es requerido',
        'NombreRol.max' => 'El nombre no debe ser mayor a 50 caracteres'
    ];
    }
}
