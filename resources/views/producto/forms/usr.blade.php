
	<div class="form-group">
		{!!Form::label('marc','Marca:')!!}
		{!!Form::text('marca',null,['class'=>'form-control','placeholder'=>'Ingresa marca del producto'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('mod','Modelo:')!!}
		{!!Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Ingresa modelo del producto'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('pre','Costo de compra:')!!}
		{!!Form::text('precio',null,['class'=>'form-control','placeholder'=>'Ingresa costo de compra del producto'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('pre','Precio a publico:')!!}
		{!!Form::number('preciop',null,['class'=>'form-control','placeholder'=>'Ingresa costo de venta al publico'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('cant','Cantidad:')!!}
		{!!Form::number('cantidad',null,['class'=>'form-control','placeholder'=>'Ingresa cantidad de producto a guardar en inventario'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('Prov','Proveedor:')!!}
		{!!Form::select('proveedor_id',$prov)!!}
	</div>

	<div class="form-group">
		{!!Form::label('Cat','Categoria:')!!}
		{!!Form::select('categoria_id',$cat)!!}
	</div>

	<div class="form-group">
		{!!Form::label('Cati','Status:')!!}
		{!!Form::select('status',$st)!!}
	</div>



