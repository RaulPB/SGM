<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <table>

  <tr>
    <td> <img src= {{$imagen->politicas}} style="width:400%; max-width:550px;"></td>
    <td colspan="3"><FONT SIZE=2>Nombre del cliente: {{$nombrecliente}}</FONT></td>
    
    <td colspan="">Folio: {{$id}}</td>
    <td colspan="">Sucursal: {{$claven}}</td>
    

  </tr>
  <tr>
    <td colspan="4"><FONT SIZE=1>Fecha de Recepción: </FONT><FONT SIZE=1> {{$fecharecepcion}}</FONT></td>
    <td colspan="4"><FONT SIZE=1>Fecha de Entrega:</FONT><FONT SIZE=1> {{$fechaentrega}}</FONT></td>
     <td colspan="" rowspan="" headers=""><FONT SIZE=1> </FONT></td>
     <td colspan="" rowspan="" headers="" align="LEFT"><FONT SIZE=1>     </FONT></td>
    <?php if($tipo != "MOVIL") : ?>
        <td colspan="" rowspan="" headers="" align="center"><FONT SIZE=1> Marca con una X el lugar del golpe en el portatil</FONT></td>
    <?php endif; ?>
     
  </tr>

  <tr>
    <td colspan="1"><FONT SIZE=1>Marca: {{$marca}}</FONT></td>
    <td colspan="2"><FONT SIZE=1>Modelo: {{$modelo}}</FONT></td>
    <td>Tipo: {{$tipo}}</td>
    <td> <img src="https://scontent.fjal1-1.fna.fbcdn.net/v/t1.0-9/66499131_10157379244379110_7007316139302715392_n.jpg?_nc_cat=102&_nc_oc=AQnKsm8ilIYW2qWzCJaJrK9AtdqkWL7yH2q66o2ntn4VyQ7KLIXsrh8E9lB_monH8Ho&_nc_ht=scontent.fjal1-1.fna&oh=9222dc8f4e4f5087de2a446e8bc0e55d&oe=5DA6FD1F" style="width:1000%; max-width:1050px;"> </td>
      <td><img src="https://scontent.fjal1-1.fna.fbcdn.net/v/t1.0-9/66710858_10157379244339110_8359828631035314176_o.jpg?_nc_cat=103&_nc_oc=AQkUMOnRn2W42xMwHbltwbfUyjjXhjaHaz5x2wFSH9mLlFDcMSoXBpXHw3HB0AyWXCY&_nc_ht=scontent.fjal1-1.fna&oh=317bd30d80f6e15332bd5544d65d84e9&oe=5DC2B6DB" style="width:1300%; max-width:400px;"> Patrón de desbloqueo</FONT></td>
    <?php if($tipo != "MOVIL") : ?>
    <td><img src="https://store.storeimages.cdn-apple.com/4662/as-images.apple.com/is/image/AppleInc/aos/published/images/m/bp/mbp13/gray/mbp13-gray-select-201610?wid=452&hei=420&fmt=jpeg&qlt=95&op_sharpen=0&resMode=bicub&op_usm=0.5,0.5,0,0&iccEmbed=0&layer=comp&.v=1495842439811" style="width:800%; max-width:200px;"></td>
    <?php endif; ?>

  </tr>
  <tr>
    <td colspan="2"><FONT SIZE=1>N/S: {{$ns}}</FONT></td>
    <td colspan="2"><FONT SIZE=1>IMEI: {{$imei}}</FONT></td>
    <td colspan=""><FONT SIZE=1>Color: {{$color}}</FONT></td>
    <td colspan="2"><FONT SIZE=1>Compañia: {{$compañia}}</FONT></td>
  </tr>
 </table>

                    <div class="table-responsive">
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <td colspan="5">Problema a reparar:
                                    <FONT SIZE=1> {{$problemacliente}}</FONT></td>
                                     <td colspan="5">Observaciones: <FONT SIZE=0> {{$diagnostico1}}</FONT></td>
                                </tr>
                                <tr>
                                  <td><FONT SIZE=0>Enciende: {{$benciende}}</FONT></td>
                                  <td><FONT SIZE=0>Botón de volumén: {{$bvolumen}}</FONT></td>
                                  <td><FONT SIZE=0>Botón de vibrador: {{$bvibrador}}</FONT></td>
                                  <td><FONT SIZE=0>Pantalla: {{$pantalla}}</FONT></td>
                                  <td><FONT SIZE=0>Touch: {{$touch}}</FONT></td>
                                  <td><FONT SIZE=0>Display: {{$display}}</FONT></td>
                                  <td><FONT SIZE=0>Cámara trasera: {{$ctrasera}}</FONT></td>
                                  <td><FONT SIZE=0>Cámara frontal: {{$cfrontal}}</FONT></td>
                                  <td><FONT SIZE=0>Centro de carga: {{$ccarga}}</FONT></td>
                                  <td><FONT SIZE=0>Altavoz: {{$altavoz}}</FONT></td>
                                </tr>

                                <tr>
                                  <td><FONT SIZE=0>Microfono: {{$microfono}}</FONT></td>
                                  <td><FONT SIZE=0>Marca: {{$marca}}</FONT></td>
                                  <td><FONT SIZE=0>Auricular: {{$auricular}}</FONT></td>
                                  <td><FONT SIZE=0>Bocina externa: {{$boexterna}}</FONT></td>
                                  <td><FONT SIZE=0>Jack: {{$jack}}</FONT></td>
                                  <td><FONT SIZE=0>Wifi: {{$wifi}}</FONT></td>
                                  <td><FONT SIZE=0>Bluetooth: {{$bluetooth}}</FONT></td>
                                  <td><FONT SIZE=0>Datos moviles: {{$datosm}}</FONT></td>
                                  <td><FONT SIZE=0>Bateria: {{$bateria}}</FONT></td>
                                  <td><FONT SIZE=0>Porta SIM: {{$portasim}}</FONT></td>
                                </tr>
                                <tr>
                                  <td><FONT SIZE=0>Sim: {{$sim}}</FONT></td>
                                  <td><FONT SIZE=0>Botón Home: {{$bhome}}</FONT></td>
                                  <td><FONT SIZE=0>Touch ID: {{$touchid}}</FONT></td>
                                  <td><FONT SIZE=0>Sensor de proximidad: {{$sensorp}}</FONT></td>
                                  <td><FONT SIZE=0>Carcasa: {{$carcasa}}</FONT></td>
                                  <td><FONT SIZE=0>Teclado: {{$teclado}}</FONT></td>
                                  <td><FONT SIZE=0>Señal: {{$señal}}</FONT></td>
 <td><FONT SIZE=0>Contraseña: {{$contraseña}}</FONT></td>
  <td><FONT SIZE=0>Telefono del cliente: {{$celular}}</FONT></td>
                                  <td><FONT SIZE=0></FONT></td>
                                </tr>

                             <tr>
                                  <td colspan="2"><strong>TOTAL: {{$costo}}</strong></td>
                                  <td colspan="2"><strong>Anticipo: {{$abonos}}</strong></td>
                                  <td colspan="8"><FONT SIZE=0>Le atendio: {{$receptor}}</FONT></td>
                                  <H6 align="center">Recibo el equipo ya reparado y quedo satisfecho con el servicio</H6>

                                  <H6 align="center">Nombre y firma aceptando las condiciones</H6>
                                  <H6 align="center">Declaro ser el dueño del equipo que traigo a reparar, y me comprometo a recogerlo en un plazo máximo de 5 días hábiles después de la fecha pactada de entrega, si no lo recojo, Ifiix podrá disponer del equipo sin previo aviso.</H6>
                              </tr>



                            </thead>
<FONT SIZE=0>{{$avi->politicas}}.{{$poli->politicas}}</FONT>
                        </table>

<table>
<thead>
  <tr>

    <td><img src= {{$imagen->politicas}} style="width:250%; max-width:550px;"> Sucursal: {{$claven}}</td>
    <td colspan=""><FONT SIZE=0>Fecha de Recepción: </FONT><FONT SIZE=1> {{$fecharecepcion}}</FONT></td>
    <td colspan=""><FONT SIZE=0>Fecha de Entrega:</FONT><FONT SIZE=1> {{$fechaentrega}}</FONT></td>
  </tr>

  <tr>
    <td colspan=""><FONT SIZE=0>Comprobante de entrega al cliente</FONT></td>
    <td colspan="1"><FONT SIZE=0>Nombre del cliente: {{$nombrecliente}}</FONT></td>
    <td><FONT SIZE=0>Folio: {{$id}} </FONT></td>
  </tr>

  <tr>
    <td><FONT SIZE=0>Marca: {{$marca}}</FONT></td>
    <td><FONT SIZE=0>Modelo: {{$modelo}}</FONT></td>
    <td><FONT SIZE=0>Tipo: {{$tipo}}</FONT></td>
  </tr>

                          </thead>
                          <tbody>
                            <tr>

                              <td colspan=""><FONT SIZE=0> Problema a reparar:</FONT>
                                    <FONT SIZE=0> {{$problemacliente}}</FONT></td>
                              <td colspan=""> <FONT SIZE=0> Observaciones: {{$diagnostico1}}</FONT></td>
                              <td colspan=""><strong>TOTAL: {{$costo}}</strong></td>
                            </tr>
                            <tr>
                              <H6 align="center">Nombre y firma aceptando las condiciones</H6>
                               <FONT SIZE=0 align="center">{{$pie->politicas}}</FONT>
                               <td colspan="3"><FONT SIZE=1>CONTAMOS CON SERVICIO A DOMICILIO.</FONT> <FONT SIZE=0>{{$dire->politicas}}</FONT></td>
                            </tr>

                          </tbody>
                        </table>
                    </div>







<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>








<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>
