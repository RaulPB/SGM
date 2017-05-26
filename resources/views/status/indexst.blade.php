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
			<th>Status</th>
			<th>Operaciones</th>
		</thead>
		@foreach($status as $statu)
		<tbody>
		<td>{{$statu->status}}</td>
			
			<td>{!!link_to_route('status.edit', $title = 'Editar', $parameters = $statu->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		@endforeach
		</tbody>
	</table>

	
	{!!$status->render()!!}
	
	
@stop