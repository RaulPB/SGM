<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <table>

  <tr>
    <td> <img src= {{$imagen->politicas}} style="width:400%; max-width:550px;"></td>
    <td colspan="">Folio: {{$servicio->id}}</td>
    <td colspan="3"><FONT SIZE=2>Nombre del cliente: {{$servicio->nombrecliente}}</FONT></td>
    <td colspan="">Sucursal: {{$claven}}</td>
    

  </tr>
  <tr>

    <td colspan="5"><FONT SIZE=1>Fecha de Recepción: </FONT><FONT SIZE=1> {{$servicio->fechaingreso}}</FONT></td>
    <td colspan="5"><FONT SIZE=1>Fecha de Entrega:</FONT><FONT SIZE=1> {{$servicio->fechaentrega}}</FONT></td>
    
  
  </tr>

  <tr>
    <td colspan="1"><FONT SIZE=1>Marca: {{$pcubi->marca}}</FONT></td>
    <td colspan="2"><FONT SIZE=1>Modelo: {{$pcubi->modelo}}</FONT></td>
    <td>Tipo: {{$pcubi->tipo}}</td>
    <td> <img src="https://scontent.fjal1-1.fna.fbcdn.net/v/t1.0-9/66456485_10157379911029110_4595801502789926912_n.jpg?_nc_cat=105&_nc_oc=AQnckzA6w3vrEjF0sKe0WPcDXu8SGpC2CL6lQdJzsZ4TjcFdHaEyw8t4EuDLel1mdh0&_nc_ht=scontent.fjal1-1.fna&oh=a09a1242443e18ee770cd3d0c494e576&oe=5DB9E50F" style="width:1300%; max-width:1050px;"> </td>
    <td><img src="https://scontent.fjal1-1.fna.fbcdn.net/v/t1.0-9/66598665_10157379911519110_6439490719395610624_n.jpg?_nc_cat=107&_nc_oc=AQnyCbUZsynjme2Meh-AZfzhirUnupnBtWcG1Ivp9djoUKa0xfvejjO6CfSpTKhZ9fA&_nc_ht=scontent.fjal1-1.fna&oh=b8ca2e17c44824300aa633ea50fe3de6&oe=5DB33076" style="width:1300%; max-width:400px;"> </FONT></td>
   

  </tr>
  <tr>
    <td colspan="2"><FONT SIZE=1>N/S: {{$pcubi->serie}}</FONT></td>
    <td colspan="2"><FONT SIZE=1>IMEI: </FONT></td>
    <td colspan=""><FONT SIZE=1>Color: {{$pcubi->color}}</FONT></td>
    
  </tr>
 </table>

                    <div class="table-responsive">
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <td colspan="5">Problema a reparar:
                                    <FONT SIZE=2> {{$servicio->problemacliente}}</FONT></td>
                                     <td colspan="5">Observaciones: <FONT SIZE=2> {{$servicio->diagnostico1}}</FONT></td>
                                </tr>
                                <tr>
                                  <td><FONT SIZE=0>Memoria: {{$pcubi->memoria}}</FONT></td>
                                  <td><FONT SIZE=0>Procesador: {{$pcubi->procesador}}</FONT></td>
                                  <td><FONT SIZE=0>¿Fue Abierto?: {{$pcubi->abierto}}</FONT></td>
                                  <td><FONT SIZE=0>¿Estuvo en contacto con agua?: {{$pcubi->mojado}}</FONT></td>
                                  <td><FONT SIZE=0>Sistema: {{$pcubi->sistema}}</FONT></td>
                                  <td><FONT SIZE=0>¿Enciende?: {{$pcubi->enciende}}</FONT></td>
                                  <td><FONT SIZE=0>Cargador: {{$pcubi->cargador}}</FONT></td>
                                  <td><FONT SIZE=0>No. cargador: {{$pcubi->nocargador}}</FONT></td>
                                  <td><FONT SIZE=0>Bisagras: {{$pcubi->bisagras}}</FONT></td>
                                  <td><FONT SIZE=0>Bateria: {{$pcubi->bateria}}</FONT></td>
                                </tr>

                                <tr>
                                  <td><FONT SIZE=0>Funciona bateria: {{$pcubi->funcionabateria}}</FONT></td>
                                  <td><FONT SIZE=0>Funciona pantalla: {{$pcubi->fpantalla}}</FONT></td>
                                  <td><FONT SIZE=0>Funciona disco: {{$pcubi->fdisco}}</FONT></td>
                                  <td><FONT SIZE=0>Capacidad de disco: {{$pcubi->disco}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona memoria?: {{$pcubi->fmemoria}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona teclado?: {{$pcubi->fteclado}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona touch?: {{$pcubi->ftouch}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona camara: {{$pcubi->fcamara}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona SD: {{$pcubi->flectora}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona unidad CD?: {{$pcubi->flectora}}</FONT></td>
                                </tr>

                                <tr>
                                  <td colspan="2"><strong>TOTAL: {{$servicio->costo}}</strong></td>
                                  <td colspan="2"><strong>Anticipo: {{$abonos}}</strong></td>
                                  <td colspan="8"><FONT SIZE=2>Le atendio: {{$servicio->receptor}}</FONT></td>
                                  <H6 align="center">Recibo el equipo ya reparado y quedo satisfecho con el servicio</H6>

                                  <H6 align="center">Nombre y firma aceptando las condiciones</H6>
                                  <H6 align="center">Declaro ser el dueño del equipo que traigo a reparar, y me comprometo a recogerlo en un plazo máximo de 5 días hábiles después de la fecha pactada de entrega, si no lo recojo, la empresa emisora de esta ordén podrá disponer del equipo sin previo aviso.</H6>
                               </tr>



                            </thead>
<FONT SIZE=0>{{$avi->politicas}}.{{$poli->politicas}}</FONT>
                        </table>

<table>
<thead>
  <tr>

    <td><img src= {{$imagen->politicas}} style="width:250%; max-width:550px;">Folio: {{$servicio->id}} </td>
    <td colspan=""><FONT SIZE=0>Fecha de Recepción: </FONT><FONT SIZE=1> {{$servicio->fechaingreso}}</FONT></td>
    <td colspan=""><FONT SIZE=0>Fecha de Entrega:</FONT><FONT SIZE=1> {{$servicio->fechaentrega}}</FONT></td>
  </tr>

  <tr>
    <td colspan=""><FONT SIZE=0>Comprobante de entrega al cliente</FONT></td>
    <td colspan="1"><FONT SIZE=0>Nombre del cliente: {{$servicio->nombrecliente}}</FONT></td>
    <td><FONT SIZE=2> Sucursal: {{$claven}}</FONT></td>
  </tr>

  <tr>
    <td><FONT SIZE=0>Marca: {{$pcubi->marca}}</FONT></td>
    <td><FONT SIZE=0>Modelo: {{$pcubi->modelo}}</FONT></td>
    <td><FONT SIZE=0>Tipo: {{$pcubi->tipo}}</FONT></td>
  </tr>

                          </thead>
                          <tbody>
                            <tr>

                              <td colspan=""><FONT SIZE=0> Problema a reparar:</FONT>
                                    <FONT SIZE=0> {{$servicio->problemacliente}}</FONT></td>
                              <td colspan=""> <FONT SIZE=0> Observaciones: {{$servicio->diagnostico1}}</FONT></td>
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
