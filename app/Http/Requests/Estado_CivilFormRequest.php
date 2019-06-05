<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Estado_CivilFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //cambiar a true 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *///reglas 
    public function rules()
    {
        return [
            //
            'descripcion'=>'max:255', 
        ];
    }
}
