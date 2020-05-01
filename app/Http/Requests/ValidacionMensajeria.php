<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionMensajeria extends FormRequest
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
            'CodigoIncidente'=>'required|max:20|unique:mensajeria,CodigoIncidente',
            'Descripcion'=>'required|max:200',
            'Ubicacion'=>'required',
            'Hora'=>'required',
            'Fecha'=>'required',
            'Categoria'=>'required',
            'idEmergencia'=>'required'
        ];
    }
    // public function messages()
    // {
    //      return[
    //          'CodigoIncidente.unique' => 'Este codigo ya existe',
    //          'CodigoIncidente.max'=>'El codigo no debe superar los 20 digitos',
    //          'CodigoIncidente.required'=>'El codigo es requerido',
    //          'Descripcion.required' => 'La descripcion es requerida',
    //          'Ubicacion.required' => 'La ubicacion es requerida',
    //          'Hora.required' => 'La hora es requerida',
    //          'Fecha.required' => 'La fecha es requerida',
    //          'Categoria.required' => 'La categoria es requerida',
    //          'idEmergencias.required' => 'La emergencia es requerida',
    //           ];
    // }

}