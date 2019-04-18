@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif



@section('content')
<table class="table table-striped">
	<thead>
		<th>Id</th>
		<th>Emitio</th>
		<th>Recibio</th>
		<th>Fecha de transferencia</th>
		<th>Fecha de receppción</th>
		<th>Producto</th>
		<th>Cantidad</th>
		<th>Sucursal Origen</th>
		<th>Sucursal destino</th>
		<th>Comentarios</th>
		<th>Status</th>
	</thead>
	@foreach($salida as $sal)
	<tbody>
		<td>{{$sal -> id}}</td>
		<td>{{$sal -> realizo}}</td>
		<td>{{$sal -> recibio}}</td>
		<td>{{$sal -> created_at}}</td>
		<td>{{$sal -> updated_at}}</td>
		<td>{{$sal -> producto -> modelo}}</td> 
		<td>{{$sal -> cantidad}}</td>

		<?php
		$va0 = $sal -> origen;
		$idsucur0 = DB::table('sucursals')->where('id', '=', $va0)->pluck('nameS');
		?>

		<td>{{$idsucur0}}</td>

		<?php
		$va = $sal -> servicio_id;
		$idsucur = DB::table('sucursals')->where('id', '=', $va)->pluck('nameS');
		?>

		<td>{{$idsucur}}</td>
		<td>{{$sal -> comentarios}}</td>

		

		@if($sal -> status == 'Enviado')
							<td bgcolor="#f7f31b">{{$sal -> status}}</td>
		@endif

		@if($sal -> status == 'Recibido')
							<td bgcolor="#2f65c4">{{$sal -> status}}</td>
		@endif


		@endforeach
	</table>
	{!!$salida->render()!!}
	
	
	@stop