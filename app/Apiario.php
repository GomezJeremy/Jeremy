<?php

namespace App;
use App\Ubicacion;

use Illuminate\Database\Eloquent\Model;

class Apiario extends Model
{
    protected $table= 'apiarios';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'Descripcion',
        'cantidad',
        'ubicacion_id'

    ];
    public function ubicacion() 
    {
        return $this->belongsTo(Ubicacion::class, 'ubicacion_id');
    }
}
