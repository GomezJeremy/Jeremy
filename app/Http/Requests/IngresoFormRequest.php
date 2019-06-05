<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class IngresoFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *e
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
            'idproveedor'=>'required',
            'idusuario'=>'required',
            'tipo_comprobante'=>'required|max:20',
            'serie_comprobante'=>'required',
            'total_venta'=>'max:30',
            'estado'=>'max:30',
            
            'recepcion_id'=>'required',
            'Precio'=>'required',
            
            
        ];
    }
}