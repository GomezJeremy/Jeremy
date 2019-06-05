@extends ('layouts.principal1')
@section ('contenido')
 <div class="row">
 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
   <div class="form-group">
    <label>Numero de ingreso</label>
    <p>{{$ingresos->idingreso}}</p>
    </select>
   </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
   <div class="form-group">
    <label for="proveedor">Afiliado</label>
     <p>{{$ingresos->Nombre}} {{$ingresos->apellido1}} {{$ingresos->apellido2}}</p>
    </select>
   </div>
  </div>
 
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
   <div class="form-group">
    <label for="proveedor">Usuario</label>
     <p>{{$ingresos->name}}</p>
    </select>
   </div>
  </div>
   
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
   <div class="form-group">
    <label>Tipo Comprobante</label>
    <p>{{$ingresos->tipo_comprobante}}</p>
    </select>
   </div>
  </div>
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
   <div class="form-group">
    <label for="serie_comprobante">Serie Comprobante</label>
    <p>{{$ingresos->serie_comprobante}}</p>
   </div>
  </div>
 <div class="row">
  <div class="panel panel-primary">
   <div class="panel-body">
    

    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
      <thead style="background-color: #A9D0F5">
       <th>Producto</th>
       <th>Peso Bruto de la miel</th>
       <th>Precio</th>
       <th></th>
       <th>Subtotal</th>
      </thead>
      <tfoot>
       
       <th></th>
       <th></th>
       <th></th>
       <th></th>
       <th><h4 id="total">{{$ingresos->total_venta}}</h4></th>
      </tfoot>
      <tbody>

       @foreach($detalles as $det)
      <tr>
       <td>{{$det->producto}} </td>
       <td>{{$det->PesoBruto}} </td>
       <td>{{$det->Precio}} </td>
       <td> </td> 
       <td>{{$det->Precio}} </td> 
     </td>
      @endforeach
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div> 
 @endsection