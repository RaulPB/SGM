	<div class="form-group">
		{!!Form::label('nombre','Nombre del cliente:')!!}
		{!!Form::text('cliente',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<div class="form-group">
		{!!Form::label('telefono','Telefono del cliente:')!!}
		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<div class="form-group">
		{!!Form::label('celular','Celular del cliente:')!!}
		{!!Form::text('celular',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<div class="form-group">
		{!!Form::label('email','Correo del cliente:')!!}
		{!!Form::text('correo',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<div class="form-group">
		{!!Form::label('facturacion','RFC del cliente:')!!}
		{!!Form::text('facturacion',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<div class="form-group">
		{!!Form::label('detalles','Detalles de facturación:')!!}
		{!!Form::textarea('detalles',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>

	