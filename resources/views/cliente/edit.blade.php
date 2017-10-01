@extends('layouts.admin')
@section('content')

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($cliente,['route'=> ['clientes.update',$cliente->id],'method'=>'PUT'])!!}
	@include('cliente.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Guardar cambios',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}



@stop

