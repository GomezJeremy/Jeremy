<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngresoCera extends Model
{
    protected $table='detalle_ingreso_cera';

    protected $primaryKey='iddetalle_ingreso_cera';
    public $timestamps=false;

    protected $fillable =[
     'idingreso_cera',
     'cera_id',
     'Precio',
    ];
    protected $guarded =[
    ];
}

