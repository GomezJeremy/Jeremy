<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\RecepcionMateriaPrima;
use Illuminate\Http\Redirect;
use App\Http\Requests\RecepcionMateriaPrimaFormRequest;
use DB;
use App\Afiliado;
use App\User;
use App\TipoEntrega;
use App\Estanon;




class RecepcionMateriaPrimaController extends Controller
{


public function __construct()
{

}


//INDEEEEEEEEEEEEX/
public function index(Request $request){
if($request){
  $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
  $recepcion = RecepcionMateriaPrima::paginate(10);
      $afiliado = Afiliado::all();
      $estanon = Estanon::all();
      $recepciones = DB::table('recepcion_materia_primas')
      ->select('id','afiliado_id')
      ->orderBy('created_at','DESC')
      ->take(1)
      ->get();
      $user = User::all();
      $tipoEntrega = TipoEntrega::all();
  return view('RecepcionMateriaPrima.index', compact('afiliado','recepciones','estanon','user','tipoEntrega','recepcion'), ['recepcion'=>$recepcion,"searchText"=>$query]);
}}

////////////////////////////////////////////////////////NUEVO

public function addRecepcionMateriaPrima(Request $request){
    $rules = array(
    
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $recepcion = new RecepcionMateriaPrima;
 
        $recepcion->fecha= $request->fecha;
        $recepcion->pesoBruto = $request->pesoBruto;
        $recepcion->pesoNeto = $request->discount;
        $recepcion->numero_muestras = $request->numero_muestras;
        $recepcion->afiliado_id = $request->afiliado_id;
        $recepcion->user_id = $request->user_id;
        $recepcion->tipoEntrega_id = $request->tipoEntrega_id;
        $recepcion->observacion = $request->observacion;
    $recepcion->save();
    $ruless = array(
      ['success' => 'Se ha creado una Recepción de Materia Prima correctamente']
    );
   
    return response()->json($recepcion);
   
  }
}

public function addRecepcion(Request $request){
  $rules = array(
   
    'Recepcion_id' => 'required',
    'Estanon_id' => 'required',
    'Fecha' => 'required',
    
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
  
 
  $recepcionEst = new RecepcionEstanon;
  $recepcionEst->Recepcion_id = $request->Recepcion_id;
  $recepcionEst->Estanon_id = $request->Estanon_id;
  $recepcionEst->Fecha = $request->Fecha;
  $recepcionEst->save();
  return back()->with('flash','Recepcion Guardada');
  return response()->json($recepcionEst);
}
}

public function editRecepcion(request $request){
  $rules = array(
   
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {
  $recepcion =RecepcionMateriaPrima::find ($request->id);
  $recepcion->fecha= $request->fecha;
  $recepcion->pesoBruto = $request->pesoBruto;
  $recepcion->pesoNeto = $request->discount;
  $recepcion->numero_muestras = $request->numero_muestras;
  $recepcion->afiliado_id = $request->afiliado_id;
  $recepcion->user_id = $request->user_id;
  $recepcion->tipoEntrega_id = $request->tipoEntrega_id;
  $recepcion->observacion = $request->observacion;
  $recepcion->save();
return response()->json($recepcion);
}
}

public function deleteRecepcionMateriaPrima(request $request){
  
  $recepcion= RecepcionMateriaPrima::find ($request->id);
  $recepcion->delete();

}
}   //
