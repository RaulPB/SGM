@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')

{!! Form::open(['route' => 'servicio.show', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Numero de Orden']) !!} 
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}


	<table class="table table-striped">
		<thead>
			<th>No. Orden Servicio</th>
			<th>Cliente</th>
			<th>Tecnico asignado</th>
			<th>Status</th>
			<th>Fecha de entrega compromiso</th>
			<th>Fecha de entrega real</th>
			
		</thead>

		@foreach($servicio as $servicios)
		<tbody>
			<td>{{$servicios -> id}}</td>
			<td>{{$servicios -> nombrecliente}}</td>
			<td>{{$servicios -> tecnico -> name}}</td> <!--NECESITO ALCANZARLO POR METODO EN SERVICIO Y  -->
			<td>{{$servicios -> status -> status}}</td>
			<td>{{$servicios -> fechaentrega}}</td>
			<td>{{$servicios -> updated_at}}</td>
			</tbody>
		@endforeach
		
	</table>
{!!$servicio->render()!!}
	
	
@stop