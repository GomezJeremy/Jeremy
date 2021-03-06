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
 
  
      <!-- Include Twitter Bootstrap and jQuery: -->
<!--<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>->

 
<!-- Include the plugin's CSS and JS: -->

    {!!Html::style ('/css2/bootstrap.min.css')!!} 

    {!!Html::style ('/css2/bootstrap-select.min.css')!!}   
    
    {!!Html::style ('/css2/select2.min.css')!!}

    {!!Html::style ('/css2/select2.css')!!}

    {!!Html::style ('/css/dashboard.css')!!}
    
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
            
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{ url('/dashboard/') }}">Dashboard</a></li>
                     
                    </ul>
                  </li>
                  @if(Auth::check())
                    @if (Auth::user()->isAdmin())
                  <li><a><i class="fa fa-briefcase"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                     <li><a href="{{ url('users/') }}">Gestionar Usuario</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-users"></i> Afiliados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Afiliado/') }}">Gestionar Afiliado</a></li>
                      <li><a href="{{ url('/Ubicacion/') }}">Gestionar Ubicacion</a></li>
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
                      <li><a href="{{ url('/RecepEstanon/') }}">Gestionar Recepción-Estañón</a></li>
                     
                    
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
  <!--<script src="{{asset('js2/bootstrap-select.min.js')}}"></script>-->
  
    <!-- jQuery -->
     

    {!!Html::script('/js2/jquery.min.js')!!}  

    @stack('scripts')
    <!-- Bootstrap -->
    {!!Html::script('/js2/bootstrap.min.js')!!}

   <!-- SELECT2 -->
   {!!Html::script('/js2/bootstrap-select.min.js')!!} 

    {!!Html::script('/js2/select2.full.js')!!}

    {!!Html::script('/js2/select2.js')!!}
    
    {!!Html::script('/js2/select2.min.js')!!}

    {!!Html::script('/js2/select2.full.min.js')!!}
    <!-- FastClick -->
    {!!Html::script('/js2/fastclick.js')!!}
    <!-- NProgress -->
    {!!Html::script('/js2/nprogress.js')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::script('/js2/jquery.mCustomScrollbar.concat.min.js')!!}
    <!-- Custom Theme Scripts -->
    {!!Html::script('/js2/custom.min.js')!!}

     {!!Html::script('/js2/dropdown.js')!!}

     {!!Html::script('/js/dashboard.js')!!}

     {!!Html::script('/js/Chart.min.js')!!}


     {!!Html::script('/js/app.js')!!}
     


 
<!-- Include the plugin's CSS and JS: -->
{!!Html::script('/js/bootstrap-select.min.js')!!}

{!!Html::script('/js/jquery-1.11.1.min.js')!!}

<script src="js/sweetalert.min.js"></script>

<!-- Include this after the sweet alert js file -->
@include('sweet::alert')



<!-- MODAL USER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-crear').text('Crear User');
    
  });

  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addUser',
      data: {
       
        '_token': $('input[name=_token]').val(),
        'name': $('input[name=name]').val(),
        'email': $('input[name=email]').val(),
        'password': $('input[name=password]').val()
      
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
          $('.error').text(data.errors.email);
          $('.error').text(data.errors.password);
         

 
        } else {
          $('.error').remove();
          $('#table').append("<tr class= users" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.name + "</td>"+
          "<td>" + data.email + "</td>"+
          
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + 
          "' data-name='" + data.name + 
          "' data-email='" + data.email +
          "' data-password='" + data.password +
          
 "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" 
 + data.id + 
           "' data-name='" + data.name + 
          "' data-email='" + data.email +
          "' data-password='" + data.password +
          
 "' ><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" 
 + data.id + 
              "' data-name='" + data.name + 
          "' data-email='" + data.email +
          "' data-password='" + data.password +
      
"'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
         
        }
      },
    });
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
  
  });

// function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Editar");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-descripcion').text('Editar Usuario');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#iii').val($(this).data('id'));
$('#nnn').val($(this).data('name'));
$('#emm').val($(this).data('email'));
$('#passs').val($(this).data('password'));
$('#rlss').val($(this).data('roles'));


$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editUser',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#iii").val(),
'name': $('#nnn').val(),
'email': $('#emm').val(),
'password': $('#passs').val(),
'roles': $('#rlss').val(),

      

    },
success: function(data) {
      $('.users' + data.id).replaceWith(" "+
      "<tr class='users" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.name + "</td>"+
          "<td>" + data.email + "</td>"+
          
         
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + 
          "' data-name='" + data.name + 
          "' data-email='" + data.email +
          "' data-password='" + data.password +
          
 "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" 
 + data.id + 
           "' data-name='" + data.name + 
          "' data-email='" + data.email +
          "' data-password='" + data.password +
          
 "' ><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" 
 + data.id + 
              "' data-name='" + data.name + 
          "' data-email='" + data.email +
          "' data-password='" + data.password +
      
"'><span class='glyphicon glyphicon-trash'></span></button></td>"+
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
$('.name').html($(this).data('name'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteUser',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
      $('.users' + $('.id').text()).remove();
    }
  });
});

  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i2').text($(this).data('id'));
  $('#n2').text($(this).data('name'));
  $('#em').text($(this).data('email'));
  $('#pw').text($(this).data('password'));
  $('.modal-title').text('Detalle Usuario');
  });
</script>
@include('partials.javascripts')
  </body>
</html>
@section('styles')
    {{ Html::style('css/admin.css') }}
@endsection

@section('scripts')
    {{ Html::script('js/admin.js') }}
@endsection