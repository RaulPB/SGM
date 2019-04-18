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
			<th>Nombre de Sucursal</th>
			<th>Status de Sucursal</th>
			<th>Operaciones</th>
		</thead>
		@foreach($sucur as $sucurs)
		<tbody>
		<td>{{$sucurs->nameS}}</td>
		<td>{{$sucurs->status}}</td>
			<td>{!!link_to_route('sucursal.edit', $title = 'Editar', $parameters = $sucurs->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		@endforeach
		</tbody>
	</table>

	
	{!!$sucur->render()!!}
	
	
@stop