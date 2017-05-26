@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($categoria,['route'=> ['categoria.update',$categoria->id],'method'=>'PUT'])!!}
	@include('categoria.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}
@stop