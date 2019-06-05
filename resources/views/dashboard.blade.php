@extends('layouts.admin')

@section('content')
<div class="row tile_count">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-truck"></i></div>
            <div class="count">{{ $counts['product'] }}</div>
            <h3>Total Productos</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
            <div class="count">{{ $counts['afi'] }}</div>
            <h3>Total Afiliados</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-archive"></i></div>
            <div class="count ">{{ $counts['api'] }}</div>
            <h3>Total Apiarios</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
            <div class="count">{{ $counts['recep'] }}</div>
            <h3>Total Recepción</h3>
        </div>
        </div>
       
    </div>

      
    <div class="row">
        <div class="col-md-12">
        
            <div class="panel panel-default">
            
                <div class="panel-heading">Estadística de Afiliados</div>
                <div class="col-lg-4 offset-lg-2 col-12 bg-white rounded-top tab-head">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mensual</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Día</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Anual</a>
            </li>
          </ul>
        </div>
                <div class="panel-body">
                 
          <div class="tab-content mt-4" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h5 class="pl-2"></h5>
            
                {!! $chart3->html() !!}
           
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <h5 class="pl-2"></h5>
             
<h1>{{ $chart2->options['chart_title'] }}</h1>
{!! $chart2->renderHtml() !!}
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <h5 class="pl-2">Contact</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
                  
          <script src="js/sweetalert.min.js"></script>

<!-- Include this after the sweet alert js file -->

                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart3->script() !!}
{!! $chart2->renderJs() !!}
{{ Html::style('css5/chart.css') }}
@endsection


