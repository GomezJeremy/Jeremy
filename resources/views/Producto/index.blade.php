@extends ('layouts.principalProducto')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  ¡PRODUCTO GUARDADO CORRECTAMENTE!
</div>
@endif
<!-- fin de mensaje de exito -->
@section ('contenido')

		<h1 class="text-center">Listado de Productos</h1>
	

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">
		@include('Producto.search') 
</div>


<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Identificación</th>
					<th>Nombre</th>
					<th>Precio Unitario</th>
					<th>Creación</th>
					<th> <a href="#"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
			</th>

				</thead>
               @foreach ($product as $prod)
				<tr>
					<td>{{ $prod->id}}</td>
					<td>{{ $prod->nombre}}</td>
          <td>{{ $prod->precioUnitario}}</td>
					<td>{{ $prod->created_at}}</td>

					<td>
					<a href=""  > <button class="btn btn-info btn-sm" > <span class="glyphicon glyphicon-eye-open"></button></a>
						<a href="{{URL::action('ProductController@edit',$prod->id)}}"><Button  class="btn btn-success btn-lg btn-sm">
      <span class="glyphicon glyphicon-edit "></button></a>
                         <a href="" data-target="#modal-delete-{{$prod->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove "></button></a>
						
					</td>
				</tr>
				@include('Producto.modal')
				@endforeach
			</table>
		</div>
		{{$product->render()}}
	</div>
</div>

@endsection