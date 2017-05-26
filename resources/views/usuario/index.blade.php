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
			<th>Perfil</th>
			<th>Sucursal</th>
			<th>Operaciones</th>
			</thead>
			@foreach($users as $user)
		<tbody>
			<td>{{$user -> name}}</td>
			<td>{{$user -> perfil -> perfil}}</td>
			<td>{{$user -> sucursal -> nameS}}</td>
			<td>{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$users->render()!!}
	
	
@stop