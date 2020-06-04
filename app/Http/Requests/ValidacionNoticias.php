<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionNoticias extends FormRequest
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
            'Titulo'=> 'required|max:100',
            'IdAutor'=> 'required',
            'Articulo'=> 'required|max:300',

            
        ];
    }

    public function messages()
    {
        return [
            //

            'Titulo.required' => ' El titulo de la noticia es requerido',
            'IdAutor.required' => ' El autor ese requerido',
            'Articulo.required' => ' El artículo es requerido',
            'Titulo.max' => 'El titulo no debe ser mayor a 100 caracteres',
            'Articulo.max' => 'El articulo no debe ser mayor a 300 caracteres',
        ];
    }
}
