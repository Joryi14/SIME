<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionesAlbergue extends FormRequest
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
            'Nombre'=>'required|max:20',
            'Distrito'=>'required|max:50',
            'Comunidad'=>'required|max:50',
            'TipoDeInstalacion'=>'max:50|required',
            'model_id' =>'required',
            'Capacidad'=>'required|numeric',
            'telefono'=>'required',
            'Longitud'=>'numeric|required',
            'Latitud'=>'numeric|required',
            'Nececidades'=>'required|max:50',
        ];
    }


    public function messages()
    {
        return [
            //
            'Nombre.required' =>'El nombre del albergue es requerido',
            'Nombre.max' =>'El nombre del albergue no debe ser mayor a 20 caracteres',
            'Distrito.required' =>'El nombre del distrito es requerido',
            'Distrito.max' =>'El nombre del distrito no debe ser mayor a 50 caracteres',
            'Comunidad.required' =>'El nombre de la comunidad es requerida',
            'Comunidad.max' =>' El nombre de la comunidad no debe ser mayor a 50 caracteres',
            'TipoDeInstalacion.max' =>' El tipo de instalacion no debe ser mayor a 50 caracteres',
            'TipoDeInstalacion.required' =>' El tipo de instalacion es requerido',
            'Capacidad.required' =>'La capacidad del albergue es requerida',
            'Capacidad.numeric' =>'La capacidad debe ser numerica',
            'telefono.required' =>'El número de teléfono del albergue es requerido',
            'Nececidades.required' =>'Las necesidades del albergue es requerido',
            'Nececidades.max' =>' Las necesidades del albergue no debe ser mayor a 50 caracteres',
            'Longitud.numeric' =>' La longitud de la emergencia debe ser numerica',
            'Latitud.numeric' =>' La latitud de la emergencia debe ser numerica',
            'Longitud.numeric' =>' La longitud de la emergencia es requerida',
            'Latitud.numeric' =>' La latitud de la emergencia es requerida',
            'model_id.required'=>'El responsable es requerido'
        ];
    }




}
