<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEntregaDonaciones extends FormRequest
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
            'IdUsuarioRol'=>'required',
            'IdJefe'=>'required',
            'IdRetiroPaquetes'=>'required',
            'IdRetiroPaquetes'=>'numeric',
            'Foto'=>'required',
        ];
    }

    public function messages()
    {
        return [
            //

            'IdUsuarioRol.required' =>'El Id del usuario Rol es requerido',
            'IdJefe.required' =>'El Id del jefe de familia es requerido',
            
            'IdRetiroPaquetes.required' =>'El Id del retiro de paquetes es requerido',
            'IdRetiroPaquetes.numeric' =>' La Id de retiro de paquetes debe ser NUMERICA',
            'Foto.required' =>'La foto es requerido',
        ];
    }



}
