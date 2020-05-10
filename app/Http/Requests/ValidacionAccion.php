<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionAccion extends FormRequest
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
            'titulo'=> 'required|max:45',
            'descripcion'=>'required|max:100'
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'El titulo es requerido',
            'titulo.max' => 'El titulo no debe superar los 45 caracteres',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.max' => 'La descripción no debe ser mayor a 100 caracteres',
        ];
    }
}
