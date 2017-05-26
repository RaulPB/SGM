@extends('layouts.admin')
@section('content')
	
	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

<?
$message = $dire;
echo "<script type='text/javascript'>
alert('Direccion del proveedor seleccionado '+'$message');

</script>";
?>


	{!!Form::model($comp,['route'=> ['compram.update',$comp->id],'method'=>'PUT'])!!}
	@include('mensajero.forms.usr') <!-- APUNTA A LA VISTA DEL FORMULARIO-->
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}



@stop