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
			<th>Garantia</th>
			<th>Operaciones</th>
		</thead>
		@foreach($gar as $gars)
		<tbody>
		<td>{{$gars->garantia}}</td>
			
			<td>{!!link_to_route('garantia.edit', $title = 'Editar', $parameters = $gars->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		@endforeach
		</tbody>
	</table>

	
	{!!$gar->render()!!}
	
	
@stop