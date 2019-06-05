<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\RecepcionEstanon;
use App\Estanon;
use App\RecepcionMateriaPrima;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use App\Http\Requests\ApiariosFormRequest;
class RecepcionEstanonController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));  //valida si la peticion trae el campo de busqueda 
        $recepcionEst = RecepcionEstanon::with('RecepcionMateriaPrima', 'Estanon')
            ->where('Fecha','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
           $recepciones = RecepcionMateriaPrima::all();
           $estanon = Estanon::all();
           
        return view('RecepEstanon.index', compact('cera', 'recepciones', 'estanon'), ['recepcionEst'=>$recepcionEst,"searchText"=>$query]);
        }
        
    }
    ////////////////////////////////////////////////////////NUEVO
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
    return response()->json(['success' => 'Se ha creado una Recepción de Estañón correctamente']);
   
  
  
  }
}

public function editRecepcion(request $request){
  $rules = array(
   
    'Recepcion_id' => 'required',
    'Estanon_id' => 'required',
    'Fecha' => 'required',
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
  

    $recepcionEst =  RecepcionEstanon::find($request->id);
    $recepcionEst->Recepcion_id = $request->Recepcion_id;
    $recepcionEst->Estanon = $request->Estanon;
    $recepcionEst->Fecha = $request->Fecha;
    $recepcionEst->save();
    return response()->json($recepcionEst);
}
}
public function deleteApiario(request $request){
  
   
    $recepcionEst =  RecepcionEstanon::find($request->id);
  $recepcionEst->delete();
  return response()->json($recepcionEst);
}
}
