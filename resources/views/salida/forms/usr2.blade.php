	<?php
		$origen = $serv -> origen;
		$idsucur0 = DB::table('sucursals')->where('id', '=', $origen)->pluck('nameS');

    $destino = $serv -> servicio_id;
    $idsucur1 = DB::table('sucursals')->where('id', '=', $destino)->pluck('nameS');

		$producto = $serv->producto_id;
		$produc = DB::table('productos')->where('id', '=', $producto)->pluck('modelo');
	?>

	<div class="form-group col-md-12">
              {!!Form::label('fechaingreso','No.de transferencia:')!!}
              {!!Form::text('origen', $serv->id,['class'=>'form-control','placeholder'=>'','readonly'=> 'true'])!!}

    </div>

	   <div class="form-group col-md-12">
              {!!Form::label('fechaingreso','Sucursal origen:')!!}
              {!!Form::text('origen', $idsucur0,['class'=>'form-control','placeholder'=>'','readonly'=> 'true'])!!}

    </div>

    <div class="form-group col-md-12">
              {!!Form::label('fechaingreso','Sucursal destino:')!!}
              {!!Form::text('servicio_id', $idsucur1,['class'=>'form-control','placeholder'=>'','readonly'=> 'true'])!!}

    </div>

    <div class="form-group col-md-12">
              {!!Form::label('fechaingreso','Producto:')!!}
              {!!Form::text('origen',$produc,['class'=>'form-control','placeholder'=>'','readonly'=> 'true'])!!}

    </div>

	<div class="form-group col-md-12">
              {!!Form::label('fechaingreso','Cantidad:')!!}
              {!!Form::text('origen', $serv->cantidad,['class'=>'form-control','placeholder'=>'','readonly'=> 'true'])!!}

    </div>

    <div class="form-group col-md-12">
              {!!Form::label('fechaingreso','Comentarios:')!!}
              {!!Form::textarea('origen', $serv->comentarios,['class'=>'form-control','placeholder'=>'','readonly'=> 'true'])!!}
    </div>

    <div class="form-group col-md-12">
              
              {!!Form::hidden('status', "Recibido",['class'=>'form-control','placeholder'=>'','readonly'=> 'true'])!!}
    </div>





