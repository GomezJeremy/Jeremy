<?php
namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Ubicacion;
use Illuminate\Http\Redirect;
use App\Http\Requests\UbicacionFormRequest;
use DB;
use App\Estanon;
class EstanonController extends Controller
{
   
public function __construct()
{
}
//INDEEEEEEEEEEEEX/
public function index(Request $request)
{
  if($request){
    $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
  $estanon = Estanon::paginate(10);
  return view('Estanon.index',compact('estanon'), ['estanon'=>$estanon,"searchText"=>$query]);       
}
}
////////////////////////////////////////////////////////NUEVO
public function addEstanon(Request $request){
    $rules = array(
      'Descripcion' => 'required',
      'Peso' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
  else {
    $estanon = new Estanon;
    $estanon->Descripcion = $request->Descripcion;
    $estanon->Peso = $request->Peso;
    $estanon->save();
    return response()->json(['success' => 'Se ha creado un Estañón correctamente']);
  }
}
 public function editEstanon(request $request){
  $rules = array(
    'Descripcion' => 'required',
    'Peso' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
   $estanon = new Estanon;
    $estanon->Descripcion = $request->Descripcion;
    $estanon->Peso = $request->Peso;
$estanon->save();
return response()->json($estanon);
}
}
public function deleteEstanon(request $request){
  
  $estanon = Estanon::find ($request->id);
  $estanon->delete();
  
}
}  