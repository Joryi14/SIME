<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionJefeDeFamilia extends FormRequest
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
        'TotalPersonas' => 'required',         
         'Nombre'  => 'required|max:10',
         'Apellido1' => 'required|max:15',
         'Apellido2' => 'required|max:15',
         'Cedula'=> 'required|max:10',
         'Edad'=> 'required|max:3',
         'sexo'=> 'required',
         'Telefono' => 'max:15',
         'Patologia'=> 'required|max:15'
        ];
    }
    public function messages()
    {
        return [
            'TotalPersonas.required' => 'El total de Personas es requerido',

            
            'Nombre.max' => 'El nombre no debe ser mayor a 10 caracteres',
            'Nombre.required' => 'El nombre es requerido',
            'Apellido1.required' => 'El primer apellido es requerido',
            'Apellido1.max' => 'El primero apellido no debe ser mayor a los 15 caracteres',

            'Apellido2.required' =>'El segundo apellido es requerido',
            'Apellido2.max' => 'El segundo apellido no debe ser mayor a los 15 caracteres',

            'Cedula.required' => 'La cédula es requerida',
            'Cedula.max' => 'La cédula no debe ser mayor los 10 caracteres',

            'Edad.required' => 'La edad es requerida',
            'Edad.max' => 'La edad no debe ser mayor los 3 caracteres',
            
            'sexo.required' => 'El sexo es requerido',
            
            'Telefono.max' => 'La teléfono no debe ser mayor a los 15 caracteres',

            'Patologia.required' => 'La patología es requerida',
            'Patologia.max' => 'La Patología no debe ser mayor los 15 caracteres'
        ];
    }
}
