@extends ('layouts.principalStock')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addApiario')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  APIARIO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">INVENTARIO</h1>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->



<!--Esta clase nos permite posicionar el buscador  -->

		@include('Stock.search') 


<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Nombre</th>
          <th>Cantidad</th>
          <th>Precio</th>
					<th>Estañon</th>
					<th><a href="#"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i></th>
				</thead>
        {{ csrf_field() }}
           <?php  $no=1; ?>
               @foreach ($sto as $value)
					<tr class="sto{$value->id}}">
          <td>{{ $no++ }}</td>
					<td>{{ $value->nombre}}</td>
          <td>{{ $value->cantidadDisponible}}</td>
          <td>{{ $value->precioUnitario}}</td>
            <td><span class="label label-success">{{ $value->RecepcionEstanon->id}}</span></td>
           
					<td>
					<a href="#" class="show-modal btn btn-info btn-sm"
					 data-id="{{$value->id}}" 
					 data-nombre="{{$value->nombre}}"
           data-cantidadDisponible="{{$value->cantidadDisponible}}"
           data-precioUnitario="{{$value->precioUnitario}}"
					 data-estanon_recepcions_id="{{$value->estanon_recepcions_id}} - {{$value->recepcionEstanon->id}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" 
						data-id="{{$value->id}}"
					 data-nombre="{{$value->nombre}}"
           data-cantidadDisponible="{{$value->cantidadDisponible}}"
           data-precioUnitario="{{$value->precioUnitario}}"
					 data-estanon_recepcions_id="{{$value->estanon_recepcions_id}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm"
						 data-id="{{$value->id}}"
						  data-title="{{$value->nombre}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
            
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$sto->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion text-center"></h4>
      </div>
      <div class="modal-body">
      <span id="form_result"></span>
        <form class="form-horizontal" role="form">

        <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="nom" name="nombre" placeholder="Nombre" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>

                <div class="form-group row add">
                <div class="col-md-9" >
           <input type="text" class="form-control has-feedback-left" id="cantidadDisponible" name="cantidadDisponible" placeholder="cantidad" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
               </div>
                <div class="form-group row add">
                <div class="col-md-9" >
           <input type="text" class="form-control has-feedback-left" id="precioUnitario" name="precioUnitario" placeholder="precioUnitario" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
               </div>

                <div class="form-group row add">
                <div class="col-md-9  form-group has-feedback">
        <select name="estanon_recepcions_id" class="form-control has-feedback-left" id="estanon_recepcions_id">
         <option value="">-- Seleccione recepción-estañon --</option>
         @foreach ($recepcionEstanon as $recepcionEstanones)
          <option value="{{ $recepcionEstanones->id }}">{{$recepcionEstanones->id}}</option>
         @endforeach
        </select>
        <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
        </div>
        </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="fa fa-save"></span> Guardar 
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="fa fa-times"></span> Cerrar
            </button>
          </div>
    </div>
  </div>
</div></div>
{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">
          <i class="glyphicon glyphicon-info-sign"></i></h4>
                  </div>
                    <div class="modal-body">
                  
                    <div class="form-group">
                      <label for="">Código :</label>
                      <b id="i"/>
                    </div>
                    <div class="form-group">
                      <label for="">Descripción :</label>
                      
                      <b id="nbre"/>
                    </div>
										<div class="form-group">
                      <label for="">Cantidad :</label>
                      <b id="cdpn"/>
                    </div>
                    	<div class="form-group">
                      <label for="">Precio :</label>
                      <b id="prun"/>
                    </div>
										<div class="form-group">
                   
                      <label for="">Recepcion-Estañon :</label>
                      <span class="label label-success"><b id="esre"/>
                    </div>
                    </div>
                    </div>
                  </div>
</div>
{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion text-center"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">

        <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="lol1" disabled>
              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>
          
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="cri" >
              <span class="fa fa-archive form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>
          
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="tidad" >
              <span class="fa fa-archive form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>
                
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="uni" >
              <span class="fa fa-archive form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>

                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
        <select name="name" class="form-control has-feedback-left" id="lol5">
        <option value="">-- Seleccione recepción-estañon --</option>
         @foreach ($recepcionEstanon as $recepcionEstanones)
          <option value="{{ $recepcionEstanones->id }}">{{$recepcionEstanones->id}}</option>
         @endforeach
        </select>
					  <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
</div>
</div>
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
        ¿Esta seguro de eliminar? <span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
      <button class="btn btn-warning" type="submit" id="add">
              <span class="fa fa-pencil"></span> Editar 
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="fa fa-times"></span> Cerrar
            </button>
            myApp.showPleaseWait();
      </div>
    </div>
  </div>
</div>

<div class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
            <h1>Processing...</h1>
        </div>
        <div class="modal-body">
            <div class="progress progress-striped active">
                <div class="bar" style="width: 100%;"></div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
