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
$error = Session::get('msg1');
//echo "<script type='text/javascript'>
//alert('Atención: '+'$message');
//</script>";
 echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
   <script>

   swal('$message')
   
   </script>";
if ($error != ""){
	echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
   <script>

   //swal('$error')
   swal('Atención!', '$error', 'error')
   
   </script>";
}

 
?>




	{!!Form::open(['route'=>'servicio.store', 'method'=>'POST'])!!}

	@include('servicio.forms.usr')

	
	{!!Form::close()!!}

	@endsection
