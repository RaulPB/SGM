@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')


{!! Form::open(['route' => 'envre.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'No. de recolección']) !!} 
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}


	<table class="table table-striped">
		<thead>
		    <th>No. Recolección</th>
			<th>Mensajero asignado</th>
			<th>Status</th>
			<th>Fecha de solicitud</th>
			<th>Operaciones</th>
		</thead>

		@foreach($recole as $recoles)
		<tbody>
		<td>{{$recoles -> id}}</td>
			<td>{{$recoles -> mensajero -> name}}</td>
			<td>{{$recoles -> status -> status}}</td> <!--NECESITO ALCANZARLO POR METODO EN SERVICIO Y  -->
			<td>{{$recoles -> created_at}}</td>
			<td>{!!link_to_route('envre.edit', $title = 'Revisar', $parameters = $recoles->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		</tbody>
		@endforeach
		
	</table>
{!!$recole->render()!!}
	
	
@stop