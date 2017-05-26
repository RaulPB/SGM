	<div class="form-group ">
		{!!Form::label('encuestas','Orden de servicio a la que se agrega archivo')!!}
		{!!Form::select('orden',$serv)!!}
	</div>

	<div class="form-group">
		{!!Form::label('ob','Observaciones:')!!}
		{!!Form::text('observaciones',null,['class'=>'form-control','placeholder'=>'¿Que observaciones tiene acerca del equipo?'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('archivo','Archivo:')!!}
		{!!Form::file('path')!!}
	</div>
	