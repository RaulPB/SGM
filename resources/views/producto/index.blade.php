@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


@section('content')

{!! Form::open(['route' => 'producto.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('categoria', null, ['class' => 'form-control', 'placeholder' => 'Buscar por modelo']) !!}
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>

{!! Form::close() !!}
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Cantidad</th>
			<th>Categoria</th>
			<th>Proveedor</th>
			<th>Incrementar Inventario</th>
			</thead>
			@foreach($prod as $prods)
		<tbody>
			<td>{{$prods -> id}}</td>
			<td>{{$prods -> marca}}</td>
			<td>{{$prods -> modelo}}</td>
			<td>{{$prods -> cantidad}}</td>
			<td>{{$prods -> categoria -> categoria}}</td>
			<td>{{$prods -> proveedor -> proveedor}}</td>
			<td>{!!link_to_route('producto.edit', $title = 'Edición', $parameters = $prods->id, $attributes = ['class'=>'btn btn-warning
 btn-md btn-block'])!!}</td>
		</tbody>
			@endforeach
	</table>
{!!$prod->render()!!}


@stop
