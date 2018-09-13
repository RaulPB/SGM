@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')


{!! Form::open(['route' => 'asistencia.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('nombrecliente', null, ['class' => 'form-control', 'placeholder' => 'Nombre del cliente']) !!}
  </div> <!-- COLOCAMOS IMEI PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}


	<table class="table table-striped">
		<thead>
			<th>No. Orden Servicio</th>
			<th>Cliente</th>
			<th>Tecnico asignado</th>
			<th>Status</th>
			<th>Fecha de recepción</th>
			<th>Acceder</th>
		</thead>


		</thead>

		@foreach($servicio as $servicios)
		<tbody>
		<?
			$hola=\Carbon\Carbon::now();
			$hola2=$servicios -> fechanotifica;
			$hola3=$servicios -> fechaentrega;
			$timestamp1 = strtotime($hola);
			$timestamp2 = strtotime($hola2);
			$timestamp3 = strtotime($hola3);
			$dif=$timestamp1-$timestamp2;//32000 segundo es equivalente a 5 dias
			$dif2=$timestamp3-$timestamp1;//en tiempo mayor o menor a 2 dias
			$dif3=$timestamp1-$timestamp3;//ordenes atrasadas-
		?>
			<td>{{$servicios -> id}}</td>
			<td>{{$servicios -> nombrecliente}}</td>
			<td>{{$servicios -> tecnico -> name}}</td> <!--NECESITO ALCANZARLO POR METODO EN SERVICIO Y  -->
			<td>{{$servicios -> status -> status}}</td>
			<td>{{$servicios -> created_at}}</td>
			<td>{!!link_to_route('servicio.edit', $title = 'Revisar', $parameters = $servicios->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>

		</tbody>
		@endforeach

	</table>
{!!$servicio->render()!!}


@stop
