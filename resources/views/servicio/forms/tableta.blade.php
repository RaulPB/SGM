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
            ORDEN NUMERO: {!!$id!!}</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">
            <!-- AQUI -->
            <div class="form-group col-md-6">
              {!!Form::label('fechaingreso','Fecha de recepción:')!!}
              {!!Form::text('fechaingreso', null,['class'=>'form-control','placeholder'=>'','readonly'=> 'true'])!!}

            </div>


            <div class="form-group col-md-6">
              {!!Form::label('fechaentrega','Fecha COMPROMISO:')!!}
              {!!Form::text('fechaentrega',null,['class'=>'form-control','placeholder'=>''])!!}
            </div>


            <div class="form-group col-md-12">
              <h4>Bitacora de contacto con el cliente:</h4>
              {!!Form::textarea('bitacoracontacto',null,['class'=>'form-control','placeholder'=>'Registra las fechas de contacto con el cliente','readonly'=> 'true'])!!}
            </div>

            <div class="form-group col-md-12">
              <h4>Recibio:</h4>
              {!!Form::text('receptor',null,['class'=>'form-control','placeholder'=>'NOMBRE DEL RECEPTOR AUTOMATICO','readonly' => 'true'])!!}
            </div>

               <div class="form-group col-md-12">
                 Cliente{!!Form::text('nombrecliente',null,['class'=>'form-control','placeholder'=>'',  'id'=>'names'])!!}
               </div>
               <div class="form-group col-md-4">
                 Telefono del cliente:{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'2.-Telefono Cliente', 'id'=>'telefono'])!!}
               </div>
               <div class="form-group col-md-4">
                 Celular del cliente:{!!Form::text('celular',null,['class'=>'form-control','placeholder'=>'3.-Celular Cliente', 'id'=>'celular'])!!}
               </div>
               <div class="form-group col-md-4">
                 Email:{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'4.-Email Cliente', 'id'=>'email'])!!}
               </div>

                   
                   <div class="form-group col-md-4" id="uno" >
                     Producto del cliente:{!!Form::text('productot',$servicio->producto,['class'=>'form-control','id'=>'producto','placeholder'=>''])!!}
                   </div>

                    <div class="form-group col-md-4" id="2" >
                     Marca del producto:{!!Form::text('marcat',$serviciohijo->marcat,['class'=>'form-control','placeholder'=>''])!!}
                   </div>

                   <div class="form-group col-md-4" id="3">
                     Modelo del Producto:{!!Form::text('modelot',$serviciohijo->modelot,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="4">
                     Tipo Producto:{!!Form::text('tipot',$serviciohijo->tipot,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="5">
                     Color Producto:{!!Form::text('colort ',$serviciohijo->colort,['class'=>'form-control','placeholder'=>''])!!}
                   </div>

                   <div class="form-group col-md-4" id="6">
                     Memoria Producto:{!!Form::text('memoriat',$serviciohijo->memoriat,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="7">
                     Procesador Producto:{!!Form::text('procesadort',$serviciohijo->procesadort,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="8">
                     Disco duro producto:{!!Form::text('discot',$serviciohijo->discot,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="9">
                     S/N Producto:{!!Form::text('seriet',$serviciohijo->seriet,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   
                    <div class="form-group col-md-4" id="11">
                     ¿Alguien intento reparar el equipo antes?
                     <center>{!!Form::select('reparadot', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->reparadot)!!}</center>

                   </div>
                   <div class="form-group col-md-4" id="12">
                     ¿Estuvo en contacto con agua?<center>{!!Form::select('aguat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->aguat)!!}</center> 
                   </div>
                   <div class="form-group col-md-4" id="14">
                    ¿Enciende?
                    <center> {!!Form::select('enciendet', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->enciendet)!!}
                   </div></center>

                    <div class="form-group col-md-4" id="10">
                     ¿Entra al sistema?:{!!Form::select('sistemat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->sistemat)!!}
                    </div>

                     <div class="form-group col-md-4" >
                     ¿Deja cargador?
                     <center>{!!Form::select('cargadort', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->cargadort)!!}
                   </div>

                  <div class="form-group col-md-4" >
                     ¿Numero de cargador?:{!!Form::text('seriecargadort',$serviciohijo->seriecargadort,['class'=>'form-control','placeholder'=>''])!!}
                   </div>

                   <div class="form-group col-md-4" id="17">
                     ¿Equipo golpeado?
                     <center>{!!Form::select('golpeadot', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->golpeadot)!!}
                   </div>

                   <div class="form-group col-md-6" id="19">
                     Funciona la pantalla
                     <center>{!!Form::select('pantallat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->pantallat)!!}
                   </div>

                   <div class="form-group col-md-6" id="20">
                     ¿Funciona touch?
                     <center>{!!Form::select('toucht', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->toucht)!!}
                   </div>

                   <div class="form-group col-md-6" id="21">
                     ¿Funciona camara delantera?
                     <center>{!!Form::select('camaradt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->camaradt)!!}
                   </div>
                   <div class="form-group col-md-6" id="22">
                     ¿Funciona camara trasera?
                     <center>{!!Form::select('camaratt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->camaratt)!!}
                   </div>
                   <div class="form-group col-md-6" id="23">
                     ¿Funciona altavoz?
                     <center>{!!Form::select('altavozt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'),$serviciohijo->altavozt)!!}
                   </div>
                   <div class="form-group col-md-6" id="24">
                     ¿Funciona jack de audio?
                     <center>{!!Form::select('jackt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->jackt)!!}
                   </div>
                   <div class="form-group col-md-6" id="25">
                     ¿Funciona WIFI?
                     <center>{!!Form::select('wifit', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->wifit)!!}
                   </div>
                   <div class="form-group col-md-6" id="26">
                     ¿Funciona sensor de proximidad?
                     <center>{!!Form::select('sensort', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->sensort)!!}
                   </div>
                   <div class="form-group col-md-6" id="27">
                     ¿Funciona bluetooth?
                     <center>{!!Form::select('blut', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->blut)!!}
                   </div>
                    <div class="form-group col-md-6" id="28">
                     ¿Funciona bateria?
                     <center>{!!Form::select('bateriat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->bateriat)!!}
                   </div>

                   <div class="form-group col-md-6" id="28">
                     ¿Datos Moviles?
                     <center>{!!Form::select('datosmt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->datosmt)!!}
                   </div>

                   <div class="form-group col-md-6" id="28">
                     ¿Funciona centro de carga?
                     <center>{!!Form::select('ccargat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), $serviciohijo->ccargat)!!}
                   </div>

                   <div class="form-group col-md-12" id="40">
                     ¿Que problema presenta el equipo?{!!Form::text('problemaclientet',$servicio->problemacliente,['class'=>'form-control','placeholder'=>''])!!}

                   </div>
                   <div class="form-group col-md-12" id="30">
                     ¿Que solucion desea?
                     <center>{!!Form::text('soluciont',$servicio->solucion1,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   
                   <div class="form-group col-md-12" id="42">
                     <h4>Diagnostico de Recepción:</h4>
                     {!!Form::textarea('diagnostico1t',$servicio->diagnostico1,['class'=>'form-control','placeholder'=>'DIAGNOSTICO DE RECEPCIÓN'])!!}
                   </div>

                   <div class="form-group col-md-12" id="43">
                     <h4>Comunicación Interna (Observaciones y comentarios del equipo(s)):</h4>
                     {!!Form::textarea('comunicaciont',$servicio->comunicacion,['class'=>'form-control','placeholder'=>'¿Que deseas que sepa tu compañero?'])!!}
                   </div>
                   <div class="form-group col-md-12" id="44">
                     <h4>Concepto y precio de la reparación:</h4>
                     {!!Form::textarea('diagnostico2t',$servicio->diagnostico2,['class'=>'form-control','placeholder'=>''])!!}
                   </div>






                   <div class="form-group col-md-12" id="45">
                     {!!Form::label('Status','Status:')!!}
                     {!!Form::select('status_idt',$status)!!}
                   </div>

                   <div class="form-group col-md-12" id="46">
                     {!!Form::label('tecnico','Tecnico Asignado:')!!}
                     {!!Form::select('tecnico_idt',$user)!!}
                   </div> 


            <div class="form-group col-md-12">
              {!!Form::label('garantia','Tiempo asignado de garantia:')!!}
              {!!Form::select('garantia',$garantia)!!}
            </div>


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
                    <option value="{{$articulo->id}}_{{$articulo->cantidad}}_{{$articulo->preciop}}"> {{$articulo-> categoria -> categoria}}_{{$articulo->modelo}} </option>
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
                      <th>Artículo</th>
                      <th>Cantidad</th>
                      <th>Precio de venta</th>
                      <th>Subtotal</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($detalles as $det)
                      <tr>
                        <td>{{$det->articulo}}</td>
                        <td>{{$det->cantidad}}</td>
                        <td>{{$det->precio_pub}}</td>


                      </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>

              <div class="form-group col-md-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                  <thead style="background-color:#A9D0F5">
                    <tr>
                      <th>TOTAL= <input name="total_venta2" id="total_venta2" type= "number" value={{$servicio->costo}}></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <th><input name="total_venta" id="total_venta" type="hidden"></th>
                  </tfoot>
                </table>
              </div>

              <div class="form-group col-md-10">
                <button type="button"  id="bt_iva" class="btn btn-primary">Agregar IVA</button>
              </div>

              <div class="form-group col-md-4">
                {!!Form::label('tipopago1','Tipo de pago 1:')!!}
                {!!Form::select('tipopago1',$pagor)!!}
              </div>

              <div class="form-group col-md-4">
                {!!Form::label('fechaingreso','Fecha 1:')!!}
                {!!Form::text('fechapago1',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
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
                {!!Form::text('fechapago2',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
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
                {!!Form::text('fechapago3',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
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
                {!!Form::text('fechapago4',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
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
                {!!Form::text('fechapago5',null,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
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

        $('#bt_iva').click(function(){
          //agregar();
          agregariva();
        });
      });

      function agregariva(){
        tt = $("#total_venta2").val();
        tt2 = tt * 1.16;
        tt3 = tt2.toFixed(2)
        $("#total_venta2").val(tt3);
        console.log(tt2);
      }

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
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]"  value="'+idarticulo+'">'+articulo+'</td><td><input name="cantidad[]" readonly value="'+cantidad+'"></td><td><input  name="precio_venta[]"  readonly value="'+precio_venta+'"></td></tr>';
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
