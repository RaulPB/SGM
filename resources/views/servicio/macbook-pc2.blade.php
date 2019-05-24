@extends('layouts.admin')
	@section('content')

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($servicio,['route'=> ['servicio.update',$servicio->id],'method'=>'PUT','name'=>'ok'])!!}
	@include('servicio.forms.macbook') <!-- APUNTA A LA VISTA DEL FORMULARIO-->

	{!!Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}

	@endsection


	<!--ESTE MODULO ES PARA EVITAR MOSTRAR EL BOTON DE ACTUALIZAR AL USUARIO OMNI Y QUE CAMBIE VALORES-->