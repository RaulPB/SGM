<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
$(document).ready(function(){
    //$("#editor1").click(function(){

    	$("#editor1").blur(function(){
        var clicks = editor1.value//Valor total
        var clicks2 = editor2.value
        var clicks3 = editor3.value
        var clicks4 = editor1.value-editor2.value-editor3.value
        //alert(clicks4);
       // $("#total").value("hola");
       $("#total").attr("value",clicks4);
    });
    
      $("#editor2").blur(function(){
        var clicks = editor1.value//Valor total
        var clicks2 = editor2.value
        var clicks3 = editor3.value
        var clicks4 = editor1.value-editor2.value-editor3.value
       // alert(clicks4);
        //$("#total").value("hola");
        $("#total").attr("value",clicks4);
    });

       $("#editor3").blur(function(){
        var clicks = editor1.value//Valor total
        var clicks2 = editor2.value
        var clicks3 = editor3.value
        var clicks4 = editor1.value-editor2.value-editor3.value
       	//alert(clicks4);
        //$(#total).value("hola");
        
        $("#total").attr("value",clicks4);
    });

});
</script>

<script>
$(function() {
  


        var clicks = editor1.value//Valor total
        var clicks2 = editor2.value
        var clicks3 = editor3.value
        var clicks4 = editor1.value-editor2.value-editor3.value
       	//alert(clicks4);
        //$(#total).value("hola");
        
        $("#total").attr("value",clicks4);


});
</script>



	<div id="p1" class="form-group col-md-4" >
	{!!Form::label('fechaingreso','fecha de recepcion:')!!}
	{!!Form::text('fechaingreso',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>	


	<div class="form-group col-md-4">
	{!!Form::label('fechaentrega','fecha de entrega:')!!}
	{!!Form::text('fechaentrega',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>	

	<div class="form-group col-md-4" id="c1">
		{!!Form::label('fechanotificar','Fecha de notificaciónes a cliente:')!!}
		{!!Form::date('fechanotifica', \Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
		
	</div>	

	<div class="form-group"">
	{!!Form::label('costol','Costo Publico:')!!}
		{!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'','id'=>'editor1'])!!}
	</div>


	<div class="form-group col-md-4 ">
		{!!Form::label('tipopago1','Tipo de pago 1:')!!}
		{!!Form::select('tipopago1',$pagor)!!}
	</div>

		<div class="form-group col-md-4">
		{!!Form::label('fechaingreso','Fecha 1:')!!}
		{!!Form::text('fechapago1',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>	


	<div class="form-group col-md-4">
		{!!Form::label('abonos1','Cantidad 1:')!!}
		{!!Form::text('abono1',null,['class'=>'form-control','placeholder'=>'','id'=>'editor2'])!!}
	</div>

		<div class="form-group col-md-4">
		{!!Form::label('tipopago1','Tipo pago 2:')!!}
		{!!Form::select('tipopago2',$pagor)!!}
	</div>

		<div class="form-group col-md-4">
		{!!Form::label('fechaingreso','Fecha 2:')!!}
		{!!Form::text('fechapago2',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>

	<div class="form-group col-md-4">
		{!!Form::label('abonos1','Cantidad 2:')!!}
		{!!Form::text('abono2',null,['class'=>'form-control','placeholder'=>'','id'=>'editor3'])!!}
	</div>
		<div class="form-group">
		{!!Form::label('rest','Cantidad Restante:')!!}
		{!!Form::text('resta',null,['class'=>'form-control','placeholder'=>'','id'=>'total'])!!}
	</div>

		<!--DATOS DE COSTO POR DELIVERACION DE LAS PARTES INVOLUCRADAS INICIALIZADAS EN 0 Y OCULTAS-->

	<div class="form-group">
	{!!Form::label('costo ajustado','costo de reparación (Control Interno):')!!}
		{!!Form::text('costoajustado',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<div class="form-group">
	{!!Form::label('costo ajustado','Descripción de costos o ajustes (Control Interno):')!!}
	{!!Form::text('razon',null,['class'=>'form-control','placeholder'=>''])!!}
	</div>
	<!-- -->

<div>
<div class="panel-group col-md-14">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Desplegar orden de servicio</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
     
	<div class="form-group">
		{!!Form::text('receptor',null,['class'=>'form-control','placeholder'=>'NOMBRE DEL RECEPTOR AUTOMATICO','readonly' => 'true'])!!}
	</div>
	<div class="form-group">
		{!!Form::text('nombrecliente',null,['class'=>'form-control','placeholder'=>'1.-Nombre Cliente'])!!}
	</div>
	<div class="form-group col-md-4">

		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'2.-Telefono Cliente'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('celular',null,['class'=>'form-control','placeholder'=>'3.-Celular Cliente'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'4.-Email del cliente'])!!}
	</div>

	<div class="form-group col-md-4">
		{!!Form::text('producto',null,['class'=>'form-control','placeholder'=>'5.-Producto del cliente'])!!}
	</div>

	<div class="form-group col-md-4">
		{!!Form::text('marca',null,['class'=>'form-control','placeholder'=>'6.-Marca del Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('modelo',null,['class'=>'form-control','placeholder'=>'7.-Modelo del Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('tipo',null,['class'=>'form-control','placeholder'=>'8.-Tipo Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('color',null,['class'=>'form-control','placeholder'=>'9.-Color Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('capacidad',null,['class'=>'form-control','placeholder'=>'10.-Capacidad Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('serie',null,['class'=>'form-control','placeholder'=>'11.-Serie Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('imei',null,['class'=>'form-control','placeholder'=>'12.-IMEI Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('contraseña',null,['class'=>'form-control','placeholder'=>'13.-Contraseña Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('compañia',null,['class'=>'form-control','placeholder'=>'14.-Compañia Producto'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('reparado',null,['class'=>'form-control','placeholder'=>'15.-¿Alguien intento reparar el equipo antes?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('agua',null,['class'=>'form-control','placeholder'=>'16.-¿Estuvo en contacto con agua?,¿tipo?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('ingresoso',null,['class'=>'form-control','placeholder'=>'17.-¿Ingresa correctamente al sistema?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('enciende',null,['class'=>'form-control','placeholder'=>'18.-¿Enciende?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('benciende',null,['class'=>'form-control','placeholder'=>'19.-¿Funciona botón de encendido?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('bvolumen',null,['class'=>'form-control','placeholder'=>'20.-¿Funciona botón de volumen?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('bvibrador',null,['class'=>'form-control','placeholder'=>'21.-¿Funciona botón vibrador?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('pantalla',null,['class'=>'form-control','placeholder'=>'22.-¿Funciona pantalla'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('touch',null,['class'=>'form-control','placeholder'=>'23.-¿Funciona touch'])!!}
	</div>

	<div class="form-group col-md-4">
		{!!Form::text('display',null,['class'=>'form-control','placeholder'=>'24.-¿Funciona display'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('ctrasera',null,['class'=>'form-control','placeholder'=>'25.-¿Funciona camara trasera'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('cfrontal',null,['class'=>'form-control','placeholder'=>'26.-¿Funciona camara frontal'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('ccarga',null,['class'=>'form-control','placeholder'=>'27.-¿Funciona centro de carga'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('altavoz',null,['class'=>'form-control','placeholder'=>'28.-¿Funciona altavoz'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('microfono',null,['class'=>'form-control','placeholder'=>'29.-¿Funciona microfono'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('auricular',null,['class'=>'form-control','placeholder'=>'30.-¿Funciona auricular'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('boexterna',null,['class'=>'form-control','placeholder'=>'31.-¿Funciona bocina externa'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('jack',null,['class'=>'form-control','placeholder'=>'32.-¿Funciona jack de audio'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('wifi',null,['class'=>'form-control','placeholder'=>'33.-¿Funciona wifi'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('bluetooth',null,['class'=>'form-control','placeholder'=>'34.-¿Funciona bluetooth'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('datosm',null,['class'=>'form-control','placeholder'=>'35.-¿Datos móviles?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('bateria',null,['class'=>'form-control','placeholder'=>'36.-¿Funciona bateria?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('portasim',null,['class'=>'form-control','placeholder'=>'37.-¿Funciona porta Sim?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('sim',null,['class'=>'form-control','placeholder'=>'38.- ¿Funciona SIM?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('bhome',null,['class'=>'form-control','placeholder'=>'39.- ¿Funciona boton home?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('touchid',null,['class'=>'form-control','placeholder'=>'40.- ¿Funciona Touch ID?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('sensorp',null,['class'=>'form-control','placeholder'=>'41.- ¿Funciona sensor de proximidad?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('carcasa',null,['class'=>'form-control','placeholder'=>'42.- ¿Golpes en carcasa?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('teclado',null,['class'=>'form-control','placeholder'=>'43.- ¿Funciona Teclado?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('señal',null,['class'=>'form-control','placeholder'=>'44.- ¿Tiene Señal?'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::text('problemacliente',null,['class'=>'form-control','placeholder'=>'45.- ¿Que problema presenta el equipo?'])!!}
	</div>
		<div class="form-group col-md-4">
		{!!Form::text('solucion1',null,['class'=>'form-control','placeholder'=>'46.- ¿Que solución desea?'])!!}
	</div>
	<div class="form-group">
		{!!Form::textarea('diagnostico1',null,['class'=>'form-control','placeholder'=>'47.-DIAGNOSTICO DE RECEPCIÓN'])!!}
	</div>

<!--DATOS DE DIAGNOSTICO POR PARTE DE LOS TECNICOS-->
	<div class="form-group">
		{!!Form::textarea('diagnostico2',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
	</div>

		

<!--VAMOS A INGRESAR LOS DATOS DE USUARIO ASIGNADO, TECNICO ASIGNADO, STATUS, PRIVEEDOR -->
	<div class="form-group">
		{!!Form::label('Status','Status:')!!}
		{!!Form::select('status_id',$status)!!}
	</div>

		<div class="form-group">
		{!!Form::label('tecnico','Tecnico Asignado:')!!}
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
