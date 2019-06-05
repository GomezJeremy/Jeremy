<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Civil extends Model
{
    protected $table= 'estado_civils';
    protected $primaryKey="id";
    
    public $timestamps=false;

    protected $fillable =[
               'descripcion'
    ];
}
