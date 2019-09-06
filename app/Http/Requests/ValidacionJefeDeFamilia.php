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
         'IdJefeF' => 'required|max:8',
         'Nombre'  => 'required|max:10',
         'Apellido1' => 'required|max:15',
         'Apellido2' => 'required|max:15',
         'Cedula'=> 'required|max:8',
         'Edad'=> 'required|max:3',
         'sexo'=> 'required',
         'Telefono' => 'max:15',
         'Patologia'=> 'max:15'
        ];
    }
    public function messages()
    {
        return [
            'TotalPersonas.required' => 'El Total de Personas es requerido',

            'IdJefeF.required' => 'El Id de jefe de familia es requerido',
            'IdJefeF.max' => 'El id de jefe de familia no debe superar los 8 digitos',

            'Nombre.required' => 'El nombre es requerido',
            'Nombre.max' => 'El nombre no debe superar los 10 caracteres',
            
            'Apellido1.required' => 'El Apellido1 es requerido',
            'Apellido1.max' => 'El Apellido1 no debe superar los 15 digitos',

            'Apellido2.required' => 'El Apellido2 es requerido',
            'Apellido2.max' => 'El Apellido2 no debe superar los 15 digitos',

            'Cedula.required' => 'La Cedula es requerido',
            'Cedula.max' => 'La Cedula no debe superar los 8 digitos',

            'Edad.required' => 'El Edad es requerido',
            'Edad.max' => 'El Edad no debe superar los 3 digitos',
            
            'sexo.required' => 'El sexo es requerido',
            
            'Telefono.max' => 'La Telefono no debe superar los 15 digitos',

            'Patologia.max' => 'La Patologia no debe superar los 15 digitos'
        ];
    }
}
