@extends('layouts.admin')
	@section('content')

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::open(['route'=>'garantia.store', 'method'=>'POST'])!!}

	@include('garantia.forms.usr')

	{!!Form::submit('Registrar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	@endsection