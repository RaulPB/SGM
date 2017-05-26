    <div class="list-group ">
		{!!Form::label('Orden','Orden de servicio sobre la cual solicitar compra:')!!}
		{!!Form::select('servicio_id',$servicio)!!}
	</div>
	<div class="form-group ">
		{!!Form::label('Status','Status:')!!}
		{!!Form::select('status_id',$status)!!}
	</div>
	<div class="form-group">
		{!!Form::label('Proveedor','Proveedor:')!!}
		{!!Form::select('proveedor_id',$proveedor)!!}
	</div>

	    <div class="list-group ">
		{!!Form::label('men','Mensajero asignado:')!!}
		{!!Form::select('mensajero',$mensajero)!!}
	</div>

	<div class="form-group ">
	     {!!Form::label('texxto','Detalles de la(s) refaccion(enes) a solicitar:')!!}
		{!!Form::text('compras',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>

	<!-- DETALLES OCULTOS PARA EL TECNICO -->
	<div class="form-group ">
		{!!Form::label('costos','Precio:')!!}
		{!!Form::text('costo','**',['class'=>'form-control','placeholder'=>'Ingresa el costo de la refacción'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('comentarios','Comentarios:')!!}
	    {!!Form::textarea('comentario',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>




