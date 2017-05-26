@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($comp,['route'=> ['compras.update',$comp->id],'method'=>'PUT'])!!}
	@include('compras.forms.usr2') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Finalizar Revisión/ Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}


@stop