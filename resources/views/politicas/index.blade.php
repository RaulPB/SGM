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
			<th>Ubicación</th>
			<th>Politicas, Avisos, Especificaciones</th>
			<th>Operaciones</th>
		</thead>
		@foreach($poli as $polis)
		<tbody>
		<td>{{$polis->autoriza}}</td>
		<td>{{$polis->politicas}}</td>
		<td>{!!link_to_route('politica.edit', $title = 'Editar', $parameters = $polis->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		@endforeach
		</tbody>
	</table>

	
	{!!$poli->render()!!}
	
	
@stop