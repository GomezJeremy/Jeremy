@extends ('layouts.principalAfiliadoApiario') 
<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
AFILIADO CON SUS APIARIO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 >LISTADO DE  AFILIADOS CON SU APIARIO</h1>

<!-- Saltos de linea-->
<br>
<br>
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->
<div class="absolute3">

		
</div>	

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Afiliado</th>
        <th>Apiario</th>
	
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($afiliadoapiario as $value)
        <tr class="afiliadoapiario{{$value->id}}">
          <td>{{ $no++ }}</td>
		  <td>{{$value-> afiliado->id}} - {{$value-> afiliado-> Nombre}} {{$value->afiliado->apellido1}} {{$value->afiliado->apellido2}}</td>
          <td>{{$value-> apiario->id}} - {{$value-> apiario-> Descripcion }}</td>
          
          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-afiliado_id=" {{$value->afiliado_id}} - {{$value->afiliado->Nombre}} {{$value->afiliado->apellido1}} {{$value->afiliado->apellido2}}"data-apiario_id="{{$value->apiario_id}} - {{$value->apiario->Descripcion}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-afiliado_id="{{$value->afiliado_id}}" data-apiario_id="{{$value->apiario_id}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-afiliado_id="{{$value->afiliado_id}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$afiliadoapiario->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion  text-center"></h4>
      </div>
      <div class="modal-body">
      <span id="form_result"></span>
        <form class="form-horizontal" role="form">
        <div class="form-group row add">
        
        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <label for="afiliados">Afiliado</label>
    <select name="afiliado_id" id="afiliado_id" class="form-control  selectpicker " data-live-search="true">
     @foreach($afiliados as $persona  )
     <option value="{{$persona->id}}">{{$persona->id}} - {{$persona->Nombre}} {{$persona->apellido1}} {{$persona->apellido2}}</option>
     @endforeach
    </select>
    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
   </div>
  </div>
  
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <label for="apiarios">Apiario</label>
    <select name="apiario_id" id="apiario_id" class="form-control selectpicker" data-live-search="true">
     @foreach($apiarios as $api)
     <option value="{{$api->id}}">  {{  $api->Descripcion}}</option>
     @endforeach
    </select>
    <span class="fa fa-archive form-control-feedback right" aria-hidden="true"></span>
   </div>
 
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Guardar
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Cerrar
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
          <h4 class="modal-title text-center"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">Código :</label>
                      <b id="idA"/>
                    </div>
                    <div class="form-group">
                    
                      <label for="">Afiliado:</label>
                      <b id="af"/>
                    </div>
					<div class="form-group">
                      <label for="">Apiario:</label>
                      <b id="ap"/>
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

          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="idAA" disabled>
            </div>
          </div>
         <div class="form-group">
  
           <label class="control-label col-sm-2" for="afiliado_id">Afiliado</label>
           <div class="col-sm-10">
            <select name="name" class="form-control selectpicker"  id="afi"  data-live-search="true">
                @foreach($afiliados as $persona => $value  )
                 <option  value="{{$value->id}}">{{$value->id}} - {{$value->Nombre}} {{$value->apellido1}} {{$value->apellido2}}</option>
                 @endforeach
                
            </select>
           </div>
          </div>
		  <div class="form-group">
            <label class="control-label col-sm-2"for="apiario_id">Apiario</label>
            <div class="col-sm-10">
            <select type="name" class="form-control selectpicker" id="api" data-live-search="true">
            @foreach($apiarios as $api)
             <option value="{{$api->id}}">{{$api->Descripcion}}</option>
           @endforeach
            </select>
            </div>
          </div>
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
        ¿Está seguro que desea eliminar este afiliado con su apiario <span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="fa fa-times"></span>Cerrar
        </button>
      </div>
    </div>
  </div>
</div>

@endsection