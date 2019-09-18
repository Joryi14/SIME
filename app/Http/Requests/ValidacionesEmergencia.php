<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionesEmergencia extends FormRequest
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
            'NombreEmergencias'=>'required|max:50',
            'TipoDeEmergencia'=>'required|max:30',
            'Descripcion'=>'required|max:100',
            'Longitud'=>'numeric',
            'Latitud'=>'numeric'
        ];
    }

    public function messages()
    {
        return [
            //
            'NombreEmergencias.required' =>'El nombre de la emergencia es requerido',
            'NombreEmergencias.max' =>'El nombre de la emergencia no debe ser mayor a 50 caracteres',
            'TipoDeEmergencia.required' =>'El tipo de emergencia es requerido',
            'TipoDeEmergencia.max' =>'El tipo de emergencia no debe ser mayor a 30 caracteres',
            'Descripcion.required' =>'La descripcion de la emergencia es requerida',
            'Descripcion.max' =>' La descripcion de la emergencia no debe ser mayor a 30 caracteres',
            'Longitud.numeric' =>' La Longitud de la emergencia debe ser NUMERICA',
            'Latitud.numeric' =>' La Latitud de la emergencia debe ser NUMERICA'
           
        ];
    }

}
