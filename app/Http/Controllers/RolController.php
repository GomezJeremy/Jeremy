<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Rol;
use Illuminate\Http\Redirect;
use App\Http\Requests\RolFormRequest;
use DB;



class RolController extends Controller
{


public function __construct()
{

}


//INDEEEEEEEEEEEEX/
public function index(Request $request)
{
    if($request){
        $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
  $rol = Rol::paginate(10);
  return view('Rol.index',compact('rol'), ['rol'=>$rol,"searchText"=>$query]);        
}
}

////////////////////////////////////////////////////////NUEVO

public function addRol(Request $request){
    $rules = array(
      'descripcion' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $rol = new Rol;
    $rol->descripcion = $request->descripcion;
    $rol->save();
    return response()->json($rol)->with('message');
  }
}

public function editRol(request $request){
  $rules = array(
    'descripcion' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {
$rol = Rol::find ($request->id);
$rol->descripcion = $request->descripcion;
$rol->save();
return response()->json($rol);
}
}

public function deleteRol(request $request){
  
  $rol = Rol::find ($request->id);
  $rol->delete();
  return response()->json();
}
}   //
