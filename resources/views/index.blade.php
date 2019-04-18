@extends('layouts.principal')
	@section('content')
	@include('alerts.errors') <!-- ANOTAMOS EL ERROR Y LO PODEMOS MOSTRAR EN LA VISTA-->
	@include('alerts.request')<!-- ANOTAMOS EL ERROR Y LO PODEMOS MOSTRAR EN LA VISTA para el logueo-->
				<div class="header">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"></a>
				</div>
			</div>
			<div >
				{!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
					<div class="form-group" align="center">
						
						{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Email'])!!}
							
					</div>
					<div class="form-group" align="center">
							
						{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Password'])!!}
						
					</div>
					{!!Form::submit('Iniciar sesión',['class'=>'btn btn-primary btn-block'])!!}
				{!!Form::close()!!}
		
		</div>
		
	@endsection	