@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($mensaje,['route'=> ['mensajes.update',$mensaje->id],'method'=>'PUT'])!!}
	@include('mensajes.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}


	

@stop