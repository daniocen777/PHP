<?php

namespace sisVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Si el usuario está autorizado
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
            // Reglas
            // Ver la tabla para saber las reglas 
            // Estos nombres no son necesariamente de la BD, sino del archivo Html que se creará
            'nombre'=>'required|max:50',
            'descripcion'=>'max:250'
        ];
    }
}
