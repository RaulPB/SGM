	<div class="form-group ">
	{!!Form::label('fechaingreso','fecha de recepcion:')!!}
	{!!Form::text('fechaingreso',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>	

	<div class="form-group">
	{!!Form::label('fechaentrega','fecha de entrega:')!!}
	{!!Form::text('fechaentrega',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>	



<div>
<div class="panel-group col-md-13">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2">Desplegar detalles de pagos</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">

	<div class="form-group">
	{!!Form::label('costo','Costo Público:')!!}
		{!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>
		<div class="form-group">
	{!!Form::label('costo ajustado','costo de reparación (Control Interno):')!!}
		{!!Form::text('costoajustado',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<div class="form-group">
	{!!Form::label('costo ajustado','Descripción de costos o ajustes (Control Interno):')!!}
	{!!Form::text('razon',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<!-- -->
</div>
</div>
</div>
</div>



<div>
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Desplegar detalles de la orden de servicio</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
     
	<div class="form-group">
		{!!Form::text('receptor',null,['class'=>'form-control','placeholder'=>'NOMBRE DEL RECEPTOR AUTOMATICO','readonly' => 'true'])!!}
	</div>
	<div class="form-group">
		{!!Form::text('nombrecliente',null,['class'=>'form-control','placeholder'=>'1.-Nombre Cliente','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		Telefono:{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'2.-Telefono Cliente','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		Celular:{!!Form::text('celular',null,['class'=>'form-control','placeholder'=>'3.-Celular Cliente','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		Email:{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'4.-Email del cliente','readonly' => 'true'])!!}
	</div>

	<div class="form-group col-md-4">
		Producto:{!!Form::text('producto',null,['class'=>'form-control','placeholder'=>'5.-Producto del cliente','readonly' => 'true'])!!}
	</div>

	<div class="form-group col-md-4">
		Marca:{!!Form::text('marca',null,['class'=>'form-control','placeholder'=>'6.-Marca del Producto','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		Modelo:{!!Form::text('modelo',null,['class'=>'form-control','placeholder'=>'7.-Modelo del Producto','readonly' => 'true'])!!}
	</div>

	<div class="form-group col-md-4">
		Tipo de producto:{!!Form::text('tipo',null,['class'=>'form-control','placeholder'=>'8.-Tipo Producto','readonly' => 'true'])!!}
	</div>


	<div class="form-group col-md-4">
		Color:{!!Form::text('color',null,['class'=>'form-control','placeholder'=>'9.-Color Producto','readonly' => 'true'])!!}
	</div>

	<div class="form-group col-md-4">
		Capacidad:{!!Form::text('capacidad',null,['class'=>'form-control','placeholder'=>'10.-Capacidad Producto','readonly' => 'true'])!!}
	</div>

	<div class="form-group col-md-4">
		Numero de serie:{!!Form::text('serie',null,['class'=>'form-control','placeholder'=>'11.-Serie Producto','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		IMEI:{!!Form::text('imei',null,['class'=>'form-control','placeholder'=>'12.-IMEI Producto','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		Contraseña:{!!Form::text('contraseña',null,['class'=>'form-control','placeholder'=>'13.-Contraseña Producto','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		Compañia{!!Form::text('compañia',null,['class'=>'form-control','placeholder'=>'14.-Compañia Producto','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Alguien intento reparalo?{!!Form::text('reparado',null,['class'=>'form-control','placeholder'=>'15.-¿Alguien intento reparar el equipo antes?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Estuvo en contacto con agua?,¿tipo?{!!Form::text('agua',null,['class'=>'form-control','placeholder'=>'16.-¿Estuvo en contacto con agua?,¿tipo?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Ingresa correctamente al sistema?{!!Form::text('ingresoso',null,['class'=>'form-control','placeholder'=>'17.-¿Ingresa correctamente al sistema?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Enciende?{!!Form::text('enciende',null,['class'=>'form-control','placeholder'=>'18.-¿Enciende?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona botón de encendido?{!!Form::text('benciende',null,['class'=>'form-control','placeholder'=>'19.-¿Funciona botón de encendido?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona botón de volumen?{!!Form::text('bvolumen',null,['class'=>'form-control','placeholder'=>'20.-¿Funciona botón de volumen?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona botón vibrador?{!!Form::text('bvibrador',null,['class'=>'form-control','placeholder'=>'21.-¿Funciona botón vibrador?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona pantalla?{!!Form::text('pantalla',null,['class'=>'form-control','placeholder'=>'22.-¿Funciona pantalla','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona touch?{!!Form::text('touch',null,['class'=>'form-control','placeholder'=>'23.-¿Funciona touch','readonly' => 'true'])!!}
	</div>

	<div class="form-group col-md-4">
		¿Funciona display?{!!Form::text('display',null,['class'=>'form-control','placeholder'=>'24.-¿Funciona display','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona camara trasera?{!!Form::text('ctrasera',null,['class'=>'form-control','placeholder'=>'25.-¿Funciona camara trasera','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona camara frontal?{!!Form::text('cfrontal',null,['class'=>'form-control','placeholder'=>'26.-¿Funciona camara frontal','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona centro de carga?{!!Form::text('ccarga',null,['class'=>'form-control','placeholder'=>'27.-¿Funciona centro de carga','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		Funciona altavoz?{!!Form::text('altavoz',null,['class'=>'form-control','placeholder'=>'28.-¿Funciona altavoz','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona microfono?{!!Form::text('microfono',null,['class'=>'form-control','placeholder'=>'29.-¿Funciona microfono','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona auricular?{!!Form::text('auricular',null,['class'=>'form-control','placeholder'=>'30.-¿Funciona auricular','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		Funciona bocina externa?{!!Form::text('boexterna',null,['class'=>'form-control','placeholder'=>'31.-¿Funciona bocina externa','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona jack de audio?{!!Form::text('jack',null,['class'=>'form-control','placeholder'=>'32.-¿Funciona jack de audio','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona wifi?{!!Form::text('wifi',null,['class'=>'form-control','placeholder'=>'33.-¿Funciona wifi','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona bluetooth?{!!Form::text('bluetooth',null,['class'=>'form-control','placeholder'=>'34.-¿Funciona bluetooth','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Datos móviles?{!!Form::text('datosm',null,['class'=>'form-control','placeholder'=>'35.-¿Datos móviles?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona bateria?{!!Form::text('bateria',null,['class'=>'form-control','placeholder'=>'36.-¿Funciona bateria?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona porta Sim?{!!Form::text('portasim',null,['class'=>'form-control','placeholder'=>'37.-¿Funciona porta Sim?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona SIM?'{!!Form::text('sim',null,['class'=>'form-control','placeholder'=>'38.- ¿Funciona SIM?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona boton home?{!!Form::text('bhome',null,['class'=>'form-control','placeholder'=>'39.- ¿Funciona boton home?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona Touch ID?{!!Form::text('touchid',null,['class'=>'form-control','placeholder'=>'40.- ¿Funciona Touch ID?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona sensor de proximidad?{!!Form::text('sensorp',null,['class'=>'form-control','placeholder'=>'41.- ¿Funciona sensor de proximidad?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Golpes en carcasa?{!!Form::text('carcasa',null,['class'=>'form-control','placeholder'=>'42.- ¿Golpes en carcasa?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Funciona Teclado?{!!Form::text('teclado',null,['class'=>'form-control','placeholder'=>'43.- ¿Funciona Teclado?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Tiene Señal?{!!Form::text('señal',null,['class'=>'form-control','placeholder'=>'44.- ¿Tiene Señal?','readonly' => 'true'])!!}
	</div>
	<div class="form-group col-md-4">
		¿Que problema presenta el equipo?{!!Form::text('problemacliente',null,['class'=>'form-control','placeholder'=>'45.- ¿Que problema presenta el equipo?','readonly' => 'true'])!!}
	</div>
		<div class="form-group col-md-4">
		¿Que solución desea?{!!Form::text('solucion1',null,['class'=>'form-control','placeholder'=>'46.- ¿Que solución desea?','readonly' => 'true'])!!}
	</div>
	<div class="form-group">
		DIAGNOSTICO DE RECEPCIÓN{!!Form::textarea('diagnostico1',null,['class'=>'form-control','placeholder'=>'47.-DIAGNOSTICO DE RECEPCIÓN','readonly' => 'true'])!!}
	</div>
	

<!--DATOS DE DIAGNOSTICO POR PARTE DE LOS TECNICOS-->
	<div class="form-group">
		{!!Form::textarea('diagnostico2',null,['class'=>'form-control','placeholder'=>'DIAGNOSTICO DE TECNICO'])!!}
	</div>
<!--VAMOS A INGRESAR LOS DATOS DE USUARIO ASIGNADO, TECNICO ASIGNADO, STATUS, PRIVEEDOR -->
	<div class="form-group">
		{!!Form::label('Status','Status:')!!}
		{!!Form::select('status_id',$status)!!}
	</div>

		<div class="form-group">
		{!!Form::label('tecnico','Tecnico Asignado por especialidad:')!!}
		{!!Form::select('tecnico_id',$user)!!}
	</div>

	<div class="form-group">
		{!!Form::label('garantia','Tiempo asignado de garantia:')!!}
		{!!Form::select('garantia',$garantia)!!}
	</div>


    </div>
  </div>
</div>
</div>
