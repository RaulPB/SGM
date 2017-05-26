@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')


{!! Form::open(['route' => 'envre2.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('mensajero_id', null, ['class' => 'form-control', 'placeholder' => 'Filtrar por mensajero']) !!} 
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}


	<table class="table table-striped">
		<thead>
			<th>No. Orden Servicio</th>
			<th>Mensajero asignado</th>
			<th>Status</th>
			<th>Fecha de solicitud</th>
			<th>Operaciones</th>
		</thead>

		@foreach($recole as $recoles)
		<tbody>
			<td>{{$recoles -> servicio_id}}</td>
			<td>{{$recoles -> mensajero_id}}</td>
			<td>{{$recoles -> status_id}}</td> <!--NECESITO ALCANZARLO POR METODO EN SERVICIO Y  -->
			<td>{{$recoles -> created_at}}</td>
			<td>{!!link_to_route('envre2.edit', $title = 'Revisar', $parameters = $recoles->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		</tbody>
		@endforeach
		
	</table>
{!!$recole->render()!!}
	
	
@stop