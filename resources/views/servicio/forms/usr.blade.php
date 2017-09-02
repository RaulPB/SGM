<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
  //$("#editor1").click(function(){
  function myFunction() {
    document.getElementById("fechapago1").disabled = true;}

    $("#total_venta2").blur(function(){
      var clicks = total_venta2.value//Valor total
      var clicks2 = editor2.value
      var clicks3 = editor3.value
      var clicks5 = editor4.value
      var clicks6 = editor5.value
      var clicks7 = editor6.value
      var clicks4 = total_venta2.value-editor2.value-editor3.value-editor4.value-editor5.value-editor6.value
      //alert(clicks4);
      $("#total").attr("value",clicks4);
    });

    $("#editor2").blur(function(){
      var clicks = total_venta2.value//Valor total
      var clicks2 = editor2.value
      var clicks3 = editor3.valuevar
      var clicks5 = editor4.value
      var clicks6 = editor5.value
      var clicks7 = editor6.value
      var clicks4 = total_venta2.value-editor2.value-editor3.value-editor4.value-editor5.value-editor6.value
      // alert(clicks4);
      $("#total").attr("value",clicks4);
    });

    $("#editor3").blur(function(){
      var clicks = total_venta2.value//Valor total
      var clicks2 = editor2.value
      var clicks3 = editor3.valuevar
      var clicks5 = editor4.value
      var clicks6 = editor5.value
      var clicks7 = editor6.value
      var clicks4 = total_venta2.value-editor2.value-editor3.value-editor4.value-editor5.value-editor6.value
      //alert(clicks4);
      //$(#total).value("hola");

      $("#total").attr("value",clicks4);
    });

    $("#editor4").blur(function(){
      var clicks = total_venta2.value//Valor total
      var clicks2 = editor2.value
      var clicks3 = editor3.valuevar
      var clicks5 = editor4.value
      var clicks6 = editor5.value
      var clicks7 = editor6.value
      var clicks4 = total_venta2.value-editor2.value-editor3.value-editor4.value-editor5.value-editor6.value
      //alert(clicks4);
      //$(#total).value("hola");

      $("#total").attr("value",clicks4);
    });

    $("#editor5").blur(function(){
      var clicks = total_venta2.value//Valor total
      var clicks2 = editor2.value
      var clicks3 = editor3.valuevar
      var clicks5 = editor4.value
      var clicks6 = editor5.value
      var clicks7 = editor6.value
      var clicks4 = total_venta2.value-editor2.value-editor3.value-editor4.value-editor5.value-editor6.value
      //alert(clicks4);
      //$(#total).value("hola");

      $("#total").attr("value",clicks4);
    });

    $("#editor6").blur(function(){
      var clicks = total_venta2.value//Valor total
      var clicks2 = editor2.value
      var clicks3 = editor3.valuevar
      var clicks5 = editor4.value
      var clicks6 = editor5.value
      var clicks7 = editor6.value
      var clicks4 = total_venta2.value-editor2.value-editor3.value-editor4.value-editor5.value-editor6.value
      //alert(clicks4);
      //$(#total).value("hola");

      $("#total").attr("value",clicks4);
    });

  });
  </script>

  <script>
  $(function() {
    var clicks = total_venta2.value//Valor total
    var clicks2 = editor2.value
    var clicks3 = editor3.value
    var clicks5 = editor4.value
    var clicks6 = editor5.value
    var clicks7 = editor6.value
    //var clicks4 = total_venta2.value-editor2.value-editor3.value
    var clicks4 = total_venta2.value-editor2.value-editor3.value-editor4.value-editor5.value-editor6.value

    //alert(clicks4);
    //$(#total).value("hola");

    $("#total").attr("value",clicks4);


  });
  </script>

    <!--DATOS DE COSTO POR DELIVERACION DE LAS PARTES INVOLUCRADAS INICIALIZADAS EN 0 Y OCULTAS-->


  <!--VAMOS-->
        <div class="panel-group" id="accordion">
         <div class="panel panel-default">
           <div class="panel-heading">
             <h4 class="panel-title">
               <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
               1.-Orden de servicio</a>
             </h4>
           </div>
           <div id="collapse1" class="panel-collapse collapse in">
             <div class="panel-body">
               <!-- AQUI -->
               <div class="form-group col-md-12">
                 {!!Form::label('fechaingreso','Fecha de recepción:')!!}
                 {!!Form::date('fechaingreso', \Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}

               </div>


               <div class="form-group col-md-12">
                 {!!Form::label('fechaentrega','Fecha COMPROMISO:')!!}
                 {!!Form::text('fechaentrega', \Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>''])!!}
               </div>

               <div class="form-group col-md-12">
                 <h4>Recibio:</h4>
                 {!!Form::text('receptor',Auth::user()->name,['class'=>'form-control','placeholder'=>'NOMBRE DEL RECEPTOR AUTOMATICO','readonly' => 'true'])!!}
               </div>

               <div class="form-group col-md-12">
                 <h4>Información del cliente:</h4>
                 <select name="picliente" id="picliente" class="form-control selectpicker" data-live-search="true">
                   @foreach($cli as $clis)
                     <option value="{{$clis->id}}_{{$clis->cliente}}_{{$clis->correo}}_{{$clis->telefono}}_{{$clis->celular}}"> {{$clis->cliente}} </option>
                   @endforeach
                 </select>
               </div>

               <div class="form-group col-md-12">
                 {!!Form::text('nombrecliente',null,['class'=>'form-control','placeholder'=>'Si no encuentras el cliente ingresa sus datos',  'id'=>'names'])!!}
               </div>
               <div class="form-group col-md-4">
                 Telefono del cliente:{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'2.-Telefono Cliente', 'id'=>'telefono'])!!}
               </div>
               <div class="form-group col-md-4">
                 Celular del cliente:{!!Form::text('celular',null,['class'=>'form-control','placeholder'=>'3.-Celular Cliente', 'id'=>'celular'])!!}
               </div>
               <div class="form-group col-md-4">
                 Email:{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'4.-Email del cliente','id'=>'email'])!!}
               </div>

               <div class="form-group col-md-4">
                 Producto del cliente:{!!Form::text('producto',null,['class'=>'form-control','placeholder'=>'5.-Producto del cliente'])!!}
               </div>

               <div class="form-group col-md-4">
                 Marca del producto:{!!Form::text('marca',null,['class'=>'form-control','placeholder'=>'6.-Marca del Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 Modelo del Producto:{!!Form::text('modelo',null,['class'=>'form-control','placeholder'=>'7.-Modelo del Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 Tipo Producto:{!!Form::text('tipo',null,['class'=>'form-control','placeholder'=>'8.-Tipo Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 Color Producto:{!!Form::text('color',null,['class'=>'form-control','placeholder'=>'9.-Color Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 Capacidad Producto:{!!Form::text('capacidad',null,['class'=>'form-control','placeholder'=>'10.-Capacidad Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 Serie Producto:{!!Form::text('serie',null,['class'=>'form-control','placeholder'=>'11.-Serie Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 IMEI Producto:{!!Form::text('imei',null,['class'=>'form-control','placeholder'=>'12.-IMEI Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 Contraseña Producto:{!!Form::text('contraseña',null,['class'=>'form-control','placeholder'=>'13.-Contraseña Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 Compañia Producto:{!!Form::text('compañia',null,['class'=>'form-control','placeholder'=>'14.-Compañia Producto'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Alguien intento reparar el equipo antes?{!!Form::text('reparado',null,['class'=>'form-control','placeholder'=>'15.-¿Alguien intento reparar el equipo antes?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Estuvo en contacto con agua?,¿tipo?{!!Form::text('agua',null,['class'=>'form-control','placeholder'=>'16.-¿Estuvo en contacto con agua?,¿tipo?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Ingresa correctamente al sistema?{!!Form::text('ingresoso',null,['class'=>'form-control','placeholder'=>'17.-¿Ingresa correctamente al sistema?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Enciende?{!!Form::text('enciende',null,['class'=>'form-control','placeholder'=>'18.-¿Enciende?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona botón de encendido?{!!Form::text('benciende',null,['class'=>'form-control','placeholder'=>'19.-¿Funciona botón de encendido?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona botón de volumen?{!!Form::text('bvolumen',null,['class'=>'form-control','placeholder'=>'20.-¿Funciona botón de volumen?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona botón vibrador?{!!Form::text('bvibrador',null,['class'=>'form-control','placeholder'=>'21.-¿Funciona botón vibrador?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona pantalla?{!!Form::text('pantalla',null,['class'=>'form-control','placeholder'=>'22.-¿Funciona pantalla'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona touch?{!!Form::text('touch',null,['class'=>'form-control','placeholder'=>'23.-¿Funciona touch'])!!}
               </div>

               <div class="form-group col-md-4">
                 ¿Funciona display?{!!Form::text('display',null,['class'=>'form-control','placeholder'=>'24.-¿Funciona display'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona camara trasera?{!!Form::text('ctrasera',null,['class'=>'form-control','placeholder'=>'25.-¿Funciona camara trasera'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona camara frontal?{!!Form::text('cfrontal',null,['class'=>'form-control','placeholder'=>'26.-¿Funciona camara frontal'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona centro de carga?{!!Form::text('ccarga',null,['class'=>'form-control','placeholder'=>'27.-¿Funciona centro de carga'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona altavoz?{!!Form::text('altavoz',null,['class'=>'form-control','placeholder'=>'28.-¿Funciona altavoz'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona microfono?{!!Form::text('microfono',null,['class'=>'form-control','placeholder'=>'29.-¿Funciona microfono'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona auricular?{!!Form::text('auricular',null,['class'=>'form-control','placeholder'=>'30.-¿Funciona auricular'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona bocina externa?{!!Form::text('boexterna',null,['class'=>'form-control','placeholder'=>'31.-¿Funciona bocina externa'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona jack de audio?{!!Form::text('jack',null,['class'=>'form-control','placeholder'=>'32.-¿Funciona jack de audio'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona wifi?{!!Form::text('wifi',null,['class'=>'form-control','placeholder'=>'33.-¿Funciona wifi'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona bluetooth?{!!Form::text('bluetooth',null,['class'=>'form-control','placeholder'=>'34.-¿Funciona bluetooth'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Datos móviles?{!!Form::text('datosm',null,['class'=>'form-control','placeholder'=>'35.-¿Datos móviles?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona bateria?{!!Form::text('bateria',null,['class'=>'form-control','placeholder'=>'36.-¿Funciona bateria?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona porta Sim?{!!Form::text('portasim',null,['class'=>'form-control','placeholder'=>'37.-¿Funciona porta Sim?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona SIM?{!!Form::text('sim',null,['class'=>'form-control','placeholder'=>'38.- ¿Funciona SIM?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona boton home?{!!Form::text('bhome',null,['class'=>'form-control','placeholder'=>'39.- ¿Funciona boton home?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona Touch ID?{!!Form::text('touchid',null,['class'=>'form-control','placeholder'=>'40.- ¿Funciona Touch ID?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona sensor de proximidad?{!!Form::text('sensorp',null,['class'=>'form-control','placeholder'=>'41.- ¿Funciona sensor de proximidad?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Golpes en carcasa?{!!Form::text('carcasa',null,['class'=>'form-control','placeholder'=>'42.- ¿Golpes en carcasa?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Funciona Teclado?{!!Form::text('teclado',null,['class'=>'form-control','placeholder'=>'43.- ¿Funciona Teclado?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Tiene Señal?{!!Form::text('señal',null,['class'=>'form-control','placeholder'=>'44.- ¿Tiene Señal?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Que problema presenta el equipo?{!!Form::text('problemacliente',null,['class'=>'form-control','placeholder'=>'45.- ¿Que problema presenta el equipo?'])!!}
               </div>
               <div class="form-group col-md-4">
                 ¿Que solución desea?{!!Form::text('solucion1',null,['class'=>'form-control','placeholder'=>'46.- ¿Que solución desea?'])!!}
               </div>
               <div class="form-group col-md-12">
                 <h4>Diagnostico de Recepción:</h4>
                 {!!Form::textarea('diagnostico1',null,['class'=>'form-control','placeholder'=>'47.-DIAGNOSTICO DE RECEPCIÓN'])!!}
               </div>

               <div class="form-group col-md-12">
                 <h4>Comunicación Interna (Observaciones y comentarios del equipo(s)):</h4>
                 {!!Form::textarea('comunicacion',null,['class'=>'form-control','placeholder'=>'¿Que deseas que sepa tu compañero?'])!!}
               </div>

               <!--DATOS DE DIAGNOSTICO POR PARTE DE LOS TECNICOS-->
               <div class="form-group">
                 DIAGNOSTICO DE TECNICO{!!Form::hidden('diagnostico2','Escribe tu diagnostico por favor',['class'=>'form-control','placeholder'=>'DIAGNOSTICO DE TECNICO'])!!}
               </div>
               <!--VAMOS A INGRESAR LOS DATOS DE USUARIO ASIGNADO, TECNICO ASIGNADO, STATUS, PRIVEEDOR -->
               <div class="form-group col-md-12">
                 {!!Form::label('Status','Status:')!!}
                 {!!Form::select('status_id',$status)!!}
               </div>

               <div class="form-group col-md-12">
                 {!!Form::label('tecnico','Tecnico Asignado:')!!}
                 {!!Form::select('tecnico_id',$user)!!}
               </div>



               <!--aquimas -->

             </div>
           </div>
         </div>
         <div class="panel panel-default">
           <div class="panel-heading">
             <h4 class="panel-title">
               <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
               2.-Información de pagos y materiales utilizados</a>
             </h4>
           </div>
           <div id="collapse2" class="panel-collapse collapse">
             <div class="panel-body">
               <!--aqui-->

               <div class="form-group col-md-6">
                 <label>Articulos</label>
                 <select name="pidarticulo" id="pidarticulo" class="form-control selectpicker" data-live-search="true">
                   @foreach($articulos as $articulo)
                     <option value="{{$articulo->id}}_{{$articulo->cantidad}}_{{$articulo->preciop}}"> {{$articulo->modelo}} </option>
                   @endforeach
                 </select>
               </div>
               <div class="form-group col-md-2">
                 <label for="cantidad">Cantidad</label>
                 <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
               </div>

               <div class="form-group col-md-2">
                 <label for="stock">Stock</label>
                 <input type="number" readonly name="pstock" id="pstock" class="form-control" placeholder="stock">
               </div>

               <div class="form-group col-md-2">
                 <label for="precio_venta">Precio de venta</label>
                 <input type="number" readonly name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. venta">
               </div>

               <div class="form-group col-md-10">
                 <button type="button"  id="bt_add" class="btn btn-primary">Agregar</button>
               </div>

               <div class="form-group col-md-12">

                 <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                   <caption>1.Detalle de la venta</caption>
                   <thead style="background-color:#A9D0F5">
                     <tr>
                       <th>OPCIONES</th>
                       <th>Artículo</th>
                       <th>Cantidad</th>
                       <th>Precio de venta</th>
                       <th>Subtotal</th>

                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <TD></TD>
                       <td></td>
                       <td</td>
                       <td</td>
                       <td</td>
                       <!-- <td ></td> AQUI VA UN HIDDEN EN EL TD-->
                     </tr>
                   </tbody>
                 </table>

               </div>

               <div class="form-group col-md-12">
                 <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                   <thead style="background-color:#A9D0F5">
                     <tr>
                       <th>TOTAL= <input name="total_venta2" id="total_venta2" type= "number" value=0 readonly></th>
                     </tr>
                   </thead>
                   <tfoot>
                     <th><input name="total_venta" id="total_venta" type="hidden"></th>
                   </tfoot>
                 </table>
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('tipopago1','Tipo de pago 1:')!!}
                 {!!Form::select('tipopago1',$pagor)!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('fechaingreso','Fecha 1:')!!}
                 {!!Form::text('fechapago1',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('abonos1','Cantidad 1:')!!}
                 {!!Form::text('abono1',null,['class'=>'form-control','placeholder'=>'','id'=>'editor2'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('tipopago1','Tipo pago de 2:')!!}
                 {!!Form::select('tipopago2',$pagor)!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('fechaingreso','Fecha 2:')!!}
                 {!!Form::text('fechapago2',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('abonos1','Cantidad 2:')!!}
                 {!!Form::text('abono2',null,['class'=>'form-control','placeholder'=>'','id'=>'editor3'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('tipopago3','Tipo de pago 3:')!!}
                 {!!Form::select('tipopago3',$pagor)!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('fechaingreso','Fecha 3:')!!}
                 {!!Form::text('fechapago3',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('abonos3','Cantidad 3:')!!}
                 {!!Form::text('abono3',null,['class'=>'form-control','placeholder'=>'','id'=>'editor4'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('tipopago4','Tipo de pago 4:')!!}
                 {!!Form::select('tipopago4',$pagor)!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('fechaingreso','Fecha 4:')!!}
                 {!!Form::text('fechapago4',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('abonos4','Cantidad 4:')!!}
                 {!!Form::text('abono4',null,['class'=>'form-control','placeholder'=>'','id'=>'editor5'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('tipopago5','Tipo de pago 5:')!!}
                 {!!Form::select('tipopago5',$pagor)!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('fechaingreso','Fecha 5:')!!}
                 {!!Form::text('fechapago5',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
               </div>

               <div class="form-group col-md-4">
                 {!!Form::label('abonos5','Cantidad 5:')!!}
                 {!!Form::text('abono5',null,['class'=>'form-control','placeholder'=>'','id'=>'editor6'])!!}
               </div>

               <div class="form-group col-md-12">
                 {!!Form::label('rest','Cantidad Restante despues de los abonos:')!!}
                 {!!Form::text('resta',null,['class'=>'form-control','placeholder'=>'','id'=>'total'])!!}
               </div>


               <div class="form-group col-md-4">
                 {!!Form::hidden('costo ajustado','costo de reparación (Control Interno):')!!}
                 {!!Form::hidden('costoajustado',null,['class'=>'form-control','placeholder'=>''])!!}
               </div>
               <div class="form-group col-md-12">
                 {!!Form::label('costo ajustado','Notas y observaciones sobre pagos:')!!}
                 {!!Form::textarea('razon',null,['class'=>'form-control','placeholder'=>'Cuentas; No. cheques, Fechas, Clientes, etc; todo referente a los abonos realizados '])!!}
               </div>

             </div>
           </div>
         </div>

       </div>













  <script>
  $(document).ready(function(){
    $('#bt_add').click(function(){
      agregar();
    });
  });

  var cont=0;
  total = $("#total_venta2").val();
  subtotal=[];
  $("#guardar").hide();
  $("#pidarticulo").change(mostrarValores);
  $("#picliente").change(mostrarCliente);

  function mostrarCliente(){
    datosCliente=document.getElementById('picliente').value.split('_');
    $("#names").val(datosCliente[1]);
    $("#email").val(datosCliente[2]);
    $("#celular").val(datosCliente[4]);
    $("#telefono").val(datosCliente[3]);
    //$("#pstock").val(datosArticulo[1]);
  }


  function mostrarValores(){
    datosArticulo=document.getElementById('pidarticulo').value.split('_');
    $("#pprecio_venta").val(datosArticulo[2]);
    $("#pstock").val(datosArticulo[1]);
  }

  function agregar(){
    datosArticulo=document.getElementById('pidarticulo').value.split('_');
    idarticulo = datosArticulo[0];
    articulo = $("#pidarticulo option:selected").text();
    cantidad = $("#pcantidad").val();
    precio_venta = $("#pprecio_venta").val();
    stock = $("#pstock").val();

    if (idarticulo!=" " && cantidad!="" && cantidad > 0 && precio_venta!=""){
      x= stock - cantidad;
      if (x >= 0){
        var xxx = (cantidad * precio_venta); //
        subtotal[cont]= xxx;
        subtotal[cont] = subtotal[cont].toString();
        total =parseInt(total) + parseInt(subtotal[cont]);
        $("#total_venta2").val(total);
        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]"  value="'+idarticulo+'">'+articulo+'</td><td><input name="cantidad[]" readonly value="'+cantidad+'"></td><td><input  name="precio_venta[]"  readonly value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
        //la linea de arriba va agregando botones de eliminado y los detalles de la lista
        cont++;
        $("#total").html("S/. " + total);
        $("#total_venta").val(total);
        $("#detalles").append(fila);
        limpiar();
      }else{
        valor = stock - cantidad;
        console.log(valor);
        alert ('NO HAY SUFICIENTE INVENTARIO');
      }
    }else{
      alert("Revise la cantidad del producto a vender");
    }
  }

  function limpiar(){
    $("#pcantidad").val(0);
    $("#pstock").val(0);
    $("#pprecio_venta").val("");
  }

  function eliminar(index){
    var truncated1 = Math.trunc(total * 1000) / 1000; // = -5.46
    subtotal[index] = Math.trunc(subtotal[index] * 1000) / 1000;
    total=truncated1-subtotal[index]; //restamos con numeros formateados
    total=Math.trunc(total * 1000) / 1000; //el resultado lo formateamos
    var t= total.toFixed(2);
    $("#total_venta2").val(t);
    $("#fila" + index).remove();
    evaluar();
  }

  function evaluar(){
    if(total>0){
    }else{
      /*$("#total").val(0);
      $("#editor2").val(0);
      $("#editor3").val(0);
      $("#editor4").val(0);
      $("#editor5").val(0);
      $("#editor6").val(0);*/
      alert("LA VENTA ESTA VACIA");
    }
  }

  </script>
