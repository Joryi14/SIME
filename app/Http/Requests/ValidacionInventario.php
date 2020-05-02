<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionInventario extends FormRequest
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
            'idEmergencias'=> 'required',
            'Suministros' => 'required',
            'Colchonetas'=>'required',
            'Cobijas'=>'required',
            'Ropa'=>'required'
        ];
    }
    // public function messages()
    // {
    //     return[
    //         'idEmergencias.required' => ' El Id de la EMERGENCIA es requerido',
    //         'Suministros.required' => ' La cantidad de SUMINISTROS es requerida',
    //     ];
    // }
}
