<?php

namespace App\Http\Controllers;

use App\IngresoCera;
use App\DetalleIngresoCera;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoCeraFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection; 
use pp\Http\Controllers\Redirct;
use App\Http\Controllers\Controller;
use Carbon\Carbon; 
use Response; 
use PDF;
use DB;

class IngresoCeraController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); 
            $ingresos=DB::table('ingreso_cera as i')
                ->join('afiliados as p','i.idproveedor','=','p.id')
                ->join('users as u','i.idusuario','=','u.id')
                ->join('detalle_ingreso_cera as di','i.idingreso_cera','=','di.idingreso_cera')
                ->select('i.idingreso_cera','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
                ->where('i.idingreso_cera','LIKE','%'.$query.  '%')
                ->orderBy ('i.idingreso_cera','desc')
                ->groupBy('i.idingreso_cera','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
                ->paginate(7);
                return view ('IngresoCera.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $personas=DB::table('afiliados')
        ->get();
        $usuarios=DB::table('users')
        ->get();
        $ceras = DB::table('ceras as art')
          ->select(DB::raw('CONCAT(art.id ," - ",art.Recepcion_id ) AS ceras'),'art.id','art.PesoNeto')
          ->groupBy('ceras','art.id','art.PesoNeto')
          ->where('art.PesoNeto','>','0')
          ->get();
        return view ("IngresoCera.create",["personas"=>$personas,"usuarios"=>$usuarios,"ceras"=>$ceras]);
    }
    public function store (IngresoCeraFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $ingreso=new IngresoCera;
            $ingreso->idproveedor=$request->get('idproveedor');
            $ingreso->idusuario=$request->get('idusuario');
            $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->tipo_pago=$request->get('tipo_pago');
            $ingreso->total_venta=$request->get('total_venta');

            $mtyime= Carbon::now('America/Costa_Rica');
            $ingreso->fecha_hora=$mtyime->toDateTimeString();
            $ingreso->estado='Activo';
            $ingreso->save();

            $cera_id = $request->get('cera_id');
            $Precio= $request->get('Precio');
        

            $cont= 0;
            while ($cont < count($cera_id)){
                $detalle = new DetalleIngresoCera(); 
                $detalle->idingreso_cera=$ingreso->idingreso_cera;
                $detalle->cera_id=$cera_id[$cont];
                $detalle->Precio=$Precio[$cont];
                $detalle->save();
                $cont=$cont+1;
                
            }
            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('IngresoCera'); 
    }
    public function show ($id)
    {
        $ingresos=DB::table('ingreso_cera as i')
        ->join('afiliados as p','i.idproveedor','=','p.id')
        ->join('users as u','i.idusuario','=','u.id')
        ->join('detalle_ingreso_cera as di','i.idingreso_cera','=','di.idingreso_cera')
        ->select('i.idingreso_cera','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
        ->where('i.idingreso_cera','=',$id)
        ->groupBy('i.idingreso_cera','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
        ->first();

        $detalles=DB::table('detalle_ingreso_cera as d')
            ->join ('ceras as a','d.cera_id','=','a.id')
            ->select('a.Descripcion as ceras','d.Precio','a.PesoNeto')
            ->where('d.idingreso_cera','=',$id)
            ->get(); 
        return view("IngresoCera.show",["ingresos"=>$ingresos,"detalles"=>$detalles]);
    }

    public function edit($id)
{
    $ingresos=DB::table('ingreso_cera as i')
    ->join('afiliados as p','i.idproveedor','=','p.id')
    ->join('users as u','i.idusuario','=','u.id')
    ->join('detalle_ingreso_cera as di','i.idingreso_cera','=','di.idingreso_cera')
    ->select('i.idingreso_cera','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
    ->where('i.idingreso_cera','=',$id)
    ->groupBy('i.idingreso_cera','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
    ->first();

    $detalles=DB::table('detalle_ingreso_cera as d')
        ->join ('ceras as a','d.cera_id','=','a.id')
        ->select('a.Descripcion as ceras','d.Precio','a.PesoNeto')
        ->where('d.idingreso_cera','=',$id)
        ->get(); 
    
     $ingresos = PDF::loadView("IngresoCera.edit",["ingresos"=>$ingresos,"detalles"=>$detalles]);
     return $ingresos->download('IngresoCera.edit');
  
}
    public function destroy ($id)
    {
        $ingresoC=IngresoCera::findOrFail($id);
        $ingresoC->Estado='Cancelado';
        $ingresoC->update();
        return Redirect::to('IngresoCera');
    }
}
