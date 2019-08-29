<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formMenu extends FormRequest
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
            'nombre' => 'required|max:50|unique:menu,nombre,' . $this->route('id'),
            'url' => 'required|max:100',
            'icono' => 'nullable|max:50'
        ];
    }
    public function messages()
    {
        return[
        'nombre.unique'=>'El nombre ya existe',
        'nombre.required' => 'El nombre es requerido',
        'url.required' => 'La url es requerida',
        'nombre.max' => 'El nombre no debe ser mayor a 50 caracteres',
        'url.max' => 'La url no debe ser mayor a 100 caracteres'
    ];
    }
}
