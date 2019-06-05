<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table= 'generos';
    protected $primaryKey="id";
    
    public $timestamps=false;

    protected $fillable =[
        'descripcion'

    ];
    public function Usuarios() 
    {
        return $this->hasMany('App/Usuarios');
    }
}
