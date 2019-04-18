@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


@section('content')

{!! Form::open(['route' => 'precio.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
  <div class="form-group">
  	{!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Buscar por modelo']) !!} 
  </div> <!-- COLOCAMOS ID PORQUE ES LO QUE QUEREMOS FILTRAR-->
  <button type="submit" class="btn btn-default">Buscar</button>

{!! Form::close() !!}
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Categoria</th>
			<th>Sucursal</th>
			<th>Precio a público</th>
			</thead>
			@foreach($prod as $prods)
		<tbody>
			<td>{{$prods -> id}}</td>
			<td>{{$prods -> marca}}</td>
			<td>{{$prods -> modelo}}</td>
			<td>{{$prods -> categoria -> categoria}}</td>
			<?php
			$Z= $prods -> sucursal_id;
			$idsucur = DB::table('sucursals')->where('id', '=', $Z)->pluck('nameS');//id de sucursal
			echo "<td> $idsucur</td>"
			?>
			<td>{{$prods -> preciop}}</td>
		</tbody>
			@endforeach
	</table>
{!!$prod->render()!!}


@stop
