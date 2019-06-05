@extends ('layouts.principalUser')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  USUARIO ELIMINADO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE USUARIOS</h1>
  	
<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->


@include('users.search') 





<div class="row">
    <div class="table table-responsive">
    <table class="table  table-bordered table-dark" id="table">
    <tr>
			<th width="150px" >Cédula</th>
  		<th> <div class="size2">Usuario</th>
  		<th>Correo</th>
      <th>Roles</th>
      <th>Estado</th>
      <th>Acciones</th>
      </tr>
       
          {{ csrf_field() }}
                @foreach ($users as $value)
                     <tr data-entry-id="{{ $value->id }}">
                               
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td> <span class="label label-info label-many label label-success">
                                {{$value->roles->pluck('name')->implode(' , ')}}</span>
                                 
                                </td>
                                <td>
                                @if($value->status)
                            <span class="label label-primary"><?php  if ($value->status=='1') {
	                     		# code...
	                 		print("Activo");
	                         	} 
	                     	  ?> </span>
                        @else
                            <span class="label label-danger"><?php  if ($value->status=='0') {
		                      	# code...
	                       		print("Inactivo");
	                         	} 
	                     	  ?> </span>
                        @endif</td>

                       
                                <td>
            <a href="#" class="show-modal btn btn-info btn-sm" 
            data-id="{{$value->id}}"
            data-name="{{$value->name}}"
            data-email="{{$value->email}}">
              <i class="fa fa-eye"></i>
            </a>
            <a class= "btn btn-warning btn-sm" href="{{ route('users.edit', [$value->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.users.index.edit') }}"
   ><i class="glyphicon glyphicon-pencil"></i> </a>

   {{--@if(!$value->hasRole('administrator'))--}}
   <a href="#" class=" delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-Descripcion="{{$value->name}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
            
            {{--@endif--}}
          </td>
        </tr>
      @endforeach
    </table>
    
  </div>
  {{$users->links()}}
</div>

        
{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">ID :</label>
                      <b id="i2"/>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre :</label>
                      
                      <b id="n2"/>
                    </div>
										<div class="form-group">
                      <label for="">Correo :</label>
                      <b id="em"/>
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
        <h4 class="modal-descripcion"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">
          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="iii" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="name">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nnn" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="email">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="emm" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="password">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="passs" >
            </div>
          </div>
         
          <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="roles">
                      
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="rlss" name="roles[]" class="select2" multiple="multiple" style="width: 100%" autocomplete="off">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

       
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          ¿Está seguro de eliminar este usuario <span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>
      </div>
    </div>
  </div>
</div>
-->
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
    </script>