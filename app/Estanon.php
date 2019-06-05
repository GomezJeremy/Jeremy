<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estanon extends Model
{
    protected $table= 'estanons';
    protected $primaryKey="id";
    
    public $timestamps=true;
   
    protected $fillable =[
        'Descripcion',
        'Peso',
        

    ];
}
