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
            'CodigoIncidente'=>'required|max:20',
            'Descripcion'=>'required|max:200',
            'Longitud'=>'required|numeric',
            'Hora'=>'required',
            'Fecha'=>'required',
            'Categoria'=>'required',
            'Latitud'=>'required|numeric',
        ];
    }
     public function messages()
     {
          return[
              'CodigoIncidente.max'=>'El código no debe ser mayor a los 20 caracteres',
              'CodigoIncidente.required'=>'El código es requerido',
              'Descripcion.required' => 'La descripción es requerida',
              'Descripcion.max' => 'La descripción no debe ser mayor a 200 caracteres',
              'Latitud.required' => 'La latitud es requerida',
              'Longitud.required' => 'La longitud es requerida',
              'Latitud.numeric' => 'La latitud debe ser numerica',
              'Longitud.numeric' => 'La longitud debe ser numerica',
              'Hora.required' => 'La hora es requerida',
              'Fecha.required' => 'La fecha es requerida',
              'Categoria.required' => 'La categoría es requerida',
               ];
     }

}
