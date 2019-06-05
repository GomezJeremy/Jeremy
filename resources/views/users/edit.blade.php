@extends ('layouts.principalUser')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Categoría: {{ $user->name}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
      {!!Form::model($user,['method'=>'PATCH','route'=>['users.update',$user->id]])!!}
            {{Form::token()}}
	
          
         

            <div class="form-grup">

            <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="name" name="name"  value="{{ $user->name }}" placeholder="Nombre" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>

                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="email" name="email"  value="{{ $user->email }}" placeholder="Correo" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-email form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>
            
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
        <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status" id="status" value="{{ $user->status }}">
  <label class="form-check-label" for="inlineRadio1">Activo</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status" id="status" value="{{ $user->status }}">
  <label class="form-check-label" for="inlineRadio2">Inactivo</label>
</div>
           
               
                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="password" class="form-control has-feedback-left" id="password" name="password"  value="{{ $user->password }}" placeholder="Contraseña" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-email form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>

              

                <div class="form-group row add">
        <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="password" class="form-control has-feedback-left" id="password_confirmation" name="password_confirmation"  placeholder="Contraseña" required>
           <p class="error text-center alert alert-danger hidden"></p>
              <span class="fa fa-email form-control-feedback left" aria-hidden="true"></span>
                </div>
                </div>


                <div class="form-group row add">
            
                    <div class="col-md-9 col-sm-6 col-xs-12 ">
                        <select id="roles" name="roles[]" class="select2 form-control has-feedback-left" multiple="multiple" style="width: 100%" autocomplete="off">
                            @foreach($roles as $role)
                                <option @if($user->roles->find($role->id)) selected="selected" @endif value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-warning" type="submit">
              <span class="fa fa-save"></span> Guardar 
            </button>
            <button class="btn btn-warning" type="button" type="reset">
              <span class="fa fa-times"></span> Cerrar
            </button>
            </div>
           

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection