@extends('layouts.admin')
	@section('content')

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
	{!!Form::open(['route'=>'encuesta.store', 'method'=>'POST'])!!}

	@include('encuesta.forms.usr')

	{!!Form::submit('Guardar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	@endsection
