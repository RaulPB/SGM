	<div class="form-group">
		{!!Form::label('fechaingreso','Fecha de recepción:')!!}
		{!!Form::date('fechaingreso', \Carbon\Carbon::now())!!}
	</div>	
	<div class="form-group">
		{!!Form::label('fechaentrega','Fecha de entrega:')!!}
		{!!Form::date('fechaentrega', \Carbon\Carbon::now())!!}
	</div>	
	<div class="form-group">
		{!!Form::textarea('diagnostico2',null,['class'=>'form-control','placeholder'=>'DIAGNOSTICO DE TECNICO'])!!}
	</div>

<!--	<div class="form-group">
		{!!Form::label('fechanotifica','Notificación al cliente de servicio terminado:')!!}
		{!!Form::date('fechanotifica', \Carbon\Carbon::now())!!}
	</div>	-->