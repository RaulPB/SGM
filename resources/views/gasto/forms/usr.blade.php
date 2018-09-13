	<div class="form-group col-md-12">
                 <h4>Genero gasto:</h4>
                 {!!Form::text('genero',Auth::user()->name,['class'=>'form-control','placeholder'=>'NOMBRE DEL RECEPTOR AUTOMATICO','readonly' => 'true'])!!}
    </div>
	<div class="form-group col-md-12">
		{!!Form::label('ga','Cantidad del gasto:')!!}
		{!!Form::text('gasto',null,['class'=>'form-control','placeholder'=>'$00.00'])!!}
	</div>

	<div class="form-group col-md-12"">
		{!!Form::label('ra','Razón del gasto:')!!}
		{!!Form::textarea('razon',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>


