<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ingreso extends Model
{
    protected $table='ingreso';

    protected $primaryKey='idingreso';

    public $timestamps=false;

    protected $fillable =[
     'idproveedor',
     'idusuario',
     'tipo_comprobante',
     'serie_comprobante',
     'total_venta',
     'fecha_hora',
     'estado'
    ];
    protected $guarded =[
    ];
}
