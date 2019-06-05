<!doctype html>
<html lang="en">

  <head>  	
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Responsive Bootstrap Landing Page Template">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
		<title>Asociacion de Apicultores Region Chorotega</title>

    <link href="welcome/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="welcome/fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="welcome/css/material.min.css" rel="stylesheet">
    <link href="welcome/css/ripples.min.css" rel="stylesheet">
    <link href="welcome/css/main.css" rel="stylesheet">
    <link href="welcome/css/responsive.css" rel="stylesheet">
    <link href="welcome/css/animate.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-invers menu-wrap">
      <div class="navbar-header text-center">
        <a class="navbar-brand logo-right" href="welcome/javascript:void(0)"><i class="mdi-image-timelapse"></i>APISOFT</a>
      </div>
        <ul class="nav navbar-nav main-navigation">
          <li class="active"><a href="#home">Inicio</a></li>
          <li><a href="{{ url('/users/') }}">Administrador</a></li>
          <li><a href=" {{url('/register/') }}">User prueba</a></li>
          <li><a href="{{ url('/RecepcionMateriaPrima/') }}">Planta</a></li>
          <li><a href="#contact">Ubicacion</a></li>
        </ul>
        <button class="close-button" id="close-button">Cerrar</button>
    </div>
  	
  	<div class="content-wrap">
     <header class="hero-area" id="home">
      
      <div class="container">
          <div class="col-md-12">

            <div class="navbar navbar-inverse sticky-navigation navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="200">
              <div class="container">
                <div class="navbar-header">
                  <a class="logo-left " href=""><i class="mdi-image-timelapse"></i>APISOFT</a>
                </div>
                <div class="navbar-right">
                  <button class="menu-icon"  id="open-button">
                    <i class="mdi-navigation-menu"></i>
                  </button>             
                </div>
              </div>
            </div>
        </div>        
        <div class="contents text-right">
            <h1 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Hola , {{ auth()->user()->name }}</h1>
         
  
        <a href="{{ url('/logout/') }}" class="btn btn-lg btn-border wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">Logout</a>
        </div>   
    </header>



    <section id="footer" >
      <div class="container">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
               <h3>   APPIS Chorotega</h3>
              <ul>
               <!-- <img src="/welcome/img/APPIS.jpeg"> -->
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="col-md-3 col-sm-6 col-xs-12">
            </div>
            </div>
           
            <div class="col-md-3 col-sm-6 col-xs-12">
              <h3>Asociacion de Apicultores Región Chorotega</h3>
                Todos los derechos reservados<br>
              <ul>
              
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a class="social" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
              <a class="social" href="#" target="_blank"><i class="fa fa-twitter"></i></a>
              <a class="social" href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
            </div>
          </div>
        </div>  
      </div>      
      <!-- Go to Top Link -->
      <a href="#home" class="btn btn-primary back-to-top">
      <i class=" mdi-hardware-keyboard-arrow-up"></i>
      </a>
    </section> 

    <section id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="copyright-text">
               APISOFT©Copyright ©2019 All rights reserved.
              </a>
            </p>
          </div>
        </div>
      </div>
    </section>     
    </div>  


		<script src="welcome/js/jquery-2.1.4.min.js"></script>
    <script src="welcome/js/bootstrap.min.js"></script>
    <script src="welcome/js/ripples.min.js"></script>
    <script src="welcome/js/material.min.js"></script>
    <script src="welcome/js/wow.js"></script>
    <script src="welcome/js/jquery.mmenu.min.all.js"></script> 
    <script src="welcome/js/count-to.js"></script>   
    <script src="welcome/js/jquery.inview.min.js"></script>     
    <script src="welcome/js/main.js"></script>
    <script src="welcome/js/classie.js"></script>
    <script src="welcome/js/jquery.nav.js"></script>      
    <script src="welcome/js/smooth-on-scroll.js"></script>
    <script src="welcome/js/smooth-scroll.js"></script>
    

    <script>
        $(document).ready(function() {
            // This command is used to initialize some elements and make them work properly
            $.material.init();
        });
    </script>
<script type="text/javascript" src="graficas/googlechart.js"></script>



 
  </body>