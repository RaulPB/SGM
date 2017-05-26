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
			<th>Id</th>
			<th>Categoria</th>
			<th>Operaciones</th>
			</thead>
			@foreach($categoria as $catego)
		<tbody>
			<td>{{$catego -> id}}</td>
			<td>{{$catego -> categoria}}</td>
			<td>{!!link_to_route('categoria.edit', $title = 'Edición', $parameters = $catego->id, $attributes = ['class'=>'btn btn-warning
 btn-md btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$categoria->render()!!}
	
	
@stop