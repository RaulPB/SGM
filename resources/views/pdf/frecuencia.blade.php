 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

               
    @extends('layouts.admin')
    @section('content')

    @include('alerts.request') <!-- ESTA VISTA ES LA QUE MUESTRA EL METODO QUE LANZA LAS ALERTAS-->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

   {!!Form::open(['route'=>'reimpn.store', 'method'=>'POST'])!!} <!--CAMBIAR LA RUTA DE ECUESTA.STORE-->

                <div class="form-group col-md-12">
                 {!!Form::label('fechaingreso','Fecha de consulta:')!!}
                 {!!Form::date('fechainicial', \Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>''])!!}
               </div>
               <div class="form-group col-md-12">
                {!!Form::label('selec','Seleccione la sucursal:')!!}
                {!!Form::select('cliente',$clientes)!!}
                </div>


    {!!Form::submit('GENERAR REPORTE DE AFLUENCIA DE CLIENTES',['class'=>'btn btn-primary btn-lg btn-block'])!!}
    {!!Form::close()!!}
    @stop
