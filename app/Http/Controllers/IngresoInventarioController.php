<?php

namespace App\Http\Controllers;

use App\IngresoInventario;
use App\DetalleIngresoInventario;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoInventarioFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection; 
use pp\Http\Controllers\Redirct;
use App\Http\Controllers\Controller;
use Carbon\Carbon; 
use Response; 
use PDF;
use DB;

class IngresoInventarioController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); 
            $ingresos=DB::table('ingreso_inventario as i')
                ->join('afiliados as p','i.idproveedor','=','p.id')
                ->join('users as u','i.idusuario','=','u.id')
                ->join('detalle_ingreso_inventario as di','i.idingreso_inventario','=','di.idingreso_inventario')
                ->select('i.idingreso_inventario','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
                ->where('i.idingreso_inventario','LIKE','%'.$query.  '%')
                ->orderBy ('i.idingreso_inventario','desc')
                ->groupBy('i.idingreso_inventario','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
                ->paginate(7);
                return view ('Ingresoinventario.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $personas=DB::table('afiliados')
        ->get();
        $usuarios=DB::table('users')
        ->get();
        $stocks = DB::table('stocks as art')
          ->select(DB::raw('CONCAT(art.id," - ", art.nombre) AS stocks'),'art.id','art.cantidadDisponible')
          ->groupBy('stocks','art.id','art.cantidadDisponible')
          ->get();
        return view ("IngresoInventario.create",["personas"=>$personas,"usuarios"=>$usuarios,"stocks"=>$stocks]);
    }
    public function store (IngresoInventarioFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $ingreso=new IngresoInventario;
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
            $stock_id = $request->get('stock_id');
            $Precio= $request->get('Precio');
            $cantidad=$request->get('cantidad');
         
        
            $cont= 0;
            while ($cont < count($stock_id)){
                $detalle = new DetalleIngresoInventario(); 
                $detalle->idingreso_inventario=$ingreso->idingreso_inventario;
                $detalle->stock_id=$stock_id[$cont];
                $detalle->Precio=$Precio[$cont];
                $detalle->cantidad=$cantidad[$cont];
           
                $detalle->save();
                $cont=$cont+1;
                
            }
            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('IngresoInventario'); 
    }
    public function show ($id)
    {
        $ingresos=DB::table('ingreso_inventario as i')
        ->join('afiliados as p','i.idproveedor','=','p.id')
        ->join('users as u','i.idusuario','=','u.id')
        ->join('detalle_ingreso_inventario as di','i.idingreso_inventario','=','di.idingreso_inventario')
        ->select('i.idingreso_inventario','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
        ->where('i.idingreso_inventario','=',$id)
        ->groupBy('i.idingreso_inventario','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
        ->first();
        $detalles=DB::table('detalle_ingreso_inventario as d')
            ->join ('stocks as a','d.stock_id','=','a.id')
            ->select('a.producto_id as stocks','d.Precio','d.cantidad','a.cantidadDisponible')
            ->where('d.idingreso_inventario','=',$id)
            ->get(); 
        return view("IngresoInventario.show",["ingresos"=>$ingresos,"detalles"=>$detalles]);
    }
    public function edit($id)
{
    $ingresos=DB::table('ingreso_inventario as i')
    ->join('afiliados as p','i.idproveedor','=','p.id')
    ->join('users as u','i.idusuario','=','u.id')
    ->join('detalle_ingreso_inventario as di','i.idingreso_inventario','=','di.idingreso_inventario')
    ->select('i.idingreso_inventario','i.fecha_hora','p.Nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
    ->where('i.idingreso_inventario','=',$id)
    ->groupBy('i.idingreso_inventario','i.fecha_hora','p.nombre','p.apellido1','p.apellido2','u.name','i.tipo_comprobante', 'i.serie_comprobante','i.tipo_pago','i.total_venta','i.estado')
    ->first();
    $detalles=DB::table('detalle_ingreso_inventario as d')
        ->join ('stocks as a','d.stock_id','=','a.id')
        ->select('a.producto_id as stocks','d.Precio','d.cantidad','a.cantidadDisponible')
        ->where('d.idingreso_inventario','=',$id)
        ->get(); 
    
     $ingresos = PDF::loadView("IngresoInventario.edit",["ingresos"=>$ingresos,"detalles"=>$detalles]);
     return $ingresos->download('IngresoInventario.edit');
  
}
    public function destroy ($id)
    {
        $ingresoC=IngresoInventario::findOrFail($id);
        $ingresoC->Estado='Cancelado';
        $ingresoC->update();
        return Redirect::to('IngresoInventario');
    }
}
