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
			<th>No. proveedor</th>
			<th>Proveedor</th>
			<th>Tipo</th>
			<th>Acciones</th>
			</thead>
			@foreach($prov as $provs)
		<tbody>
			<td>{{$provs -> id}}</td>
			<td>{{$provs -> proveedor}}</td>
			<td>{{$provs -> tipo}}</td>
			<td>{!!link_to_route('proveedor.edit', $title = 'Visualizar', $parameters = $provs->id, $attributes = ['class'=>'btn btn-info btn-lg btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$prov->render()!!}
	
	
@stop