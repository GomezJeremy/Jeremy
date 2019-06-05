@extends ('layouts.principal')


<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  RECEPCION CREADA CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')


<h1 class="text-center">LISTADO DE  RECEPCION </h1>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">
	
	</div>


	<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
					<th>Codigo</th>
					<th>Fecha</th>
					<th>Afiliado</th>
					<th>Usuario</th>
                    <th>Peso Bruto</th>
					<th>Numero de muestra</th>
					<th>Tipo Entrega</th>
					<th>Observacion </th>
					<th> <a href="RecepcionMateriaPrima/create" class="create-modal btn btn-success btn-sm">
			<i class="glyphicon glyphicon-plus"></i>
			</a>
					</th>
				</thead>


               @foreach ($recepcionMateriaPrima as $recepcion)
			   <tbody>
					<td>{{ $recepcion->id}}</td>
                    <td>{{ $recepcion->fecha}}</td>
					<td>{{ $recepcion->user->name}} {{$recepcion->user->Apellido1}} {{$recepcion->user->Apellido2}}</td>
                    <td>{{ $recepcion->afiliado->Nombre}} {{$recepcion->afiliado->apellido}} {{$recepcion->afiliado->apellido2}}</td>
					<td>{{ $recepcion->pesoBruto}}</td>
					<td>{{ $recepcion->numero_muestras}}</td>
                    <td>{{ $recepcion->tipoEntrega->Descripcion}}</td>
					<td>{{ $recepcion->observacion}}</td>

                    
					<td>
					<a href=""  > <button class="btn btn-info btn-sm" > <span class="glyphicon glyphicon-eye-open"></button></a>
						<a href="{{URL::action('RecepcionMateriaPrimaController@edit',$recepcion->id)}}"><Button  class="btn btn-success btn-lg btn-sm">
      <span class="glyphicon glyphicon-edit "></button></a>
                         <a href="" data-target="#modal-delete-{{$recepcion->id}}" data-toggle="modal"><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove "></button></a>
						
						
					</td>
					</tbody>
					@endforeach
				@include('RecepcionMateriaPrima.modal')
			</table>
			<script>
    $(function ()
       {
         $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft"
         });
     });
</script>


@endsection