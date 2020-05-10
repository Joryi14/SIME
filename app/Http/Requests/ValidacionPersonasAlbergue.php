<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPersonasAlbergue extends FormRequest
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
            //
            'idAlbergue'=> 'required',
            'idAlbergue'=> 'numeric',
            'idJefe'=> 'required',
            'LugarDeProcedencia'=> 'required|max:50',
            'FechaDeIngreso'=> 'required',
            'HoraDeIngreso'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            //

            'idAlbergue.required' => 'El id del albergue es requerido',
            'idAlbergue.numeric' =>' El id del albergue debe ser numerico',
            'idJefe.required' => 'El id del jefe de familia es requerido',
            'LugarDeProcedencia.required' => 'El lugar de procedencia es requerido',
            'LugarDeProcedencia.max' => 'El lugar de procedencia no debe superar los 50 caracteres',
            'FechaDeIngreso.required' => 'La fecha de ingreso al albergue es requerida',
            'HoraDeIngreso.required' => 'La hora de ingreso al albergue es requerida',
        ];
    }

}
