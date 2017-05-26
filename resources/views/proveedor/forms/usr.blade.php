	<div class="form-group">
		{!!Form::label('proveedor','Proveedor:')!!}
		{!!Form::text('proveedor',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del proveedor'])!!}
	</div>
	<div class="form-group">
	{!!Form::label('tip','Tipo (local/foraneo):')!!}
		{!!Form::text('tipo',null,['class'=>'form-control','placeholder'=>'Ingresa tipo de proveedor Local/Foraneo'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('ubicaci','Ubicación:')!!}
		{!!Form::text('ubicacion',null,['class'=>'form-control','placeholder'=>'Ingresa ubicación del proveedor'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('tel','Telefono:')!!}
		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingresa telefono del proveedor'])!!}
	</div>


	<div class="form-group">
		{!!Form::label('mail','Email:')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa correo del proveedor'])!!}
	</div>