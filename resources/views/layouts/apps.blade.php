<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>APISOFT</title>

        {{--Common App Styles--}}
        {{ Html::style('/css/custom.min.css') }}
        {!!Html::style ('/css2/bootstrap.min.css')!!} 
      
 <!-- Font Awesome -->
 {!!Html::style ('/css2/font-awesome.min.css')!!}
    <!-- NProgress -->
    {!!Html::style ('/css2/nprogress.css')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::style ('/css2/jquery.mCustomScrollbar.min.css')!!}
    <!-- Custom Theme Style -->
    {!! Charts::styles() !!}
        {{--Styles--}}
        @yield('styles')

        {{--Head--}}
        @yield('head')

    </head>
    <body class="@yield('body_class')">

        {{--Page--}}
        @yield('page')

        {{--Common Scripts--}}
        {{ Html::script('js/custom.min.js') }}
        {{ Html::script('js/app.js') }}
        {{ Html::script('sweetAlert/sweetalert.min.js') }}
      <!-- NProgress -->
      {!!Html::script('/js2/nprogress.js')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::script('/js2/jquery.mCustomScrollbar.concat.min.js')!!}
    <!-- Custom Theme Scripts -->
        {!!Html::script('/js2/jquery.min.js')!!}  

@stack('scripts')
<!-- Bootstrap -->
{!!Html::script('/js2/bootstrap.min.js')!!}

        {{--Laravel Js Variables--}}
        @tojs

        {{--Scripts--}}
        @yield('scripts')

    
@include('sweet::alert')
    </body>
</html>
