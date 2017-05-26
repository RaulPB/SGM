@extends('layouts.admin')
	@section('content')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::open(['route'=>'compras.store', 'method'=>'POST'])!!}

	@include('compras.forms.usr')

	{!!Form::submit('Solicitar refacción',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	
	@stop