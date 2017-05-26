
	<div class="form-group ">
		{!!Form::label('Status','Status:')!!}
		{!!Form::select('status_id',$status)!!}
	</div>
	<div class="list-group ">
		{!!Form::label('men','Mensajero asignado:')!!}
		{!!Form::select('mensajero_id',$mensajero_id)!!}
	</div>
	<div class="form-group ">
	     {!!Form::label('texxto','Detalle de la recolección')!!}
		{!!Form::textarea('Detalle',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>

