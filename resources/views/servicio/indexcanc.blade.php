@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')
	<table class="table table-striped">
		<thead>
			<th># Servicio</th>
			<th>Cliente</th>
			<th>Tecnico asignado</th>
			<th>Status</th>

			
		</thead>

		@foreach($servicio as $servicios)
		<tbody>
			<td>{{$servicios -> id}}</td>
			<td>{{$servicios -> nombrecliente}}</td>
			<td>{{$servicios -> tecnico -> name}}</td> <!--NECESITO ALCANZARLO POR METODO EN SERVICIO Y  -->
			<td>{{$servicios -> status -> status}}</td>

			</tbody>
		@endforeach
		
	</table>
{!!$servicio->render()!!}
	
	
@stop