<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionInscripcionVoluntarios extends FormRequest
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
            'NombreVoluntarioWeb' => 'required|max:100',
            'ApellidoVoluntario1Web' => 'required|max:100',
            'ApellidoVoluntario2Web' => 'required|max:100',
            'TelefonoVoluntarioWeb ' => 'required',
            'NacionalidadVoluntarioWeb ' => 'required|max:100',
            ' OcupacionWeb' => 'max:100',
            ' PatologiaWeb' => 'max:100',
            

        ];
    }


    public function messages()
    {
        return [
            //
            'NombreVoluntarioWeb.required' =>'El nombre del voluntario es requerido',
            'NombreVoluntarioWeb.max' =>'El nombre del voluntario no debe ser mayor a 100 caracteres',

            'ApellidoVoluntario1Web.required' => 'El primer apellido  del volunbtario es requerido',
            'ApellidoVoluntario1Web.max' => 'El primer apellido  del volunbtario no debe superar los 100 digitos',

            'ApellidoVoluntario2Web.required' => 'El segundo apellido del voluntario  es requerido',
            'ApellidoVoluntario1Web.max' => 'El segundo apellido del voluntario   no debe superar los 100 digitos',
            'TelefonoVoluntarioWeb.required' =>'El número de telefono del albergue es requerido',
            'NacionalidadVoluntarioWeb .required' => 'La nacionalidad del voluntario es requerida',
            'NacionalidadVoluntarioWeb .max' => 'La nacionalidad del voluntario no debe superar los 100 digitos',
            'OcupacionWeb .max' => 'La ocupación del voluntario no debe superar los 100 digitos',
            'PatologiaWeb.max' => 'La patología del voluntario no debe superar los 100 digitos',

        ];
    }
}
