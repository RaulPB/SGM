@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($sucursal,['route'=> ['sucursal.update',$sucursal->id],'method'=>'PUT'])!!}
	@include('sucursal.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}

	
	{!!Form::open(['route'=> ['sucursal.destroy',$sucursal->id],'method'=>'DELETE'])!!}
	{!!Form::submit('Eliminar venta',['class'=>'btn btn-danger btn-lg btn-block'])!!}
	{!!Form::close()!!}

@stop