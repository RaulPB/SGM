@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($user,['route'=> ['usuario.update',$user->id],'method'=>'PUT'])!!}
	@include('usuario.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
	
	{!!Form::open(['route'=> ['usuario.destroy',$user->id],'method'=>'DELETE'])!!}
	{!!Form::submit('Eliminar',['class'=>'btn btn-danger btn-lg btn-block'])!!}
	{!!Form::close()!!}

@stop