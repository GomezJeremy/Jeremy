@extends ('layouts.pricipalEstanon')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  ESTAÑON CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->
@section ('contenido')

		<h1 class="text-center">Listado de Estañones</h1>
	

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->

		@include('Estanon.search') 



<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Descripción</th>
					<th>Peso</th>
					<th> <a href="#"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
			</th>

				</thead>
               @foreach ($estanon as $value)
				<tr>
					<td>{{ $value->id}}</td>
					<td>{{ $value->Descripcion}}</td>
					<td>{{ $value->Peso}}</td>
				

					<td>
					<a href="#" class="show-modal btn btn-info btn-sm"
					 data-id="{{$value->id}}" 
					 data-Descripcion="{{$value->Descripcion}}"
					 data-Peso="{{$value->Peso}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" 
						data-id="{{$value->id}}"
					 data-Descripcion="{{$value->Descripcion}}"
					 data-Descripcion="{{$value->Descripcion}}"
					 data-Peso="{{$value->Peso}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm"
						 data-id="{{$value->id}}"
						  data-title="{{$value->Descripcion}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>

          </td>
				</tr>
			
				@endforeach
			</table>
		</div>
		{{$estanon->render()}}
	</div>
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion text-center"></h4>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      </div>
      <div class="modal-body">
      <span id="form_result"></span>
        <form class="form-horizontal" role="form">

        <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="Descripcion" name="Descripcion" placeholder="Descripción" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>

                <div class="form-group row add">
                <div class="col-md-9" >
           <input type="text" class="form-control has-feedback-left" id="Peso" name="Peso" placeholder="Peso" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
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
                    <span id="form_result"></span>
                    <div class="form-group">
                      <label for="">Código :</label>
                      <b id="i3"/>
                    </div>
                    <div class="form-group">
                      <label for="">Descripción :</label>
                      
                      <b id="d3"/>
                    </div>
										<div class="form-group">
                      <label for="">Peso :</label>
                      <b id="pe"/>
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
           <input type="text" class="form-control has-feedback-left" id="ids" disabled>
              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>
          
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="des" >
              <span class="fa fa-archive form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>
          
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="pes" >
              <span class="fa fa-archive form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>

  
        </form>
        {{-- Form Delete Post --}}
        <div class="deleteContent">
        ¿Está seguro que desea eliminar este Estañón<span class="descripcion"></span>?
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