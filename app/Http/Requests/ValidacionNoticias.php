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
            'Titulo'=> 'required',
            'IdAutor'=> 'required',
            'Articulo'=> 'required',

            
        ];
    }

    public function messages()
    {
        return [
            //

            'Titulo.required' => ' El titulo de la noticia es requerido',
            'IdAutor.required' => ' El autor ese requerido',
            'Articulo.required' => ' El artículo es requerido',
        ];
    }
}
