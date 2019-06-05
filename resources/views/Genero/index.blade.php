@extends ('layouts.principal')
@section ('contenido')
@include('Genero.create')
<div class="row">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Listado de Generos <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createGenero">
    Nuevo</a></h3>
		@include('Genero.search')
	</div>
</div>
@can('Crear Afiliado')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
				
				</thead>
               @foreach ($genero as $generos)
				<tr>
					<td>{{ $generos->id}}</td>
					<td>{{ $generos->descripcion}}</td>
					<td>
						<a href="{{URL::action('GeneroController@edit',$generos->id)}}"><button class="btn btn-info">Editar</button></a>
					
                         <a href="" data-target="#modal-delete-{{$generos->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						 <script>
$(document).ready(function(){
    $(".btn").click(function(){
        $(this).button('loading');
    });   
});
</script>
						 
					</td>
				</tr>
				@include('Genero.modal')
				@endforeach
			</table>
			@else
                            Usted no tiene los permisos suficientes 
                        @endcan
		</div>
		{{$genero->render()}}
	</div>
</div>

@endsection