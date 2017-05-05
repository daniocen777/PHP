<?php

namespace miBiblioteca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorFormRequest extends FormRequest
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
            'nombre' => 'required',
            'descripcion' => 'max:250',
            'imagenAutor' => 'mimes:jpeg,bmp,png,jpg',
            'nombreObra' => 'max:100',
            'fechaPublicacion' => 'required',
            'isbn' => 'required',
            'imagenObra' => 'mimes:jpeg,bmp,png,jpg'
        ];
    }
}
