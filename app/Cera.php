<?php

namespace App;
use App\RecepcionMateriaPrima;

use Illuminate\Database\Eloquent\Model;

class Cera extends Model
{
    //
    protected $table= 'ceras';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'Descripcion',
        'Recepcion_id',
       'PesoBruto',
       'PesoNeto',
       'Fecha'
       

    ];
    public function RecepcionMateriaPrima() 
    {
        return $this->belongsTo(RecepcionMateriaPrima::class, 'Recepcion_id');
    }
}
