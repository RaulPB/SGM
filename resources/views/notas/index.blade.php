@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')

  {!! Form::open(['route' => 'reimpn.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
    <div class="form-group">
    	{!! Form::text('venta', null, ['class' => 'form-control', 'placeholder' => 'Buscar por orden']) !!}
    </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
    <button type="submit" class="btn btn-default">Buscar</button>
  {!! Form::close() !!}


	<table class="table table-striped">
		<thead>
			<th>Orden Servicio</th>
      <th>Nota de venta</th>
			<th>Fecha de emisión</th>
			<th>Opciones</th>

		</thead>

@foreach($notas as $nota)
		<tbody>
			<td>{{$nota -> venta}}</td>
			<td>{{$nota -> nota}}</td>
  		<td>{{$nota -> created_at}}</td>
			<td>{!!link_to_route('reimpn.show', $title = 'Imprimir', $parameters = $nota->id, $attributes = ['class'=>'btn btn-info'])!!}</td>
			</tbody>
@endforeach

	</table>
{!!$notas->render()!!}


@stop
