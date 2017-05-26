@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
@section('content')



{!! Form::open(['route' => 'tecnico.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}

  <div class="form-group">
  	{!! Form::text('imei', null, ['class' => 'form-control', 'placeholder' => 'IMEI']) !!} 
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}


	<table class="table table-striped">
		<thead>
			<th>No. Orden Servicio</th>
			<th>Cliente</th>
			<th>Tecnico asignado</th>
			<th>Status</th>
			<th>Fecha de entrega</th>
			<th>Operaciones</th>
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

			@if($servicios->status_id == '7' and  $dif > 432000)<!-- Validando despues de 5 dias habiles MORADO-->
							<td bgcolor="#D7BDE2">{{$servicios -> status -> status}}</td>
			@endif

			@if($servicios->status_id == '7' and  $dif < 432000)<!-- Validando antes de 5 dias habiles AZUL-->
							<td bgcolor="#5499C7">{{$servicios -> status -> status}}</td>
			@endif

			@if($servicios->status_id <> '7' and  $dif2 < 172800 and $dif2 > 1)<!-- Orden no entregada y en menos de 2 dias NARANJA-->
							<td bgcolor="#F1C40F">{{$servicios -> status -> status}}</td>
			@endif
			@if($servicios->status_id <> '7' and  $dif2 > 172800 )<!-- Orden no entregada y con mas de 2 dias VERDE-->
							<td bgcolor="#229954">{{$servicios -> status -> status}}</td>
			@endif
			@if($servicios->status_id <> '7' and  $dif3 > 0)<!-- Orden no entregada y RETRASADA ROJO-->
							<td bgcolor="#CB4335">{{$servicios -> status -> status}}</td>
			@endif

			
			<td>{{$servicios -> fechaentrega}}</td>
			<td>{!!link_to_route('tecnico.edit', $title = 'Revisar', $parameters = $servicios->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		</tbody>
		@endforeach
		
	</table>
{!!$servicio->render()!!}
	
	
@stop