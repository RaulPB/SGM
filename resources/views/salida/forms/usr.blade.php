	
	<div class="form-group">
		{!!Form::label('serv','Servicio:')!!}
		{!!Form::select('servicio_id',$serv)!!}
	</div>

	<div class="form-group">
		{!!Form::label('Prov','Producto:')!!}
		{!!Form::select('producto_id',$prod)!!}
	</div>

	<div class="form-group">
		{!!Form::label('cant','Cantidad:')!!}
		{!!Form::text('cantidad',null,['class'=>'form-control','placeholder'=>'Ingresa cantidad a dar salida'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('com','Comentarios:')!!}
		{!!Form::textarea('comentarios',null,['class'=>'form-control','placeholder'=>'Comentarios complementarios'])!!}
	</div>



