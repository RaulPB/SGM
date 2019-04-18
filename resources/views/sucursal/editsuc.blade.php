@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($sucursal,['route'=> ['sucursal.update',$sucursal->id],'method'=>'PUT'])!!}
	@include('sucursal.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar / Activar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}

	   <a href="" data-target="#modal-delete-{{$sucursal->id}}" data-toggle="modal"><button class="btn btn-danger btn-lg btn-block">Dar de baja la sucursal</button></a>
	  @include('sucursal.forms.modal')
	  

@stop