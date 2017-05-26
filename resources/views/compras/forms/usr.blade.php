    <div class="list-group ">
		{!!Form::label('Orden','Orden de servicio sobre la cual solicitar compra:')!!}
		{!!Form::select('servicio_id',$servicio)!!}
	</div>
	<div class="form-group ">
		{!!Form::label('Status','Status:')!!}
		{!!Form::select('status_id',$status)!!}
	</div>

<div>
<div class="panel-group col-md-13">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2">Detalles para compras</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
	<div class="form-group">
		{!!Form::label('Proveedor','Proveedor:')!!}
		{!!Form::select('proveedor_id',$proveedor)!!}
		
	</div>
	<div class="list-group ">
		{!!Form::label('men','Mensajero asignado:')!!}
		{!!Form::select('mensajero_id',$mensajero_id)!!}
	</div>
</div>
</div>
</div>
</div>
	<div class="form-group ">
	     {!!Form::label('texxto','Detalles de la(s) refaccion(enes) a solicitar:')!!}
		{!!Form::text('compras',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>

	<!-- DETALLES OCULTOS PARA EL TECNICO -->
	<div class="form-group ">
		{!!Form::hidden('costos','Precio:')!!}
		{!!Form::hidden('costo','**',['class'=>'form-control','placeholder'=>'Ingresa el costo de la refacción'])!!}
	</div>
	<div class="form-group">
		{!!Form::hidden('comen','Comentarios:')!!}
	    {!!Form::hidden('comentarios','**',['class'=>'form-control','placeholder'=>''])!!}
	</div>




