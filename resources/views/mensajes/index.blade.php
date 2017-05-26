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
			<th>Mensaje</th>
			<th>Operaciones</th>
		</thead>
		@foreach($sucur as $sucurs)
		<tbody>
		<td>{{$sucurs->mensaje}}</td>
			
			<td>{!!link_to_route('mensajes.edit', $title = 'Editar', $parameters = $sucurs->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		@endforeach
		</tbody>
	</table>

	
	{!!$sucur->render()!!}
	
	
@stop