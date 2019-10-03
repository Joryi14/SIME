<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionesRetiroPaquetes extends FormRequest
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
            'IdVoluntario' => 'required',
            'PlacaVehiculo' => 'required',
            'DireccionAEntregar' => 'required|max:100',
            'SuministrosGobierno' => 'required',
            'SuministrosComision' => 'required',
            'IdInventario'=>'required'


        ];
    }

        public function messages()
        {
            return [
                'IdChofer.required' => 'El Id del chofer es requerido',
                'IdAdministradorI.required' => 'El Id del administrador de inventario es requerido',
                'IdVoluntario.required' => 'El Id del VOLUNTARIO es requerido',
                'PlacaVehiculo.required' => 'El número de PLACA DEL VEHICULO es requerido',
                'DireccionAEntregar.required' => 'La dirección a entregar los paquetes requerida',
                'DireccionAEntregar.max' => 'La dirección no debe superar los 100 digitos',
                'SuministrosGobierno.required' => 'La cantidad de Suministros brindados por el Gobierno es requerida',
                'SuministrosComision.required' => 'La cantidad de Suministros brindados por la comisión es requerida',
                'IdInventario.required' => 'El Id del inventario es requerido',
                

            ];
        }
}
