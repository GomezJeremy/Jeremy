@extends('layouts.principal')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  AFILIADO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')

              
<h1 class="text-center">LISTADO DE  AFILIADOS </h1>


<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->


@include('Afiliado.search') 

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered table-dark" id="table">
      <tr>
			<th>Cédula</th>
  		<th  width="150px" >Afiliado</th>
  		<th>Teléfono</th>
  		<th>Correo</th>
    	<th>Dirección</th>
  		<th>Fecha Ingreso</th>
  		<th>Numero de Cuenta</th>
    	<th>Género</th>
  		<th>Estado Civil</th>
     
			<th>Estado</th>
     
      @if(Auth::check())
      @if (Auth::user()->isAdmin())
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="fa fa-plus"></i>
          </a>
        </th>
        @endif
        @endif
      </tr>
      @foreach ($afi as $value)
      <tr class="afi{{$value->id}}">
      <td>{{$value->id}}</td>
  	  	<td>{{$value->Nombre}} {{$value->apellido1}}  {{$value->apellido2}}</td>
        <td>{{$value->Telefono}}</td>
  		  <td>{{$value->email}}</td>
        <td>{{$value->Direccion}}</td>
  	  	<td>{{$value->Fecha_Ingreso}}</td>
        <td>{{$value->Num_Cuenta}}</td>
	    	<td>{{$value->Genero->descripcion}}</td>
	    	<td> {{$value->Estado_Civil->descripcion}}</td>  
        <td> <span class="label label-success"><?php  if ($value->estado_id=='1') {
			# code...
			print("Activo");
		} else {
			print("Inactivo");
		}
		  ?></span></td>  
          <td>
          <a href="#" class="show-modal btn btn-info btn-sm" 
          data-id="{{$value->id}}"
            data-Nombre="{{$value->Nombre}}"
            data-apellido1="{{$value->apellido1}}"
            data-apellido2="{{$value->apellido2}}"
            data-Telefono="{{$value->Telefono}}"
            data-email="{{$value->email}}"
            data-Direccion="{{$value->Direccion}}"
            data-Fecha_Ingreso="{{$value->Fecha_Ingreso}}"
            data-Num_Cuenta="{{$value->Num_Cuenta}}"
            data-genero_id="{{$value->genero_id}}"
            data-estado_civil_id="{{$value->estado_civil_id}}"
            data-estado_id="{{$value->estado_id}}"
              ><i class="fa fa-eye"></i>
            </a>
            @if(Auth::check())
      @if (Auth::user()->isAdmin())
            <a href="#" class="edit-modal btn btn-warning btn-sm"
            data-id="{{$value->id}}"
            data-Nombre="{{$value->Nombre}}"
            data-apellido1="{{$value->apellido1}}"
            data-apellido2="{{$value->apellido2}}"
            data-Telefono="{{$value->Telefono}}"
            data-email="{{$value->email}}"
            data-Direccion="{{$value->Direccion}}"
            data-Fecha_Ingreso="{{$value->Fecha_Ingreso}}"
            data-Num_Cuenta="{{$value->Num_Cuenta}}"
            data-genero_id="{{$value->genero_id}}"
            data-estado_civil_id="{{$value->estado_civil_id}}"
            data-estado_id="{{$value->estado_id}}"><i class="fa fa-pencil-square-o"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm"
            data-id="{{$value->id}}"
            data-Nombre="{{$value->Nombre}}">
              <i class="fa fa-trash"></i>
            </a>
            @endif
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$afi->links()}}
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
                        <p>Datos</p>
                    </div>
                    
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p>Accesos</p>
                    </div>
                    
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p>Personal</p>
                    </div>
                    
                </div>
            </div>
            <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            
                            <!-- content go here -->
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="id" name="id" placeholder="Cédula" required>
            <p class="No Ingreso la Cedula"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
       
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" required>
                        <p class="No Ingreso el Nombre"></p>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="apellido1" name="apellido1" placeholder="Primer Apellido" required>
            <p class="No Ingreso el Primer Apellido"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
      
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido" required>
                        <p class="No Ingreso el Segundo Apellido"></p>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                            <button class="btn btn-success  nextBtn pull-right" type="button" >Siguiente</button>
                         
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            
                            <!-- content go here -->
                                     
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control  has-feedback-right" id="Telefono" name="Telefono" placeholder="Teléfono">
                        <p class="No Ingreso el Telefono"></p>
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control " id="email" name="email" placeholder="Correo">
                        <p class="No Ingreso el Correo"></p>
                        <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                      </div> 

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="Direccion" name="Direccion" placeholder="Dirección">
                        <p class="No Ingreso la Direccion"></p>
                        <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                      </div> 

  
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="date" class="form-control " id="Fecha_Ingreso" name="Fecha_Ingreso" placeholder="YYYY-MM-DD" required>
                        <p class="No Ingreso la Fecha"></p>
                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                      </div> 
                            <button class="btn btn-success  nextBtn pull-right" type="button" >Suguiente</button>
                           
                        </div>
                    </div>
               </div>


 
               <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            
                            <!-- content go here -->
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="Num_Cuenta" name="Num_Cuenta" placeholder="Número de Cuenta">
                        <p class="No Ingreso el Numero de Cuenta"></p>
                        <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
                      </div> 



          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
         
          <select class="form-control" id="genero_id" name="genero_id">
          <option value="">Seleccione Género</option>
            @foreach ($genero as $gene)
              <option value="{{$gene->id}}">{{ $gene->descripcion }}</option>
            @endforeach           
          </select>
          <span class="fa fa-users form-control-feedback right" aria-hidden="true"></span>
            </div>
          

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <select class="form-control has-feedback-right" id="estado_civil_id" name="estado_civil_id">
          <option value="">Seleccione Estado Civil</option>
            @foreach ($estadoC as $ess)
              <option value="{{$ess->id}}">{{ $ess->descripcion }}</option>
            @endforeach           
          </select>
          <span class="fa fa-users form-control-feedback right" aria-hidden="true"></span>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <div class="col-md-9" >
          <div class="radio">
                            <label>
                              <div class="iradio_flat-green checked" style="position: relative;">
                              <input type="radio" class="flat" name="estado_id" value="{{$estado_id=1}}" id="estado_id" checked="1" style="position: absolute; opacity: 0;">
                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                              </ins></div> Activo
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <div class="iradio_flat-green" style="position: relative;">
                              <input type="radio" class="flat" name="estado_id" value="{{$estado_id=0}}" id="estado_id" style="position: absolute; opacity: 0;">
                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                              </ins></div> Inactivo
                            </label>
                          </div>
                          </div>
                        </div>
                      
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
                      <label for="">ID :</label>
                      <b id="iaa"/>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre :</label>
                      
                      <b id="jaja"/>
                    </div>
										<div class="form-group">
                      <label for="">Primer Apellido:</label>
                      <b id="ape1"/>
                    </div>
										<div class="form-group">
                   
                      <label for="">Segundo Apellido :</label>
                      <b id="ape2"/>
                    </div>
                    <div class="form-group">
                   
                   <label for="">Telefono :</label>
                   <b id="tel"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Correo :</label>
                   <b id="eml"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Direccion :</label>
                   <b id="dirn"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Direccion :</label>
                   <b id="dirn"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Fecha Ingreso :</label>
                   <b id="fecso"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Numero de cuenta :</label>
                   <b id="nunta"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Genero :</label>
                   <b id="ged"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Estado Civil :</label>
                   <b id="estid"/>
                 </div>
                 <div class="form-group">
                   
                   <label for="">Estado :</label>
                   <b id="esid"/>
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
        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="i" disiabled >
            
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
       
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="n" >
                       
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="a1">

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
      
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-right" id="a2" >
                      
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                          
        
                                     
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="t" >
                        <p class="No Ingreso el Telefono"></p>
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-right " id="em" >
                        
                        <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                      </div> 

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-right" id="d">
                       
                        <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                      </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nu" >
                        <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
                      </div> 


                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="date" class="form-control  has-feedback-right" id="f" >
                        <p class="No Ingreso la Fecha"></p>
                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                      </div>

          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
         
          <select class="form-control has-feedback-left" id="g" >
          <option value="">Seleccione Género</option>
            @foreach ($genero as $gene)
              <option value="{{$gene->id}}">{{ $gene->descripcion }}</option>
            @endforeach           
          </select>
          <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
            </div>
          

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <select class="form-control has-feedback-right" id="e" >
          <option value="">Seleccione Estado Civil</option>
            @foreach ($estadoC as $ess)
              <option value="{{$ess->id}}">{{ $ess->descripcion }}</option>
            @endforeach           
          </select>
          <span class="fa fa-users form-control-feedback right" aria-hidden="true"></span>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <div class="col-md-9" >
          <div class="radio">
                            <label>
                              <div class="iradio_flat-green checked" style="position: relative;">
                              <input type="radio" class="flat" name="estado_id" value="{{$estado_id=1}}" id="es" checked="1" style="position: absolute; opacity: 0;">
                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                              </ins></div> Activo
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <div class="iradio_flat-green" style="position: relative;">
                              <input type="radio" class="flat" name="estado_id" value="{{$estado_id=0}}" id="es" style="position: absolute; opacity: 0;">
                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                              </ins></div> Inactivo
                            </label>
                          </div>

                          </div>
                        </div>
                
                    

        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          ¿Está seguro que desea eliminar este afiliado <span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="fa fa-close"></span>Cerrar
        </button>
      </div>
    </div>
  </div>
</div>


@endsection

   