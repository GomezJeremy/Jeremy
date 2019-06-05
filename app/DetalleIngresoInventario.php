<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngresoInventario extends Model
{
    protected $table='detalle_ingreso_inventario';

    protected $primaryKey='iddetalle_ingreso_inventario';
    public $timestamps=false;

    protected $fillable =[
     'idingreso_inventario',
     'stock_id',
     'Precio',
     'cantidad'
    ];
    protected $guarded =[
    ];
}