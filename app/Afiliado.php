<?php

namespace App;
use App\Notifications\NotificacionPago;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    use Notifiable; 


    protected $table= 'afiliados';
    protected $primaryKey="id";
    public $timestamps=false;
    public $incrementing=false;

    protected $fillable =[
        'id',
        'Nombre',
        'apellido1',
        'apellido2',
        'Telefono',
        'email',
        'Direccion',
        'Fecha_Ingreso',
        'Num_Cuenta',
         'genero_id',
         'estado_civil_id',
         'estado_id'
    ];
   

    public function Genero() 
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }
    public function Estado_Civil() 
    {
        return $this->belongsTo(Estado_Civil::class, 'estado_civil_id');
    }   

    public function scopeBuscar($query,$Nombre)
		{
		  if (trim($Nombre) !="")
		  {
		    $query->where(\DB::raw("CONCAT(Nombre,' ',apellido1)"),"LIKE","%$Nombre%");
		  }

		}
}
