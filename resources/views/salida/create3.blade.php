@extends('layouts.admin')
	@section('content')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::open(['route'=>'salida2.store', 'method'=>'POST'])!!}

	@include('salida.forms.usr')

	{!!Form::submit('Dar salida',['class'=>'btn btn-danger btn-lg btn-block'])!!}
	{!!Form::close()!!}
	
	@stop