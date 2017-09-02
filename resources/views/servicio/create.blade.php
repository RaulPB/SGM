@extends('layouts.admin')
	@section('content')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->
<?
$message = $dire;
echo "<script type='text/javascript'>
alert('Atención: '+'$message');
</script>";
?>

	{!!Form::open(['route'=>'servicio.store', 'method'=>'POST'])!!}

	@include('servicio.forms.usr')

	{!!Form::submit('Registrar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
	{!!Form::close()!!}

	@endsection
