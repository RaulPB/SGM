@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($politica,['route'=> ['politica.update',$politica->id],'method'=>'PUT'])!!}
	@include('politicas.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar politica',['class'=>'btn btn-warning btn-lg btn-block'])!!}
	{!!Form::close()!!}


	

@stop