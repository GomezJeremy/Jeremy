<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IngresoCera extends Model
{
    protected $table='ingreso_cera';

    protected $primaryKey='idingreso_cera';

    public $timestamps=false;

    protected $fillable =[
     'idproveedor',
     'idusuario',
     'tipo_comprobante',
     'serie_comprobante',
     'tipo_pago',
     'total_venta',
     'fecha_hora',
     'estado'
    ];
    protected $guarded =[
    ];
}
