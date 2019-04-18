@extends('layouts.admin')
	@section('content')

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::open(['route'=>'producto2.store', 'method'=>'POST'])!!}

	@include('producto.forms.usr3')

	{!!Form::submit('Guardar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	
	@stop