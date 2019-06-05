<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText')); //valida si la peticion trae el campo de busqueda 
            $product = Product::paginate(10);
                return view('Producto.index',compact('Product'), ['product'=>$product,"searchText"=>$query]);        
        }
    }

   
    public function addProducto(Request $request){
    $rules = array(
      'nombre' => 'required',
      'precioUnitario' => 'required',

    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $product = new Product;
    $product->nombre = $request->nombre;
    $product->precioUnitario = $request->precioUnitario;
    $product->save();
    return response()->json($product)->with('message');
  }
}

public function editProducto(request $request){
  $rules = array(
    'nombre' => 'required',
    'precioUnitario' => 'required',
  );
$validator = Validator::make ( Input::all(), $rules);
if ($validator->fails())
return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

else {
$product = Product::find ($request->id);
$product->nombre = $request->nombre;
$product->precioUnitario = $request->precioUnitario;
$product->save();
return response()->json($product);
}
}

public function deleteProducto(request $request){
  
  $product = Product::find ($request->id);
  $product->delete();
  return response()->json();
}
}   //
