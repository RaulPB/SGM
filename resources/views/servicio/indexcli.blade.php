@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')


{!! Form::open(['route' => 'cliente.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('id', null, ['size' => '130x5','class' => 'form-control', 'placeholder' => 'Escribe el numero de tu orden']) !!}
  </div> <!-- COLOCAMOS IMEI PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <div>
  	<span class="glyphicon glyphicon-search"></span>
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Buscar orden</button>
{!! Form::close() !!}


	<table class="table table-striped">
		<thead>
			<th>No. Orden Servicio</th>
			<th>Cliente</th>
			<th>Status</th>
			<th>Fecha de entrega</th>
 
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
			<td>{{$servicios -> status -> status}}</td>



			<td>{{$servicios -> fechaentrega}}</td>
     

		</tbody>
		@endforeach

	</table>
{!!$servicio->render()!!}


@stop
