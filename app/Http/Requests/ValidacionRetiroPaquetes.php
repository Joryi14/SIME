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
            'IdChofer'=> 'required',
            'IdAdministradorI'=> 'required',
            'IdVoluntario'=> 'required',
            'PlacaVehiculo'=> 'required',
            'DireccionAEntregar'=> 'required|max:100',
            'SuministrosGobierno'=> 'required',
            'SuministrosGobierno'=>'numeric',
            'SuministrosComision'=> 'required',
            'SuministrosComision'=>'numeric',
            'IdInventario'=> 'required',
            
            

        ];
    }

    public function messages()
    {
        return [
            //

            'IdChofer.required' =>'El id del chofer es requerido',
            'IdAdministradorI.required' =>'El id del administrador del inventario es requerido',
            'IdVoluntario.required' =>'El id del voluntario es requerido',
            'PlacaVehiculo.required' =>'La placa del vehiculo es requerida',
            'DireccionAEntregar.required' =>'La direccion es requerida',
            'DireccionAEntregar.max' =>'La dirección no debe ser mayor a 100 caracteres',
            'SuministrosGobierno.required' =>'La cantidad de suministros por el gobierno es requerida',
            'SuministrosGobierno.numeric' =>' Los suministros brindados por el gobierno deben ser NUMERICOS',
            'SuministrosComision.required' =>'La cantidad de suministros por la comisión es requerida',
            'SuministrosComision.numeric' =>' Los suministros brindados por la comisión  deben ser NUMERICOS',
            'IdVoluntario.required' =>'El id del inventario es requerido',
        ];
    }
}
