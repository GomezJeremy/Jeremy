<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    
    protected $table= 'ubicacions';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'descripcion'

    ];

}
