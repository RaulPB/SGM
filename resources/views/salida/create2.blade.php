@extends('layouts.admin')
	@section('content')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->

	{!!Form::model($serv,['route'=> ['salida.update',$serv->id],'method'=>'PUT'])!!}

	@include('salida.forms.usr2')

	
	{!!Form::close()!!}

      <a href="" data-target="#modal-delete-{{$serv->id}}" data-toggle="modal"><button class="btn btn-primary btn-lg btn-block">Recibir</button></a>
	  @include('salida.forms.modal')
	  
	
	@stop