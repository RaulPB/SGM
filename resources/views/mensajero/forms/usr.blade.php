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
		{!!Form::select('mensajero_id',$mensajero_id)!!}
	</div>

	<div class="form-group ">
	     {!!Form::label('texxto','Detalles de la(s) refaccion(enes) a solicitar:')!!}
		{!!Form::text('compras',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>

	<!-- DETALLES OCULTOS PARA EL TECNICO -->
	<div class="form-group ">
		{!!Form::label('costos','Precio:')!!}
		{!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('comentarios','Comentarios:')!!}
	    {!!Form::textarea('comentarios',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>



