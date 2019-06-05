
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
    <link href="css5/normalize.css" rel="stylesheet">
    <link href="css/cardio.css" rel="stylesheet">

  </head>

  
  <body >

  <div class="preloader">
		<img src="images/loaderr.gif" alt="Preloader image">
  </div>
  
    <div class="navbar navbar-invers menu-wrap">
      <div class="navbar-header text-center">
        <a class="navbar-brand logo-right" href=""><i class="mdi-image-timelapse"></i>APISOFT</a>
      </div>
        <ul class="nav navbar-nav main-navigation">
          <li class="active"><a href="#home">Inicio</a></li>
          <li><a href="#features">Historia</a></li>
          <li><a href="#why">Misión</a></li>
          <li><a href="#screenshot">Visión</a></li>
          <li><a href="#testimonial">Acerca de Nosotros</a></li>
          <li><a href="#contact">Ubicación</a></li>
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
          <h1 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">APISOFT - Asociación de Apicultores Región Chorotega</h1>
          <p class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">La mejor miel del país producida en Nicoya</p>
  
        <a href="{{ url('/login/') }}" class="btn btn-lg btn-border wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">Iniciar Sesión</a>
        </div>   
    </header>

    <section id="features" class="section">
			<div class="container">
					<div class="section-header">
					  <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Historia</h1>
					</div>
					<h3 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">

             La Asociación de Apicultores Región Chorotega se constituyó legalmente el 26 de febrero de 2013, con el propósito de mejorar las  condiciones de vida de los asociados y sus familias impulsar<br>
             la actividad apícola y asistencia técnica para el desarrollo de las capacidades de los apicultores.<br>
             <br>
             
             La actividad hasta el momento, se ha venido realizando en una forma particular y desorganizada.<br>
             A nivel técnico, la zona de producción, tiene la suficiente capacidad y disponibilidad para el abastecimiento de esta materia prima<br>
             Principales problemáticas de la actividad son el cambio climático, plagas, competencia desleal.<br></h3>

					
				  </div>
				</div>
    </section>

    <section id="why" class="section">
      <div class="container">
        
        <div class="row">     

          <div class="col-md-6 col-sm-6 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
           {{-- <img src="img/features/img1.jpg" alt=""> --}}
          </div>

          <div class="col-md-6 col-sm-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="pull-left content">
              <h2>Misión </h2>
			  <h1 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms" >

           Somos una asociación productora y comercializadora de productos en base a la miel ,que brinda sus 
           alcances de calidad a nivel de producción; basados siempre en la mejora continua para garantizar 
           una excelente satisfacción al cliente y al consumidor final.<br></h1>

            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="screenshot" class="section">
      <div class="container">
        <div class="section-header">
          <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Visión</h1>
		</div>
		<h1 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">

        Ser una asociación líder en posicionamiento y en calidad de productos de miel en el mercado nacional e internacional, cruzando
        las fronteras a base de nuevas tendencias tecnológicas e innovadoras que provean calidades nutritivas para el ser humano,
        su región y su calidad de vida.<br></h1>
      
		
      </div>
	</div>
    </section>


    <section id="testimonial" class="section">
      <div class="container">
        <div class="section-header text-center wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">
          <h1 class="section-title">Acerca de Nosotros</h1>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
            <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#testimonial-carousel" data-slide-to="1"></li>
                <li data-target="#testimonial-carousel" data-slide-to="2"></li>
              </ol>
              <font size=5> 
              <div class="carousel-inner">
              
                <div class="item active text-center">               
                  <p>Somos una asociación que garantiza al consumidor productos de la colmena libres de residuos químicos, que cumpla con las normas de calidad</p>
                  
                </div>
                <div class="item text-center"> 
                                
                  <p>Además, procuramos que los productos que se comercializan alcancen su destino de mercado y generen los ingresos económicos esperados</p>
                  
                </div>
                <div class="item text-center">                
                  <p>Productos apícolas que cumplan con los estándares de calidad recomendados, son garantía de salud y bienestar para apicultores y consumidores.
</p>

                </div>
              </div>
            </div>
            </font>
          </div>
        </div>
      </div>
    </section>


   


   
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2 class="section-title">¡Aquí estamos!</h2>
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="info">
                  <div class="icon">
                    <i class="mdi-maps-map"></i>
                  </div>
                  <h4>Localización</h4>
                 <p> Nicoya, cantón segundo de Guanacaste,<p>
                  <p>uno de los más poblados de la provincia.<p>

                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="info">
                  <div class="icon">
                    <i class="mdi-content-mail"></i>
                  </div>
                  <h4>Correo</h4>
                  <p>apicultoresNicoya@gmail.com</p>
                </div>
              </div>
              <div class="clear"></div>
              <div class="col-md-6 col-sm-6">
                <div class="info">
                  <div class="icon">
                    <i class="mdi-action-settings-phone"></i>
                  </div>
                  <h4>Número Telefónico</h4>
                  <p>2685-02-02</p>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="info">
                  <div class="icon">
                    <i class="mdi-action-thumb-up"></i>
                  </div>
                  <h4>Redes sociales</h4>
                  <p>Apicultores Nicoya</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    

    <div class="map-area">      
      <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5093.262585022687!2d-85.45634677172262!3d10.144652384278258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f9fb6d26f825361%3A0xcbdc1416a01be4f3!2sProvincia+de+Guanacaste%2C+Nicoya!5e0!3m2!1ses-419!2scr!4v1553388582710" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
       </div>
    </div>
    
    <section id="footer" >
      <div class="container">
        <div class="container">
          <div class="row">

            <div class="Prueba">
               <h3>   APPIS Chorotega</h3>
              <ul>
             <img src="/welcome/img/APPIS.jpeg"> 
              </ul>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
            </div>
           

            <div class="col-md-3 col-sm-6 col-xs-12">
              <h3>Coordinación</h3>
              <ul>
              <img src="/welcome/img/una.png">
              </ul>
            </div>
            <div class="col-xs-6 col-sm-3">
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

    @include('sweet::alert')
    
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
    <script src="js/loarder.js"></script>
    

    <script>
        $(document).ready(function() {
            // This command is used to initialize some elements and make them work properly
            $.material.init();
        });
    </script>

  </body>
\
<style>
div.Prueba{
top:8px;
position:absolute;
bottom:8px;
left:16px;
font-size: 18px;
}


</style>
