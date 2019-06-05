@extends ('layouts.principal')
@section ('contenido')
 <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <h3>Nuevo Boleta de Inventario</h3>
   @if (count($errors)>0)
   <div class="alert alert-danger">

   <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <a href="{{ URL::previous() }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
   </div>
    <ul>
    @foreach ($errors->all() as $error)
     <li>{{$error}}</li>
    @endforeach
    </ul>
   </div>
   @endif
  </div>
 </div>
{!!Form::open(array('url'=>'IngresoInventario','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
 <div class="row">
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
   <div class="form-group">
    <label for="proveedor">Afiliado</label>
    <select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
     @foreach($personas as $persona)
     <option value="{{$persona->id}}">{{$persona->Nombre}} {{$persona->apellido1}} {{$persona->apellido2}}</option>
     @endforeach
    </select>
   </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
   <div class="form-group">
    <label for="usuario">Usuario</label>
    <select name="idusuario" id="idusuario" class="form-control selectpicker" data-live-search="true">
     @foreach($usuarios as $usuario)
     <option value="{{$usuario->id}}">{{$usuario->name}} </option>
     @endforeach
    </select>
   </div>
  </div>
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
   <div class="form-group">
    <label>Tipo Comprobante</label>
    <select name="tipo_comprobante" class="form-control">
     <option value="Boleta">Boleta</option>
     <option value="Factura">Factura</option>
     <option value="Ticket">Ticket</option>
    </select>
   </div>
  </div>
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
   <div class="form-group">
    <label for="serie_comprobante">Serie Comprobante</label>
    <input type="text" name="serie_comprobante" value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie Comprobante">
   </div>
  </div>
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
   <div class="form-group">
    <label>Tipo de pago</label>
    <select name="tipo_pago" class="form-control">
     <option value="en efectivo">En efectivo</option>
     <option value="Con tarjeta">Con tarjeta</option>
    </select>
   </div>
  </div>
  </div>

 <div class="row">
  <div class="panel panel-primary">
  <div class="table-responsive">
   <div class="panel-body">
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
     <div class="form-group">
  <label>Producto</label>
     <select name="pstock_id" class="form-control selectpicker" id="pstock_id" data-live-search="true">
       @foreach($stocks as $stock)
        <option value="{{$stock->id}}_{{$stock->cantidadDisponible}}">{{$stock->stocks}}</option>
       @endforeach
      </select>
     </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
     <div class="form-group">
      <label for="cantidadDisponible">cantidad Disponible</label>
      <input type="number"  disabled name="pcantidadDisponible" id="pcantidadDisponible" class="form-control" placeholder="cantidad Disponible">
     </div>
    </div>

    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
     <div class="form-group">
      <label for="Precio">Precio</label>
      <input type="number" name="pPrecio" id="pPrecio" class="form-control" placeholder="Precio">
     </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
     <div class="form-group">
      <label for="cantidad">Cantidad a utilizar en laminas</label>
      <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad a utilizar en laminas">
     </div>
    </div>
     
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
     <div class="form-group">
      <label></label>
      <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
     </div>
    </div>

    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
     <table id="detalles" class="table table-responsive table-striped table-bordered table-condensed table-hover">
      <thead style="background-color:	#9ddcf2">
       <th>Opciones</th>
       <th>Producto</th>
       <th>cantidad disponible</th>
       <th>Precio</th>
       <th>cantidad a utilizar en laminas</th>
       <th>Subtotal</th>
      </thead>
      <tfoot>
       <th>Total</th>
       <th></th>
       <th></th>
       <th></th>
       <th></th>

       <th><h4 id="total">₡/ . 0.00</h4> <input type="hidden" name="total_venta" 
       id="total_venta"></th>
      </tfoot>
      <tbody>
       
      </tbody>
     </table>
    </div>
   </div>
  </div>
  </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
   <div class="form-group">
    <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
    <button class="btn btn-primary" type="submit">Guardar</button>
             <button class="btn btn-danger" type="reset">Cancelar</button>
   </div>
  </div>
  <div class="absolute1">
     <div class="form-group">
      <a href="{{ URL::previous() }}">Regresar <i class="glyphicon glyphicon-arrow-left"></i></a>
     </div>
  </div>
 </div>
{!!Form::close()!!} 

@push ('scripts')
<script>
$(document).ready(function(){
    $('#bt_add').click(function(){
    agregar();
    });
  });
 var cont=0;
 total=0;
 subtotal=[];
 $("#guardar").hide();
 $("#pstock_id").change(mostrarValores);
 function mostrarValores()
 {
   datosProducto= document.getElementById('pstock_id').value.split('_');
   $("#pcantidadDisponible").val(datosProducto[1]);
 }
 function agregar(){
    datosProducto= document.getElementById('pstock_id').value.split('_');
    
    stock_id=datosProducto[0];
    stocks=$("#pstock_id option:selected").text();
    cantidadDisponible=$("#pcantidadDisponible").val();
    Precio=$("#pPrecio").val();
    cantidad=$("#pcantidad").val();
   

    if (stock_id!="" && cantidadDisponible>0 && Precio!="" && Precio>0 && cantidad!="")
    {
    
       subtotal[cont]=(Precio*cantidad);
       total=total+subtotal[cont];
       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="stock_id[]" value="'+stock_id+'">'+stocks+'</td><td><input type="number" name="cantidadDisponible[]" value="'+cantidadDisponible+'"></td><td><input type="number" name="Precio[]" value="'+Precio+'"></td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td>'+subtotal[cont]+'</td></tr>';
       cont++;
       limpiar();
       $('#total').html("$/ " + total);
       $('#total_venta').val(total);
       evaluar();
       $('#detalles').append(fila);
    }
    else
    {
      alert("Error al ingresar el detalle del ingreso, revise los datos del articulo")
    }
  }
 function limpiar(){
    $("#pPrecio").val("");
    $("#pcantidad").val("");
  }
  function evaluar()
  {
    if (total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
   }
 function eliminar(index){
  total=total-subtotal[index]; 
    $("#total").html("$/. " + total); 
    $('#total_venta').val(total);  
    $("#fila" + index).remove();
    evaluar();
 }
</script>
@endpush
@endsection