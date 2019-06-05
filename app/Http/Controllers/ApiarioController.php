<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use App\Apiario;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.
use App\Http\Requests\ApiariosFormRequest;
use Alert;
class ApiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));  //valida si la peticion trae el campo de busqueda 
        $api = Apiario::with('Ubicacion')
            ->where('Descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
           $ubicaciones = Ubicacion::all();

           
        return view('Apiario.index', compact('api', 'ubicaciones'), ['api'=>$api,"searchText"=>$query]);
        }
        
    }
    ////////////////////////////////////////////////////////NUEVO
public function addApiario(Request $request){
   
  $validator = Validator::make($request->all(), [
      
      'Descripcion' => 'required',
      'cantidad' => 'required',
      'ubicacion_id' => 'required'
      ]); 
      
  if ($validator->fails())
  return Response::json(['errors' => $error->errors()->all()]);
  else {
    
    $ubicacion_id = input::get('ubicacion_id');
    $api = new Apiario;
    $api->Descripcion = $request->Descripcion;
    $api->cantidad = $request->cantidad;
    $api->ubicacion_id = $request->ubicacion_id;
  
    $api->save();
    
   
    return response()->json(['success' => 'Se ha creado un Apiario correctamente']);
 
   
  
  
  }
}
public function find(Request $request)
    {
        $term = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }
        $tags = Ubicacion::search($term)->limit(5)->get();
        $formatted_tags = [];
        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }
        return \Response::json($formatted_tags);
    }
public function editApiario(request $request){
  $rules = array(
    'Descripcion' => 'required',
    'cantidad' => 'required',
      'ubicacion_id' => 'required'
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else {
  $ubicaciones = Ubicacion::all();
$api = Apiario::find($request->id);
$api->Descripcion = $request->Descripcion;
$api->cantidad = $request->cantidad;
$api->ubicacion_id = $request->ubicacion_id;
$api->save();
return response()->json($api);
}
}
public function deleteApiario(request $request){
  
  $api = Apiario::find ($request->id);
  $api->delete();
 

  

}
}
