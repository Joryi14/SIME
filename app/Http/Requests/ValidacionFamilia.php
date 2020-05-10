<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionFamilia extends FormRequest
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
            'IdJefeF'=> 'required|max:8',
            'Nombre'  => 'required|max:10',
            'Apellido1' => 'required|max:15',
            'Apellido2' => 'required|max:15',
            'Cedula'=> 'required|max:10',
            'Parentesco'=> 'required',
            'Edad'=> 'required|max:3',
            'sexo'=> 'required',
            'Patologia'=> 'required|max:15'
        ];
    }
    public function messages()
    {
        return [
            'IdJefeF.required' => 'El Id de jefe de familia es requerido',
            'IdJefeF.max' => 'El id de jefe de familia no debe superar los 8 caracteres',

            'Nombre.required' => 'El nombre es requerido',
            'Nombre.max' => 'El nombre no debe ser mayor a 10 caracteres',
            
            'Apellido1.required' => 'El primer apellido es requerido',
            'Apellido1.max' => 'El  primer apellido no debe ser mayor a 15 caracteres',

            'Apellido2.required' => 'El segundo apellido es requerido',
            'Apellido2.max' => 'El segundo apellido no debe ser mayor los 15 caracteres',

            'Cedula.required' => 'La cédula es requerida',
            'Cedula.max' => 'La cédula no debe ser mayor a los 10 caracteres',

            'Parentesco.required' => 'El parentesco es requerido',
            'Parentesco.max' => 'El parentesco no debe ser mayor los 15 caracteres',

            'Edad.required' => 'La edad es requerido',
            'Edad.max' => 'La edad no debe ser mayor a los 3 caracteres',
            
            'sexo.required' => 'El sexo es requerido',
         
            'Patologia.required' => 'La patología es requerida',
            'Patologia.max' => 'La patología no debe ser mayor a los 15 caracteres'

        ];


    }
}
