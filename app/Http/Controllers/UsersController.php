<?php

namespace App\Http\Controllers;

use App\User;
use App\Genero;
use App\Role;
<<<<<<< HEAD
use App\Estado;
=======


>>>>>>> Caro
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioFormRequest;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       
       if($request){
        $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
        $users= User::where('name','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);

            $generos = Genero::all();
          
            $roles = Role::get()->pluck('name', 'name');
            return view('users.index', compact('users', 'roles', 'generos'), ['users'=>$users,"searchText"=>$query]);
    }
        
        return view('users.index', compact('users', 'roles','generos'));
    }


    
    public function addUser(Request $request){
        $rules = array(
    
          'id' => 'required',
          'name' => 'required',
          'email' => 'required',
          'password' => 'required',
          
        
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
      else {   
        $users = new User;
        $users->id= $request->id;
        $users->name = $request->name;
        $users->Apellido1 = $request->Apellido1;
        $users->Apellido2 = $request->Apellido2;
        $users->Telefono = $request->Telefono;
        $users->Direccion = $request->Direccion;
        $users->Fecha_Ingreso = $request->Fecha_Ingreso;
        $users->Genero_Id = $request->Genero_Id;
        $users->estado_id = $request->estado_id;
      
        $users->save();
        return response()->json($users);
      }
    }
    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function editUser(request $request){
        $rules = array(
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      
      else {
        $users = User::find ($request->id);
      
        $users->id= $request->id;
        $users->name = $request->name;
        $users->Apellido1 = $request->Apellido1;
        $users->Apellido2 = $request->Apellido2;
        $users->Telefono = $request->Telefono;
        $users->Direccion = $request->Direccion;
        $users->Fecha_Ingreso = $request->Fecha_Ingreso;
        $users->Genero_Id = $request->Genero_Id;
        $users->estado_id = $request->estado_id;
        $users->save();
      return response()->json($users);
      }
      }


    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}