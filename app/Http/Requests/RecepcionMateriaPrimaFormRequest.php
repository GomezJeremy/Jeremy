<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class RecepcionMateriaPrimaFormRequest extends Request
{
  
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return 
        [
           'tipoEntrega_id'=>'max:12', 
           'user_id'=> 'max:12',
           'afiliado_id'=>'max:12'
        ];
    }
}