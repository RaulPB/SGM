@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


@section('content')

{!! Form::open(['route' => 'archivo.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('idserv', null, ['class' => 'form-control', 'placeholder' => 'ID servicio']) !!} 
  </div> <!-- COLOCAMOS IMEI PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}

<table class="table table-striped">
		<thead>
			<th>Servicio</th>
			<th>Observaciones</th>
			<th>Evidencia</th>
		</thead>
		@foreach($servicio as $servicios)
		<tbody>
		<td>{{$servicios->idserv}}</td>
		<td>{{$servicios->observaciones}}</td>
		<td>
		<img src="archivos/{{$servicios->path}}" alt="" style="width:100px;"/>
		</td>
		@endforeach
		</tbody>
	</table>

	
	{!!$servicio->render()!!}
	
	
@stop