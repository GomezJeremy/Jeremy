@extends ('layouts.principalRecepcion') 

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />


	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->

    <link href="{{ url('assets2/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ url('assets2/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets2/css/demo.css" rel="stylesheet" />




<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'AddRol')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  ROL CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 >LISTADO DE  RECEPCIÓN MIEL</h1>
<!-- Saltos de linea-->
<br>
<br>
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->


<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Fecha Recepción</th>
        <th>Peso Bruto</th>
        <th>Peso Neto</th>
        <th>Numero de Muestra</th>
        <th>Afiliado</th>
        <th>Responsable</th>
        <th>Tipo Entregra</th>
        <th>Observacion</th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
     
      @foreach ($recepcion as $value)
        <tr class="recepcion{{$value->id}}">
       <td>{{ $value->id }}</td>
          <td>{{ $value->fecha }}</td>
          <td>{{ $value->pesoBruto }}</td>
          <td>{{ $value->pesoNeto }}</td>
          <td>{{ $value->numero_muestras }}</td>
          <td>{{ $value->afiliado_id }}- {{ $value->afiliado->Nombre }} {{ $value->afiliado->apellido1 }} {{ $value->afiliado->apellido2 }}</td>
          <td>{{ $value->user_id }} - {{ $value->user->name }}</td>
          <td>{{ $value->tipoEntrega_id }}- {{ $value->tipoEntrega->Descripcion }}</td>
          <td>{{ $value->observacion }}</td>
          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" 
            data-fecha="{{$value->fecha}}"
            data-pesoBruto="{{$value->pesoBruto}}" 
            data-pesoNeto="{{$value->pesoNeto}}" 
            data-numero_muestras="{{$value->numero_muestras}}"
            data-afiliado_id="{{$value->afiliado_id}} - {{ $value->afiliado->Nombre }} {{ $value->afiliado->apellido1 }} {{ $value->afiliado->apellido2 }}"
            data-user_id="{{$value->user_id}} - {{ $value->user->name }}"
            data-tipoEntrega_id="{{$value->tipoEntrega_id}} - {{ $value->tipoEntrega->Descripcion }}"
            data-observacion="{{$value->observacion}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" 
            data-fecha="{{$value->fecha}}"
            data-pesoBruto="{{$value->pesoBruto}}" 
            data-pesoNeto="{{$value->pesoNeto}}" 
            data-numero_muestras="{{$value->numero_muestras}}"
            data-afiliado_id="{{$value->afiliado_id}} "
            data-user_id="{{$value->user_id}} "
            data-tipoEntrega_id="{{$value->tipoEntrega_id}} "
            data-observacion="{{$value->observacion}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" 
            data-observacion="{{$value->observacion}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$recepcion->links()}}
</div>
 

{{-- Modal Form Create Afiliado --}}
<div id="create" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-crear"></h4>
      </div>
      <div class="modal-body">
      <span id="form_result"></span>
        <form class="form-horizontal" role="form">
       
        <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                        <p>Recepcion Miel</p>
                    </div>
                    
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p>Asignar Estañon</p>
                    </div>
                    
                    
                    
                </div>
            </div>
            <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            
                            <!-- content go here -->



              <div class="form-group">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="datetime" class="form-control" id="fecha" name="fecha" 
              placeholder="YYYY-MM-DD" disabled required>
              <p class="No ingreso la fecha"></p>
              <span class="fa fa-clock-o form-control-feedback right" aria-hidden="true" ></span>
              </div>
              </div>
              
              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <select class="form-control" id="afiliado_id" name="afiliado_id">
          <option value="">Seleccione el Afiliado</option>
          @foreach ($afiliado as $afi)
            <option value="{{$afi->id}}">{{ $afi->Nombre }}</option>
          @endforeach           
        </select>
              <p class="No ingreso la fecha"></p>
              <span class="fa fa-child form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>


              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="number" class="form-control" id="discount" name="pesoBruto"
              placeholder="Peso Bruto" required>
              <p class="No ingreso el Peso Bruto"></p>
              <span class="fa fa-plus form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>
             

              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="text" class="form-control" id="pesoNeto" name="pesoNeto"
             placeholder="Peso Neto" disabled required>
              <p class="No ingreso el Peso Neto"></p>
              <span class="fa fa-minus-circle form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>

              
              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="text" class="form-control"  id="numero_muestras" name="numero_muestras"
          placeholder="Numero Muestra" disabled required>
              <p class="No ingreso el Codigo"></p>
              <span class="fa fa-address-card form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>
            

              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <select class="form-control" id="tipoEntrega_id" name="tipoEntrega_id">
                <option value="">Seleccione la Entrega</option>
                  @foreach ($tipoEntrega as $entre)
                    <option value="{{$entre->id}}">{{ $entre->Descripcion }}</option>
                  @endforeach           
                </select>
              <p class="No ingreso el tipo de Entrega"></p>
              <span class="fa fa-sign-in form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>

              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="text" class="form-control"  value="{{ auth()->user()->id }}" id="user_id" name="user_id"
          placeholder="Encargado" disabled required>
              <p class="No ingreso el usuario"></p>
              <span class="fa fa-user-circle-o form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>

              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <textarea class="resizable_textarea form-control"  id="observacion" name="observacion" 
                      placeholder="Ingrese Observacion"></textarea>
              <span class="fa fa-file-text form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>


                 

                    <div class="modal-footer">
          
          
          <button class="btn btn-warning" type="submit" id="add">
              <span class="fa fa-save"></span> Guardar 
            </button>
           
            </div>
            </div>
                       
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="fa fa-times"></span> Cerrar
            </button>
                            <button class="btn btn-success  nextBtn pull-right"  type="button" >Siguiente</button>
                         
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            
                            <!-- content go here -->
        
              <table style="width: 100%;"  id="fiii" class="display hover dataTable no-footer" cellspacing="0" width="200">
                  <thead>
                    <tr>
                  <th>Codigo</th>
                  <th>Cédula Afiliado</th>
                 </tr>
              </thead>
              {{ csrf_field() }}
              <tbody>
           @foreach ($recepciones as $value)
        <tr class="recepciones{{$value->id}}">
       <td>{{ $value->id }}</td>
       <td>{{ $value->afiliado_id}}</td>
          </tr>
      @endforeach
        </tbody>
              </table>

           
              <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="text" class="form-control"  id="Recepcion_id" name="Recepcion_id"
          placeholder="Codigo Recepcion" required>
              <p class="No ingreso la Recepción"></p>
              <span class="fa fa-user-circle-o form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>

            <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <select  class="form-control" name="Estanon_id" class="form-control" id="Estanon_id">
         <option value="">-- Seleccione Estañon --</option>
         @foreach ($estanon as $value)
          <option value="{{ $value->id }}">{{$value->id}}-{{$value->Descripcion}}</option>
         @endforeach         
                </select>
              <p class="No ingreso el tipo de Entrega"></p>
              <span class="fa fa-sign-in form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>


            <div class="form-group row add">
              <div class="col-md-12 col-sm-2 col-xs-9 form-group has-feedback">
              <input type="datetime" class="form-control" id="Fecha" name="Fecha" 
              placeholder="YYYY-MM-DD" disabled required>
              <p class="No ingreso la fecha"></p>
              <span class="fa fa-clock-o form-control-feedback right" aria-hidden="true"></span>
              </div>
              </div>
          
            <div class="modal-footer">
          <button class="btn btn-warning" class="text-center" type="submit" id="addd">
              <span class="fa fa-save"></span> Guardar 
            </button>
            
           
            </div>
                           
                        </div>
                    </div>
               </div>
               </div> 
        </form>
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
                      <label for="descripcion">ID :</label>
                      <b id="ii"/>
                    </div>
                    <div class="form-group">
                      <label for="id">Fecha :</label>
                      <b id="ech"/>
                    </div>
                    <div class="form-group">
                      <label for="id">Peso Bruto :</label>
                      <b id="di"/>
                    </div>
                    <div class="form-group">
                      <label for="id">Peso Neto :</label>
                      <b id="psn"/>
                    </div>
                    <div class="form-group">
                      <label for="id">Número de muestra :</label>
                      <b id="num"/>
                    </div>
                    <div class="form-group">
                      <label for="id">Afiliado :</label>
                      <b id="afi"/>
                    </div>
                    <div class="form-group">
                      <label for="id">Usuario :</label>
                      <b id="use"/>
                    </div>
                    <div class="form-group">
                      <label for="id">Tipo Entrega :</label>
                      <b id="tip"/>
                    </div>
                    <div class="form-group">
                      <label for="id">Observación :</label>
                      <b id="obs"/>
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
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="descripcion">Fecha</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="ti">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="descripcion">Peso Bruto</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="psb">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="descripcion">Peso Neto</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="snt">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="descripcion">Número muestras</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="mue">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="descripcion">Afiliado</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="ali">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="descripcion">Usuario</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="ser">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="descripcion">Tipo Entrega</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="ent">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="descripcion">Observación</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="cio">
            </div>
          </div>

        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          ¿Está seguro que desea eliminar esta Recepción de Materia Prima <span class="descripcion"></span>?
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




 <!--   Core JS Files   -->
 <script src="assets2/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets2/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets2/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets2/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets2/js/jquery.validate.min.js"></script>



   


@endsection
