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
                     Producto del cliente:{!!Form::text('productoPC',null,['class'=>'form-control','id'=>'producto','placeholder'=>'Producto del cliente'])!!}
                   </div>

 

                   <div class="form-group col-md-4" id="2" >
                     Marca del producto:{!!Form::text('marcaPC',null,['class'=>'form-control','placeholder'=>'Marca del Producto'])!!}
                   </div>


                   <div class="form-group col-md-4" id="3">
                     Modelo del Producto:{!!Form::text('modeloPC',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="4">
                     Tipo Producto:{!!Form::text('tipoPC',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="5">
                     Color Producto:{!!Form::text('colorPC',null,['class'=>'form-control','placeholder'=>''])!!}
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
                     ¿Numero de cargador?:{!!Form::text('seriecargadorPC',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>

                   <div class="form-group col-md-4" id="17">
                     ¿Estado de bisagras?
                     <center>{!!Form::select('bisagra', array('2 BIEN'=> '2 BIEN', '1 BIEN' => ' 1 BIEN', 'AMBAS DAÑADAS' => 'AMBAS DAÑADAS'), 'NO SE')!!}
                   </div>


                   <div class="form-group col-md-6" id="19">
                     ¿Equipo con bateria?
                     <center>{!!Form::select('bateria', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="20">
                     ¿Funciona bateria?
                     <center>{!!Form::select('bateriaf', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="21">
                     ¿Funciona pantalla?
                     <center>{!!Form::select('pantallap', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="22">
                     ¿Funciona disco duro?
                     <center>{!!Form::select('discop', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="23">
                     ¿Funciona memoria?
                     <center>{!!Form::select('memoriap', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="24">
                     ¿Funciona teclado?
                     <center>{!!Form::select('tecladop', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="25">
                     ¿Funciona touch?
                     <center>{!!Form::select('touchp', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="26">
                     ¿Funciona camara frontal?
                     <center>{!!Form::select('camarap', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="27">
                     ¿Cuenta con unidad lectora?
                     <center>{!!Form::select('lectorp', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="28">
                     ¿Funciona unidad lectora?
                     <center>{!!Form::select('lectorfp', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-12" id="40">
                     ¿Que problema presenta el equipo?{!!Form::text('problemaclientep',null,['class'=>'form-control','placeholder'=>''])!!}

                   </div>
                   <div class="form-group col-md-12" id="30">
                     ¿Que solucion desea?
                     <center>{!!Form::text('solucionp',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   
                   <div class="form-group col-md-12" id="42">
                     <h4>Diagnostico de Recepción:</h4>
                     {!!Form::textarea('diagnostico1p',null,['class'=>'form-control','placeholder'=>'DIAGNOSTICO DE RECEPCIÓN'])!!}
                   </div>

                   <div class="form-group col-md-12" id="43">
                     <h4>Comunicación Interna (Observaciones y comentarios del equipo(s)):</h4>
                     {!!Form::textarea('comunicacionp',null,['class'=>'form-control','placeholder'=>'¿Que deseas que sepa tu compañero?'])!!}
                   </div>
                   <div class="form-group col-md-12" id="44">
                     <h4>Concepto y precio de la reparación:</h4>
                     {!!Form::textarea('diagnostico2p',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>


                   <div class="form-group col-md-12" id="45">
                     {!!Form::label('Status','Status:')!!}
                     {!!Form::select('status_idp',$status)!!}
                   </div>

                   <div class="form-group col-md-12" id="46">
                     {!!Form::label('tecnico','Tecnico Asignado:')!!}
                     {!!Form::select('tecnico_idp',$user)!!}
                   </div> 
                 </div>

                 <div class="modal-footer">
               

                </div>
              </div>

            </div>
          </div>
