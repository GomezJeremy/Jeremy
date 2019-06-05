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
                  <div class="icon"><i class="fa fa-money"></i></div>
            <div class="count green">₡{{ $counts['ingreso'] }}</div>
            <h3>Total Ingreso</h3>
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">Estadísticas Ingreso</div>
            <div class="col-lg-4 offset-lg-2 col-12 bg-white rounded-top tab-head">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Diario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mensual</a>
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
                <h3>{{ $chart3->options['chart_title'] }}</h3>
                   {!! $chart3->renderHtml() !!}
            </div>
                  
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <h5 class="pl-2"></h5>
             
              <h3>{{ $chart2->options['chart_title'] }}</h3>
                   {!! $chart2->renderHtml() !!}
            </div>
              
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <h5 class="pl-2"></h5>
              <h3>{{ $chart4->options['chart_title'] }}</h3>
                   {!! $chart4->renderHtml() !!}
            </div>
          </div>
            
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart3->renderJs() !!}
{!! $chart2->renderJs() !!}
{!! $chart4->renderJs() !!}
{{ Html::style('css5/chart.css') }}

@endsection
