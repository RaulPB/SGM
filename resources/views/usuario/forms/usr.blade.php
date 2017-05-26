	<div class="form-group">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('email','Correo:')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('password','Contraseña:')!!}
		{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('Perfil','Perfil:')!!}
		{!!Form::select('perfil_id',$perfiles)!!}
	</div>

	<div class="list-group">
		{!!Form::label('Sucursal','Sucursal:')!!}
		{!!Form::select('sucursal_id',$sucursal)!!}
	</div>