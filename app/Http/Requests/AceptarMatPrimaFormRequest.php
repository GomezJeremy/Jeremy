<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class AceptarMatPrimaFormRequest extends Request
{
  
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return 
        [
           'descripcion'=>'max:255', 
        ];
    }
}
