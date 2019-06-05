<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Cera;
use App\RecepcionMateriaPrima;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use App\Http\Requests\ApiariosFormRequest;
class CeraController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));  //valida si la peticion trae el campo de busqueda 
        $cera = Cera::with('RecepcionMateriaPrima')
            ->where('Descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
           $recepciones = RecepcionMateriaPrima::all();
           
        return view('Cera.index', compact('cera', 'recepciones'), ['cera'=>$cera,"searchText"=>$query]);
        }
        
    }
    ////////////////////////////////////////////////////////NUEVO


    public function agregar($id)
    {
         //valida si la peticion trae el campo de busqueda 
        $recepciones = RecepcionMateriaPrima::where('Fecha','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
        
           return response()->json($recepciones);
     
        
    }
public function addCera(Request $request){
    $rules = array(
      'Descripcion' => 'required',
      'Recepcion_id' => 'required',
      'PesoBruto' => 'required',
      'PesoNeto' => 'required',
      'Fecha' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
  else {
    
   
    $cera = new Cera;
    $cera->Descripcion = $request->Descripcion;
    $cera->Recepcion_id = $request->Recepcion_id;
    $cera->PesoBruto = $request->PesoBruto;
    $cera->PesoNeto = $request->PesoNeto;
    $cera->Fecha = $request->Fecha;
  
    $cera->save();
    return response()->json(['success' => 'Se ha creado una Recepción de Cera correctamente']);
   
  
  
  }
}

public function editCera(request $request){
  $rules = array(
    'Descripcion' => 'required',
      'Recepcion_id' => 'required',
      'PesoBruto' => 'required',
      'PesoNeto' => 'required',
      'Fecha' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
  

   $cera =  Cera::find($request->id);
    $cera->Descripcion = $request->Descripcion;
    $cera->Recepcion_id = $request->Recepcion_id;
    $cera->PesoBruto = $request->PesoBruto;
    $cera->PesoNeto = $request->PesoNeto;
    $cera->Fecha = $request->Fecha;
$cera->save();
return response()->json($cera);
}
}
public function deleteCera(request $request){
  
  $cera = Cera::find ($request->id);
  $cera->delete();

}
}
