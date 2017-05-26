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
			<th>No. salida</th>
			<th>Cantidad</th>
			<th>Servicio por el que se dio salida</th>
			<th>Producto</th>
			<th>Comentarios</th>
			<th>Fecha de salida</th>
			</thead>
			@foreach($salida as $sal)
		<tbody>
			<td>{{$sal -> id}}</td>
			<td>{{$sal -> cantidad}}</td>
			<td>{{$sal -> servicio_id}}</td>
			<td>{{$sal -> producto -> modelo}}</td> 
			<td>{{$sal -> comentarios}}</td>
			<td>{{$sal -> created_at}}</td>
			@endforeach
	</table>
{!!$salida->render()!!}
	
	
@stop