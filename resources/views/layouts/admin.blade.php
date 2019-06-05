@extends('layouts.apps')

@section('body_class','nav-md')

@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('sections.navigation')
                @include('sections.header')
            @show

            @yield('left-sidebar')

            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h1 class="h3">@yield('title')</h1>
                    </div>
                   
                </div>
                
                @yield('content')
            </div>

            <footer>
                @include('sections.footer')
            </footer>
        </div>
    </div>
@stop

@section('styles')
    {{ Html::style('css/admin.css') }}
    {!! Charts::styles() !!}
@endsection

@section('scripts')
    {{ Html::script('js/admin.js') }}
@endsection