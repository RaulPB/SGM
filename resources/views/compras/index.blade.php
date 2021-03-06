@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@section('content')

{!! Form::open(['route' => 'compras.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('servicio_id', null, ['class' => 'form-control', 'placeholder' => 'Orden de servicio']) !!} 
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}


<table class="table table-striped">
		<thead>
			<th>Servicio que solicita</th>
			<th>Refacción solicitada</th>
			<th>Status de solicitud</th>
			<th>Fecha de solicitud</th>
		</thead>
		@foreach($comp as $comps)
		<tbody>
		<td>{{$comps->servicio_id}}</td>
		<td>{{$comps->compras}}</td>
		<td>{{$comps->status -> status}}</td> <!--status es el metodo y luego status es el nombre del campo que esta en la tabla-->
		<td>{{$comps->created_at}}</td>
			
			<td>{!!link_to_route('compras.edit', $title = 'Revisar', $parameters = $comps->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		@endforeach
		</tbody>
	</table>

	
	{!!$comp->render()!!}
	
	
@stop