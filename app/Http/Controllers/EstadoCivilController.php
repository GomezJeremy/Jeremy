<?php

namespace App\Http\Controllers;

use App\Estado_Civil;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Requests\Estado_CivilFormRequest;
use DB;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $estado_Civil=DB::table('estado_civils')->where('descripcion','LIKE','%'.$query.'%')
            ->orderby('id','desc')
            ->paginate(7);
            return view('EstadoCivil.index',["estado_Civil"=>$estado_Civil,"searchText"=>$query]);
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("EstadoCivil.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *///GUARDAR
    public function store(Estado_CivilFormRequest $request)
    {
        //
        $estado_Civil= new Estado_Civil;
        $estado_Civil->descripcion=$request->get('descripcion');
        $estado_Civil->save();
        return redirect('EstadoCivil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado_Civil  $estado_Civil
     * @return \Illuminate\Http\Response
     *
     *///muestra
    public function show(EstadoCivil $estado_Civil)
    {
        //
        return view ("EstadoCivil.show",["estado_Civil"=>Estado_Civil::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado_Civil  $estado_Civil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view ("EstadoCivil.edit",["estado_Civil"=>Estado_Civil::findOrFail($id)]);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado_Civil  $estado_Civil
     * @return \Illuminate\Http\Response
     */
    public function update(Estado_CivilFormRequest $request, $id)
    {
        //
        $estado_Civil=Estado_Civil::findOrFail($id);
        $estado_Civil->descripcion=$request->get('descripcion');
        $estado_Civil->update();
        return redirect('EstadoCivil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado_Civil  $estado_Civil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    $estado_Civil=Estado_Civil::findOrFail($id);
    $estado_Civil->delete();
    return redirect('EstadoCivil');
    }
}
