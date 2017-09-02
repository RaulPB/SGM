	<div class="form-group">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('nameS',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre de la nueva Sucursal'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('dir','Dirección:')!!}
		{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingresa dirección de la nueva Sucursal'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('clave','Clave de Nota:')!!}
		{!!Form::text('clavenota',null,['class'=>'form-control','placeholder'=>'Ingresa clave de la nueva Sucursal'])!!}
	</div>
