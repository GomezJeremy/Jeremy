<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RecepcionMateriaPrima;
use App\Estanon;
class RecepcionEstanon extends Model
{
    //
    
    //
    protected $table= 'recepcion_estanons';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        
        'Recepcion_id',
        'Estanon_id',
        'Fecha'
      
       

    ];
    public function RecepcionMateriaPrima() 
    {
        return $this->belongsTo(RecepcionMateriaPrima::class, 'Recepcion_id');
    }
    public function Estanon() 
    {
        return $this->belongsTo(Estanon::class, 'Estanon_id');
    }
}
