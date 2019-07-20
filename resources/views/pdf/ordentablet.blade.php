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
    <td colspan="1"><FONT SIZE=2>Marca: {{$pcubi->marcat}}</FONT></td>
    <td colspan="2"><FONT SIZE=2>Modelo: {{$pcubi->modelot}}</FONT></td>
    <td colspan="2"><FONT SIZE=2>Tipo: {{$pcubi->tipot}}</FONT></td>
    <td> <img src="https://scontent.fjal1-1.fna.fbcdn.net/v/t1.0-9/66656965_10157380017544110_7893547958971400192_n.jpg?_nc_cat=103&_nc_oc=AQlTJ97KyTFoI3U_CHwNOS4M8_dO-1--1G3Ey2Zbtk6ltK_-OtXtQ0hc7MKSYj_6IVk&_nc_ht=scontent.fjal1-1.fna&oh=1ebb23607d6673904a6ec63e7a057ca4&oe=5DB3F1B8" style="width:1300%; max-width:1050px;"> </td>
  </tr>
  <tr>
    <td colspan="5"><FONT SIZE=1>N/S: {{$pcubi->seriet}}</FONT></td>
    <td colspan="5"><FONT SIZE=1>Color: {{$pcubi->colort}}</FONT></td>
    
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
                                  <td><FONT SIZE=0>Memoria: {{$pcubi->memoriat}}</FONT></td>
                                  <td><FONT SIZE=0>Procesador: {{$pcubi->procesadort}}</FONT></td>
                                  <td><FONT SIZE=0>¿Fue Abierto?: {{$pcubi->reparadot}}</FONT></td>
                                  <td><FONT SIZE=0>¿Estuvo en contacto con agua?: {{$pcubi->aguat}}</FONT></td>
                                  <td><FONT SIZE=0>Sistema: {{$pcubi->sistemat}}</FONT></td>
                                  <td><FONT SIZE=0>¿Enciende?: {{$pcubi->enciendet}}</FONT></td>
                                  <td><FONT SIZE=0>Cargador: {{$pcubi->cargadort}}</FONT></td>
                                  <td><FONT SIZE=0>No. cargador: {{$pcubi->seriecargadort}}</FONT></td>
                                  <td><FONT SIZE=0>Bateria: {{$pcubi->bateriat}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funcionan bluetooth?: {{$pcubi->blut}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funcionan datos 3G?: {{$pcubi->datosmt}}</FONT></td>
                                  
                                </tr>

                                <tr>
                                  <td><FONT SIZE=0>Funciona bateria: {{$pcubi->funcionabateriat}}</FONT></td>
                                  <td><FONT SIZE=0>Funciona pantalla: {{$pcubi->pantallat}}</FONT></td>
                                  <td><FONT SIZE=0>Funciona disco: {{$pcubi->discot}}</FONT></td>
                                  <td><FONT SIZE=0>Funciona altavoz: {{$pcubi->altavozt}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona camara frontal?: {{$pcubi->camaradt}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona camara trasera?: {{$pcubi->camaratt}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona touch?: {{$pcubi->toucht}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona jack de audio: {{$pcubi->jackt}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funciona WIFI: {{$pcubi->wifit}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funcionan sensores?: {{$pcubi->sensort}}</FONT></td>
                                  <td><FONT SIZE=0>¿Funcionan centro de carga?: {{$pcubi->ccargat}}</FONT>
                                  </td>
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

    <td colspan="1"><img src= {{$imagen->politicas}} style="width:250%; max-width:550px;">Folio: {{$servicio->id}} </td>
    <td colspan="3"><FONT SIZE=0>Fecha de Recepción: </FONT><FONT SIZE=1> {{$servicio->fechaingreso}}</FONT></td>
    <td colspan="3"><FONT SIZE=0>Fecha de Entrega:</FONT><FONT SIZE=1> {{$servicio->fechaentrega}}</FONT></td>
  </tr>

  <tr>
    
    <td colspan="4"><FONT SIZE=0>Nombre del cliente: {{$servicio->nombrecliente}}</FONT></td>
    <td colspan="3"><FONT SIZE=2> Sucursal: {{$claven}}</FONT></td>
  </tr>

  <tr>
    <td><FONT SIZE=0>Marca: {{$pcubi->marcat}}</FONT></td>
    <td><FONT SIZE=0>Modelo: {{$pcubi->modelot}}</FONT></td>
    <td><FONT SIZE=0>Tipo: {{$pcubi->tipot}}</FONT></td>
  </tr>

                          </thead>
                          <tbody>
                            <tr>

                              <td colspan="2"><FONT SIZE=0> Problema a reparar:</FONT>
                                    <FONT SIZE=0> {{$servicio->problemacliente}}</FONT></td>
                              <td colspan="2"> <FONT SIZE=0> Observaciones: {{$servicio->diagnostico1}}</FONT></td>
                              <td colspan="3"><strong>TOTAL: {{$costo}}</strong></td>
                            </tr>
                            <tr>
                              <H6 align="center">Nombre y firma aceptando las condiciones</H6>
                               <FONT SIZE=0 align="center">{{$pie->politicas}}</FONT>
                               <td colspan="7"><FONT SIZE=1>CONTAMOS CON SERVICIO A DOMICILIO.</FONT> <FONT SIZE=0>{{$dire->politicas}}</FONT></td>
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
