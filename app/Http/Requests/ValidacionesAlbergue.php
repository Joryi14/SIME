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
            'TipoDeInstalacion'=>'max:50',

            'Capacidad'=>'required',
            'telefono'=>'required',
            'Longitud'=>'required|max:50',
            'Latitud'=>'required|max:50',
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
            'Comunidad.required' =>'La nombre de la comunidad es requerida',
            'Comunidad.max' =>' La nombre de la comunidad no debe ser mayor a 50 caracteres',
            'TipoDeInstalacion.max' =>' El tipo de instalacion no debe ser mayor a 50 caracteres',
            'Capacidad.required' =>'La capacidad del albergue es requerido',
            'telefono.required' =>'El número de telefono del albergue es requerido',
            'Longitud.required' =>'La Longitud del albergue es requerida',
            'Longitud.max' =>' La Longitud del albergue no debe ser mayor a 50 caracteres',
            'Latitud.required' =>'La Latitud del albergue es requerida',
            'Latitud.max' =>' La Latitud del albergue no debe ser mayor a 50 caracteres',
            'Nececidades.required' =>'Las nececidades del albergue es requerido',
            'Nececidades.max' =>' Las nececidades del albergue no debe ser mayor a 50 caracteres'
            
        ];
    }




}
