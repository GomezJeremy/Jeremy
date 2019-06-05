
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APISOFT</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css2/bootstrap-select.min.css')}}">


  
    {!!Html::style ('/css2/bootstrap.min.css')!!} 

    {!!Html::style ('/css2/bootstrap-select.min.css')!!}  
    
    
    <!-- Font Awesome -->
    {!!Html::style ('/css2/font-awesome.min.css')!!}
    <!-- NProgress -->
    {!!Html::style ('/css2/nprogress.css')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::style ('/css2/jquery.mCustomScrollbar.min.css')!!}
    <!-- Custom Theme Style -->
    {!!Html::style ('/css2/custom.min.css')!!}
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/Afiliado') }}" class="site_title">
                <i class="glyphicon glyphicon-home"></i> <span>AAPIS Chorotega</span>
              </a>
            </div>
              <div class="clearfix"></div>
              <!-- menu profile quick info -->
              <div class="profile clearfix">
              <div class="profile_pic">
                <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/b666f811889067.562541eff3013.png" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                @if(Auth::check())
                    @if (Auth::user()->isAdmin())
                  <li><a><i class="fa fa-briefcase"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                     <li><a href="{{ url('users/') }}">Gestionar usuarios</a></li>
                    </ul>
                  </li>
                
                  <li><a><i class="fa fa-users"></i> Afiliados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Afiliado/') }}">Gestionar Afiliado</a></li>
                      <li><a href="{{ url('/AfiliadoApiario/') }}">Gestionar Afiliado-Apiario</a></li>
                      <li><a href="{{ url('/Apiario/') }}">Gestionar Apiaro</a></li>
                    
                    </ul>
                  </li>
                  @endif
                  @endif
                  <li><a><i class="glyphicon glyphicon-list-alt"></i> Recepción<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/RecepcionMateriaPrima') }}">Gestionar Recepción</a></li>
                      <li><a href="{{ url('/Cera/') }}">Gestionar Extración de cera</a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-oil"></i> Planta <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Estanon/') }}">Gestionar Estañones</a></li>
                      <li><a href="{{ url('/AfiliadoEstanon/') }}">Gestionar Afiliado-Estañon</a></li>
                   
                    
                    </ul>
                  </li>

                  <li><a><i class="glyphicon glyphicon-shopping-cart"></i> Inventario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{ url('/Stock/') }}">Gestionar Stok</a></li>
                    <li><a href="{{ url('/IngresoCera/') }}">Gestionar Servicio Cera</a></li>
                    <li> <a href="{{ url('/IngresoInventario/') }}">Gestionar Servicio Inventario</a></li>
                    
                    
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="{{ route('logout') }}" class="user-profile">
                    Salir
                    <span class=" fa fa-sign-out"></span>
                  </a>                 
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="container">
            <div class="row x_panel">
              @yield('contenido')
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            APPIS - Asociacion de Apicultores Region Chorotega
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <script src="{{asset('js2/bootstrap-select.min.js')}}"></script>
  
    <!-- jQuery -->

    {!!Html::script('/js2/jquery.min.js')!!}  
    @stack('scripts')
    <!-- Bootstrap -->
    {!!Html::script('/js2/bootstrap.min.js')!!}

    
    <!-- FastClick -->
    {!!Html::script('/js2/fastclick.js')!!}
    <!-- NProgress -->
    {!!Html::script('/js2/nprogress.js')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::script('/js2/jquery.mCustomScrollbar.concat.min.js')!!}
    <!-- Custom Theme Scripts -->
    {!!Html::script('/js2/custom.min.js')!!}
     {!!Html::script('/js2/dropdown.js')!!}


<!-- MODAL ROL -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
{{-- ajax Form Add Post--}}




var div_respuesta="#respuesta";

  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-descripcion').text('Nuevo Recepcion');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addRecepcionMateriaPrima',
      data: {
        '_token': $('input[name=_token]').val(),
        'fecha': $('input[name=fecha]').val(),
        'pesoBruto': $('input[name=pesoBruto]').val(),
        'discount': $('input[name=pesoNeto]').val(),
        'numero_muestras': $('input[name=numero_muestras]').val(),
        'afiliado_id': $('select[name=afiliado_id]').val(),
        'user_id': $('input[name=user_id]').val(),
        'tipoEntrega_id': $('select[name=tipoEntrega_id]').val(),
        'observacion': $('textarea[name=observacion]').val(),
        
      },
      
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.fecha);
          $('.error').text(data.errors.pesoBruto);
          $('.error').text(data.errors.pesoNeto);
          $('.error').text(data.errors.numero_muestras);
          $('.error').text(data.errors.afiliado_id);
          $('.error').text(data.errors.user_id);
          $('.error').text(data.errors.tipoEntrega_id);
          $('.error').text(data.errors.observacion);
 
        } else {
          $('.error').remove();
          $('#table').append("<tr class='recepcion" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.fecha + "</td>"+
          "<td>" + data.pesoBruto + "</td>"+
          "<td>" + data.pesoNeto + "</td>"+
          "<td>" + data.numero_muestras + "</td>"+
          "<td>" + data.afiliado_id + "</td>"+
          "<td>" + data.user_id + "</td>"+
          "<td>" + data.tipoEntrega_id + "</td>"+
          "<td>" + data.observacion + "</td>"+
          "<td><button class='show-modalRol btn btn-info btn-sm' data-id='" + 
          data.id + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-eye'></span></button> <button class='edit-modalRol btn btn-warning btn-sm' data-id='" + data.id + "' data-descripcion='" + data.descripcion + "' ><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modalRol btn btn-danger btn-sm' data-id='" + data.id + "' data-descripcion='" + data.descripcion + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
        
          $('#fiii').append("<tr class='recepciones" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.afiliado_id + "</td>");

          $('#Recepcion_id').val($(this).data('id'));
        
        }
        $('#form_result').html(html);
      },
    });
      

    $('#id').val('');
    $('#fecha').val('');
    $('#discount').val('');
    $('#pesoNeto').val('');
    $('#numero_muestras').val('');
    $('#afiliado_id').val('');
    $('#user_id').val('');
    $('#tipoEntrega_id').val('');
    $('#observacion').val('');


  });
  {{-- ajax Form Add Post--}}
$(document).on('click','.create-modal', function() {
  $('#create').modal('show');
  $('.form-horizontal').show();
  $('.modal-descripcion').text('Crear Recepción Estañón');
});
$("#addd").click(function() {
  $.ajax({
    type: 'POST',
    url: 'addRecepcion',
    
    data: {
      '_token': $('input[name=_token]').val(),
      'Recepcion_id': $('input[name=Recepcion_id]').val(),
      'Estanon_id': $('select[name=Estanon_id]').val(),
      'Fecha': $('input[name=Fecha]').val()
      
    },
    success: function(data){
      if ((data.errors)) {
        $('.error').removeClass('hidden');
        $('.error').text(data.errors.Recepcion_id);
        $('.error').text(data.errors.Estanon_id);
        $('.error').text(data.errors.Fecha);
      } else {
        $('.error').remove();
    
      }
    },
  });
  $('#Recepcion_id').val('');
  $('#Estanon_id').val('');
  $('#Fecha').val('');
});

// function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Editar");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-descripcion').text('Editar Recepción');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#fid').val($(this).data('id'));
$('#ti').val($(this).data('fecha'));
$('#psb').val($(this).data('pesobruto'));
$('#snt').val($(this).data('pesoneto'));
$('#mue').val($(this).data('numero_muestras'));
$('#ali').val($(this).data('afiliado_id'));
$('#ser').val($(this).data('user_id'));
$('#ent').val($(this).data('tipoentrega_id'));
$('#cio').val($(this).data('observacion'));

$('#myModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editRol',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#fid").val(),
'descripcion': $('#ti').val(),
    },
success: function(data) {
      $('.rol' + data.id).replaceWith(" "+
      "<tr class='rol" + data.id + "'>"+
      "<td>" + data.id + "</td>"+
      "<td>" + data.descripcion + "</td>"+
      "<td>" + data.created_at + "</td>"+
 "<td><button class='show-modalRol btn btn-info btn-sm' data-id='" + data.id + "' data-descripcion='" + data.descripcion + "'><span class='fa fa-eye'></span></button> <button class='edit-modalRol btn btn-warning btn-sm' data-id='" + data.id + "' data-descripcion='" + data.descripcion + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modalRol btn btn-danger btn-sm' data-id='" + data.id + "' data-descripcion='" + data.descripcion + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
      "</tr>");
    }
  });
});
// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Eliminar");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Eliminar Ubicación');
$('.id').text($(this).data('id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.observacion').html($(this).data('observacion'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteRecepcionMateriaPrima',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
      $('.ubicacion' + $('.id').text()).remove();
    }
  });
});

  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#ii').text($(this).data('id'));
  $('#ech').text($(this).data('fecha'));
  $('#di').text($(this).data('pesobruto'));
  $('#psn').text($(this).data('pesoneto'));
  $('#num').text($(this).data('numero_muestras'));
  $('#afi').text($(this).data('afiliado_id'));
  $('#use').text($(this).data('user_id'));
  $('#tip').text($(this).data('tipoentrega_id'));
  $('#obs').text($(this).data('observacion'));
  $('.modal-title').text('Detalle Recepción');
  });
</script>

<script>

// Funcion de descuento
var timeoutId = 0;
$('#discount').keyup(function(e){
   clearTimeout(timeoutId);
   timeoutId = setTimeout(discount,1000);
});

function discount(){
  let amount = $('#discount').val();
  if(!isNaN(amount)){
    let discount = amount * 0.05;
    let total =  amount - discount;
    $("#pesoNeto").val(total);
  } 
}
</script>



<script type="text/javascript">
$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'), // tab nav items
            allWells = $('.setup-content'), // content div
            allNextBtn = $('.nextBtn'); // next button

    allWells.hide(); // hide all contents by defauld

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    // next button
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='id']"),
            isValid = true;
           // Validation
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
        // move to next step if valid
        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });


 
    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>



    </body>
    </html>

<style type="text/css">
.form-control {
    height: 37px;
}
.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}


 
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>




<script>
$( document ).on('click','.create-modal',function() {

    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    h=now.getHours();
    m=now.getMinutes();
  s=now.getSeconds();
    var today = now.getFullYear()+"-"+(month)+"-"+(day)+"-"+(h)+"-"+(m)+"-"+(s) ;
    $("#fecha,#Fecha").val(today);
});
</script>

<script>
  $("#add").click(function(){
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    h=now.getHours();
    m=now.getMinutes();
  s=now.getSeconds();
    var today = now.getFullYear()+"-"+(month)+"-"+(day)+"-"+(h)+"-"+(m)+"-"+(s) ;
    $("#fecha,#Fecha").val(today);
});
</script>

<script>
$( document ).on('click','.create-modal',function() {
  var aleatorio = Math.round(Math.random()*1000000);
$("#numero_muestras").val(aleatorio);   
});
</script>

<script>
 $("#add").click(function() {
  var aleatorio = Math.round(Math.random()*1000000);
$("#numero_muestras").val(aleatorio);  
});
</script>


