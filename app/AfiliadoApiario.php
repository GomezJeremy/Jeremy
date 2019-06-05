<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AfiliadoApiario extends Model
{
    protected $table= 'afiliado_apiarios';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'afiliado_id',
        'apiario_id'
        

    ];
    public function afiliado() 
    {
        return $this->belongsTo(Afiliado::class, 'afiliado_id');
    }

    public function apiario() 
    {
        return $this->belongsTo(Apiario::class, 'apiario_id');
    }
}
