@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
	@section('content')

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::open(['route'=>'gasto.store', 'method'=>'POST'])!!}

	@include('gasto.forms.usr')

	{!!Form::submit('Registrar',['class'=>'btn btn-danger btn-lg btn-block'])!!}
	{!!Form::close()!!}
	@endsection