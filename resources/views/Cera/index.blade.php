@extends ('layouts.principalCera')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addCera')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  CERA CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE  CERA</h1>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->



<!--Esta clase nos permite posicionar el buscador  -->

    @include('Apiario.search') 
  
    


<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Recepción</th>
					<th>Peso Bruto</th>
                    <th>Peso Neto</th>
                    <th>Fecha</th>
                    <th>Observación</th>
					<th><a href="#"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i></th>
				</thead>
        {{ csrf_field() }}
           <?php  $no=1; ?>
               @foreach ($cera as $value)
					<tr class="api{$value->id}}">
          <td>{{ $no++ }}</td>
					<td>{{ $value->RecepcionMateriaPrima->id}} - {{ $value->RecepcionMateriaPrima->afiliado->Nombre}} {{ $value->RecepcionMateriaPrima->afiliado->apellido1}} {{ $value->RecepcionMateriaPrima->afiliado->apellido2}}</td>
            <td>{{ $value->PesoBruto}}</td>
            <td>{{ $value->PesoNeto}}</td>
            <td>{{ $value->Fecha}}</td>
            <td>{{ $value->Descripcion}}</td>
					<td>
					<a href="#" class="show-modal btn btn-info btn-sm"
					 data-id="{{$value->id}}" 
					 data-Descripcion="{{$value->Descripcion}}"
					 data-Recepcion_id="{{$value->Recepcion_id}}  - {{ $value->RecepcionMateriaPrima->afiliado->Nombre}} {{ $value->RecepcionMateriaPrima->afiliado->apellido1}} {{ $value->RecepcionMateriaPrima->afiliado->apellido2}}"
					 data-PesoBruto="{{$value->PesoBruto}}"
                     data-PesoNeto="{{$value->PesoNeto}}"
                     data-Fecha="{{$value->Fecha}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" 
						data-id="{{$value->id}}"
					 data-Descripcion="{{$value->Descripcion}}"
                     data-Recepcion_id="{{$value->Recepcion_id}}"
					 data-PesoBruto="{{$value->PesoBruto}}"
                     data-PesoNeto="{{$value->PesoNeto}}"
                     data-Fecha="{{$value->Fecha}}">
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
  {{$cera->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion"></h4>
      </div>
      <div class="modal-body">
      <span id="form_result"></span>
        <form class="form-horizontal" role="form">

       
              
                <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="number" class="form-control" id="discount" name="PesoBruto"
              placeholder="Peso Bruto" required>
              <p class="No ingreso el Peso Bruto"></p>
              <span class="fa fa-plus form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>
             

              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="text" class="form-control" id="PesoNeto" name="PesoNeto"
             placeholder="Peso Neto" required>
              <p class="No ingreso el Peso Neto"></p>
              <span class="fa fa-minus-circle form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="date" class="form-control has-feedback-right" id="Fecha" name="Fecha" required>
              <p class="No Ingreso la Fecha"></p>
              <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    <select name="Recepcion_id" id="Recepcion_id" class="form-control  selectpicker " data-live-search="true">
     @foreach($recepciones as $recep  )
     <option value="{{$recep->id}}">{{$recep->id}} - {{$recep->afiliado->Nombre}} {{$recep->afiliado->apellido1}} {{$recep->afiliado->apellido2}}</option>
     @endforeach
    </select>
    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
   </div>
 
  
   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="Descripcion" name="Descripcion" placeholder="Obersevación" required>
            <p class="No Ingresó la Observación"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
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
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">ID :</label>
                      <b id="i2"/>
                    </div>
                    <div class="form-group">
                      <label for="">Observación :</label>
                      
                      <b id="d2"/>
                    </div>
										<div class="form-group">
                      <label for="">Recepción :</label>
                      <b id="ca2"/>
                    </div>
										<div class="form-group">
                   
                      <label for="">Peso Bruto :</label>
                      <b id="ub2"/>
                    </div>
                    <div class="form-group">
                   
                   <label for="">Peso Neto :</label>
                   <b id="pen"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Fecha :</label>
                   <b id="ech"/>
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
              <input type="text" class="form-control" id="ids" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="Descripcion">Observación</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="cri">
            </div>
          </div>

					<div class="form-group">
            <label class="control-label col-sm-2"for="cantidad">Receción</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="can">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="cantidad">Peso Bruto</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="ub">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="cantidad">Peso Neto</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="ps">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="cantidad">Fecha</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="fec">
            </div>
          </div>
         

        

        </form>

        
                {{-- Form Delete Post --}}
        <div class="deleteContent">
        ¿Está seguro que desea borrar esta Recepción de Cera <span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Cerrar
        </button>
      </div>
    </div>
  </div>
</div>



@endsection


@section('scripts')
    @parent
    {{ Html::script('/js/dashboard.js') }}
@endsection

