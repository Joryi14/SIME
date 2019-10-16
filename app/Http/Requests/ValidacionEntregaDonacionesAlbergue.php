<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEntregaDonacionesAlbergue extends FormRequest
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
            'IdJefeFa'=>'required|max:8|unique:entregadonacionesalbergue,IdJefeFa',
        ];
    }

    public function messages()
    {
        return [
            //
            'IdJefeFa.required' =>'El Id del jefe de familia es requerido',
            'IdJefeFa.unique' =>'Al jefe de familia ya se le entregó paquete',
        ];
    }
}
