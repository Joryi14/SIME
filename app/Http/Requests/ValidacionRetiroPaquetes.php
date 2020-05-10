<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionRetiroPaquetes extends FormRequest
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
            'IdAdministradorI'=> 'required',
            'IdVoluntario'=> 'required',
            'PlacaVehiculo'=> 'required',
            'DireccionAEntregar'=> 'required|max:100',
            'SuministrosGobierno'=> 'required',
            'SuministrosGobierno'=>'numeric',
            'SuministrosComision'=> 'required',
            'SuministrosComision'=>'numeric',
            'IdInventario'=> 'required',
            'NombreChofer'=>'required|max:50',
            'Apellido1C'=>'required|max:100',
            'Apellido2C'=>'required|max:100'

        ];
    }

    public function messages()
    {
        return [
            //

            'IdAdministradorI.required' =>'El id del administrador del inventario es requerido.',
            'IdVoluntario.required' =>'El id del voluntario es requerido.',
            'PlacaVehiculo.required' =>'La placa del vehículo es requerida.',
            'DireccionAEntregar.required' =>'La dirección es requerida.',
            'DireccionAEntregar.max' =>'La dirección no debe ser mayor a 100 caracteres.',
            'SuministrosGobierno.required' =>'La cantidad de suministros por el gobierno es requerida',
            'SuministrosGobierno.numeric' =>' Los suministros brindados por el gobierno deben ser numerico.',
            'SuministrosComision.required' =>'La cantidad de suministros por la comisión es requerida.',
            'SuministrosComision.numeric' =>' Los suministros brindados por la comisión deben ser numerico.',
            'IdInventario.required' =>'El id del inventario es requerido.',
            'NombreChofer.required' =>'El nombre del chofer es requerido.',
            'NombreChofer.max' =>'El nombre del chofer no debe ser mayor a 50 caracteres.',
            'Apellido1C.required' =>'El primer apellido del chofer es requerido.',
            'Apellido1C.max' =>'El primer apellido del chofer no debe ser mayor a 100 caracteres.',
            'Apellido2C.required' =>'El segundo apellido es requerido.',
            'Apellico2C.max' =>'El segundo apellido del chofer no debe ser mayor a 100 caracteres.',

        ];
    }
}
