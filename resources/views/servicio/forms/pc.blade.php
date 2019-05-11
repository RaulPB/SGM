     <!-- Modal para movil-->
            <div id="myModal1" class="modal fade modal-slide-in-right" role="dialog">
              <div class="modal-dialog modal-lg" style="z-index: 1100;">

                <!-- Modal content-->
                <div  align="center" class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registro de datos para MACBOOK / PC</h4>
                  </div>

                
                  <div class="modal-body">
                   <div class="form-group col-md-4" id="uno" >
                     Producto del cliente:{!!Form::text('productoPC',null,['class'=>'form-control','id'=>'producto','placeholder'=>'5.-Producto del cliente'])!!}
                   </div>

 

                   <div class="form-group col-md-4" id="2" >
                     Marca del producto:{!!Form::text('marcaPC',null,['class'=>'form-control','placeholder'=>'6.-Marca del Producto'])!!}
                   </div>


                   <div class="form-group col-md-4" id="3">
                     Modelo del Producto:{!!Form::text('modeloPC',null,['class'=>'form-control','placeholder'=>'7.-Modelo del Producto'])!!}
                   </div>
                   <div class="form-group col-md-4" id="4">
                     Tipo Producto:{!!Form::text('tipoPC',null,['class'=>'form-control','placeholder'=>'8.-Tipo Producto'])!!}
                   </div>
                   <div class="form-group col-md-4" id="5">
                     Color Producto:{!!Form::text('colorPC',null,['class'=>'form-control','placeholder'=>'9.-Color Producto'])!!}
                   </div>
                   <div class="form-group col-md-4" id="6">
                     Memoria Producto:{!!Form::text('memoriaPC',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="7">
                     Procesador Producto:{!!Form::text('procesadorPC',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="8">
                     Disco Producto (capacidad):{!!Form::text('discoPC',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="9">
                     S/N Producto:{!!Form::text('seriePC',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                  
                   <div class="form-group col-md-4" id="11">
                     ¿Alguien intento reparar el equipo antes?
                     {!!Form::select('reparadoPC', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}

                   </div>
                   <div class="form-group col-md-4" id="12">
                     ¿Estuvo en contacto con agua? {!!Form::select('aguaPC', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="14">
                     ¿Enciende?
                    <center> {!!Form::select('enciendePC', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div></center>

                  <div class="form-group col-md-4" >
                     ¿Deja cargador?
                     <center>{!!Form::select('cargadorPC', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>

                  <div class="form-group col-md-4" >
                     ¿Numero de cargador?:{!!Form::text('cargadorPC',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>

                   <div class="form-group col-md-4" id="17">
                     ¿Estado de bisagras?
                     <center>{!!Form::select('equipo', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>


                   <div class="form-group col-md-4" id="19">
                     ¿Funciona display?
                     <center>{!!Form::select('display', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="20">
                     ¿Funciona camara trasera?
                     <center>{!!Form::select('ctrasera', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="21">
                     ¿Funciona camara frontal?
                     <center>{!!Form::select('cfrontal', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="22">
                     ¿Funciona centro de carga?
                     <center>{!!Form::select('ccarga', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="23">
                     ¿Funciona altavoz?
                     <center>{!!Form::select('altavoz', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="24">
                     ¿Funciona microfono?
                     <center>{!!Form::select('microfono', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="25">
                     ¿Funciona auricular?
                     <center>{!!Form::select('auricular', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="26">
                     ¿Funciona bocina externa?
                     <center>{!!Form::select('boexterna', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="27">
                     ¿Funciona jack de audio?
                     <center>{!!Form::select('jack', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="28">
                     ¿Funciona wifi?
                     <center>{!!Form::select('wifi', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="29">
                     ¿Funciona bluetooth?
                     <center>{!!Form::select('bluetooth', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="30">
                     ¿Datos móviles?
                     <center>{!!Form::select('datosm', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="31">
                     ¿Funciona bateria?
                     <center>{!!Form::select('bateria', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="32">
                     ¿Funciona porta Sim?
                     <center>{!!Form::select('portasim', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="33">
                     ¿Funciona SIM?
                     <center>{!!Form::select('sim', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="34">
                     ¿Funciona boton home?
                     <center>{!!Form::select('bhome', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="35">
                     ¿Funciona Touch ID?
                     <center>{!!Form::select('touchid', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="36">
                     ¿Funciona sensor de proximidad?
                     <center>{!!Form::select('sensorp', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="37">
                     ¿Golpes en carcasa?
                     <center>{!!Form::select('carcasa', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>

                   <div class="form-group col-md-4" id="38">
                     ¿Funciona Teclado?
                     <center>{!!Form::select('teclado', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="39">
                     ¿Tiene Señal?
                     <center>{!!Form::select('señal', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-12" id="40">
                     ¿Que problema presenta el equipo?{!!Form::text('problemacliente',null,['class'=>'form-control','placeholder'=>'45.- ¿Que problema presenta el equipo?'])!!}

                   </div>
                   <div class="form-group col-md-12" id="41" >
                     ¿Que solución desea?{!!Form::text('solucion1',null,['class'=>'form-control','placeholder'=>'46.- ¿Que solución desea?'])!!}
                   </div>
                   <div class="form-group col-md-12" id="42">
                     <h4>Diagnostico de Recepción:</h4>
                     {!!Form::textarea('diagnostico1',null,['class'=>'form-control','placeholder'=>'47.-DIAGNOSTICO DE RECEPCIÓN'])!!}
                   </div>

                   <div class="form-group col-md-12" id="43">
                     <h4>Comunicación Interna (Observaciones y comentarios del equipo(s)):</h4>
                     {!!Form::textarea('comunicacion',null,['class'=>'form-control','placeholder'=>'¿Que deseas que sepa tu compañero?'])!!}
                   </div>
                   <div class="form-group col-md-12" id="44">
                     <h4>Concepto y precio de la reparación:</h4>
                     {!!Form::textarea('diagnostico2',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>


                   <div class="form-group col-md-12" id="45">
                     {!!Form::label('Status','Status:')!!}
                     {!!Form::select('status_id',$status)!!}
                   </div>

                   <div class="form-group col-md-12" id="46">
                     {!!Form::label('tecnico','Tecnico Asignado:')!!}
                     {!!Form::select('tecnico_id',$user)!!}
                   </div> 
                 </div>

                 <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Continuar</button>

                </div>
              </div>

            </div>
          </div>
