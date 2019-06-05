<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre','precio'
    ];

     public function stocks() 
    {
        return $this->hasMany('App/Stock');
    }

    
}
