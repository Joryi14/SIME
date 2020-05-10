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
            'Cobijas'=>'required'
        ];
    }
     public function messages()
     {
      return[
             'idEmergencias.required' => 'La emergencia es requerida',
             'Suministros.required' => 'La cantidad de suministros es requerida',
             'Colchonetas.required' =>'La cantidad de colchonetas es requerida',
             'Cobijas.required' =>'La cantidad de cobijas es requerida' 
         ];
     }
}
