<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Ingreso;
use App\DetalleIngreso;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon; 
use Response; 
use Illuminate\Support\Collection; 

use pp\Http\Controllers\Redirct;
use App\Http\Requests\DetalleIngresoFormRequest;

use App\Http\Controllers\Controller;
use DB;
use PDF;


class IngresoController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); 
            $ingresos=DB::table('ingreso as i')
                ->join('afiliados as p','i.idproveedor','=','p.id')
                ->join('users as u','i.idusuario','=','u.id')
                ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
                ->select('i.idingreso','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
                ->where('i.idingreso','LIKE','%'.$query.  '%')
                ->orderBy ('i.idingreso','desc')
                ->groupBy('i.idingreso','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
                ->paginate(7);
                return view ('Ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $personas=DB::table('afiliados')
        ->get();
        $usuarios=DB::table('users')
        ->get();
        $productos = DB::table('recepcion_materia_primas as art')
          ->select(DB::raw('CONCAT(art.id) AS producto'),'art.id','art.PesoBruto')
          ->groupBy('producto','art.id','art.PesoBruto')
          ->where('art.PesoBruto','>','0')
          ->get();
        return view ("Ingreso.create",["personas"=>$personas,"usuarios"=>$usuarios,"productos"=>$productos]);
    }
    public function store (IngresoFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $ingreso=new Ingreso;
            $ingreso->idproveedor=$request->get('idproveedor');
            $ingreso->idusuario=$request->get('idusuario');
            $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->total_venta=$request->get('total_venta');
            $mtyime= Carbon::now('America/Costa_Rica');
            $ingreso->fecha_hora=$mtyime->toDateTimeString();
            $ingreso->estado='Activo';
            $ingreso->save();
            $recepcion_id= $request->get('recepcion_id');
            $Precio = $request->get('Precio');
         
            $cont= 0;
            while ($cont < count($recepcion_id)){
                $detalle = new DetalleIngreso(); 
                $detalle->idingreso=$ingreso->idingreso;
                $detalle->recepcion_id=$recepcion_id[$cont];
                $detalle->Precio=$Precio[$cont];
              
                $detalle->save();
                $cont=$cont+1;
                
            }
            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('Ingreso'); 
    }
    public function show ($id)
    {
        $ingresos=DB::table('ingreso as i')
        ->join('afiliados as p','i.idproveedor','=','p.id')
        ->join('users as u','i.idusuario','=','u.id')
        ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
        ->select('i.idingreso','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
        ->where('i.idingreso','=',$id)
        ->groupBy('i.idingreso','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
        ->first();
        $detalles=DB::table('detalle_ingreso as d')
            ->join ('recepcion_materia_primas as a','d.recepcion_id','=','a.id')
            ->select('a.id as producto','d.Precio','a.PesoBruto')
            ->where('d.idingreso','=',$id)
            ->get(); 
        return view("Ingreso.show",["ingresos"=>$ingresos,"detalles"=>$detalles]);
    }
    public function edit($id)
{
    $ingresos=DB::table('ingreso as i')
    ->join('afiliados as p','i.idproveedor','=','p.id')
    ->join('users as u','i.idusuario','=','u.id')
    ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
    ->select('i.idingreso','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
    ->where('i.idingreso','=',$id)
    ->groupBy('i.idingreso','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.total_venta','i.estado')
    ->first();
    $detalles=DB::table('detalle_ingreso as d')
    ->join ('recepcion_materia_primas as a','d.recepcion_id','=','a.id')
    ->select('a.id as producto','d.Precio','a.PesoBruto')
    ->where('d.idingreso','=',$id)
    ->get(); 
        
$ingresos = PDF::loadView("Ingreso.edit",["ingresos"=>$ingresos,"detalles"=>$detalles]);
return $ingresos->download('Ingreso.edit');
  
}
    public function destroy ($id)
    {
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->Estado='Cancelado';
        $ingreso->update();
        return Redirect::to('Ingreso');
    }
}