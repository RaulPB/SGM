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
			<th>Nombre</th>
			<th>Telefono</th>
			<th>E-mail</th>
			<th>RFC</th>
			<th>Operaciones</th>
			</thead>
			@foreach($cliente as $cli)
		<tbody>
			<td>{{$cli -> cliente}}</td>
			<td>{{$cli -> telefono}}</td>
			<td>{{$cli -> correo}}</td>
			<td>{{$cli -> facturacion}}</td>
			<td>{!!link_to_route('clientes.edit', $title = 'Revisar', $parameters = $cli->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$cliente->render()!!}
	
	
@stop