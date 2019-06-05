{!! Form::open(array('url'=>'Estanon','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		
	</div>
	
</div>

{{Form::close()}}