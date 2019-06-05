<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecepcionMateriaPrima extends Model
{
    protected $table= 'recepcion_materia_primas';
    protected $primaryKey="id";
    public $timestamps=true;
    protected $fillable = 
    [      
        'fecha',
        'pesoBruto',
        'pesoNeto',
        'numero_muestras',
        'afiliado_id',
        'user_id',
        'tipoEntrega_id',
        'observacion'
    ];
    protected $casts = [
        'fecha' => 'Y-m-d H:i:s'
    ];
    public function user() 
    {
        return $this->belongsTo(User::class ,'user_id');
    }
    public function afiliado() 
    {
        return $this->BelongsTo(Afiliado::class,'afiliado_id');
    }
    public function tipoEntrega() 
    {
        return $this->BelongsTo(TipoEntrega::class,'tipoEntrega_id');
    }
   
}
