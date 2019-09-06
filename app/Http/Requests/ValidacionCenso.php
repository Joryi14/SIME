<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCenso extends FormRequest
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
            'IdJefeFam' => 'required|max:8|unique:Censo,IdjefeFam'
        ];
    }
   public function messages()
   {
        return[
            'IdJefeFam.unique' => 'Este jefe de familia ya tiene un censo',
            'IdJefeFam.required' => 'El Id de jefe de familia es requerido',
            'IdJefeFam.max' => 'El id de jefe de familia no debe superar los 8 digitos'
    
             ];

   }

}
