
<!-- Modal -->
<div class="modal" id="exampleModalCentered-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
{{Form::Open(array('action'=>array('AfiliadoController@show',$user->id),'method'=>'show'))}}
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" value="{{$user->id}}" disiabled >
            
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
       
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" value="{{$user->Nombre}}" >
                       
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" value="{{$user->apellido1}}">

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
      
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-right"  value="{{$user->apellido2}}" >
                      
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                          
        
                                     
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left"  value="{{$user->Telefono}}" >
                        <p class="No Ingreso el Telefono"></p>
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-right "  value="{{$user->email}}" >
                        
                        <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                      </div> 

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-right"  value="{{$user->Direccion}}">
                       
                        <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                      </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left"  value="{{$user->Num_Cuenta}}" >
                        <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
                      </div> 


                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="date" class="form-control  has-feedback-right"  value="{{$user->Fecha_Ingreso}}" >
                        <p class="No Ingreso la Fecha"></p>
                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                      </div>

          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
         
          <select class="form-control has-feedback-left"  value="{{$user->genero_id}}">
          <option value="">Seleccione Género</option>
            @foreach ($genero as $gene)
              <option value="{{$gene->id}}">{{ $gene->descripcion }}</option>
            @endforeach           
          </select>
          <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
            </div>
          

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <select class="form-control has-feedback-right"  value="{{$user->estado_civil_id}}">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>