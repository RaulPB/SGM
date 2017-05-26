@extends('layouts.admin')
	@section('content')

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::open(['route'=>'archivo.store', 'method'=>'POST','files'=>true])!!}

	@include('archivo.forms.usr')

	{!!Form::submit('Guardar archivo',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	@endsection