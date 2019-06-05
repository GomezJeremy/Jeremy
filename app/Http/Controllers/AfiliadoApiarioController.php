<?php

namespace App\Http\Controllers;
use App\Afiliado;
use App\Apiario;
use Validator;
use Response;
use App\AfiliadoApiario;
use Illuminate\Http\Request;
use App\Http\Requests\AfiliadoApiariosFormRequest;
use Illuminate\Support\Facades\Input;  //MUYR IMPORTANTE , SIN ESTO NO GUARDA.

class AfiliadoApiarioController extends Controller
{

    public function __construct()
    {
    
    }
    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        { 
         
          $afiliadoapiario = AfiliadoApiario::paginate(10);
          $afiliados=Afiliado::all();
          $apiarios=Apiario::all();
          return view('AfiliadoApiario.index',compact('afiliadoapiario','afiliados','apiarios'));      
         
        }
    
        ////////////////////////////////////////////////////////NUEVO
    
    public function addAfiliadoApiario(Request $request){
      $rules = array(
        'afiliado_id' => 'required',
        'apiario_id' => 'required'
      );
        $validator = Validator::make (Input::all(),$rules);
        if ($validator->fails())
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
      else {
        $afiliadoapiario = new AfiliadoApiario;
        $afiliadoapiario->afiliado_id = $request->afiliado_id;
        $afiliadoapiario->apiario_id = $request->apiario_id;
        $afiliadoapiario->save();
        return response()->json(['success' => 'Se ha creado un Afiliado con su Apiario correctamente']);
      }
    }
    
    
 public function editAfiliadoApiario(request $request){
    $rules = array(
      'afiliado_id' => 'required',
      'apiario_id' => 'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
  
  else {
  $afiliadoapiario = AfiliadoApiario::find ($request->id);
  $afiliadoapiario->afiliado_id = $request->afiliado_id;
  $afiliadoapiario->apiario_id = $request->apiario_id;
  $afiliadoapiario->save();
  return response()->json($afiliadoapiario);
  }
  }
  
  public function deleteAfiliadoApiario(request $request){
    
    $afiliadoapiario = AfiliadoApiario::find ($request->id);
    $afiliadoapiario->delete();
    return response()->json();
  }
  }   //