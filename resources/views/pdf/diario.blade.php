<div class="container">
    <div class="row">
        <div class="col-xs-12">

  <table>

  <tr>
    <td> <img src="" style="width:800%; max-width:80px;"></td>
    <td colspan="2"><FONT SIZE=2>Reporte de ventas Diarias</FONT></td>
    <td colspan="3"><FONT SIZE=1>Fecha: {{$hoy}} </FONT></td>
    <td colspan="3"><FONT SIZE=1>Solicita: {!!Auth::user()->name!!}</FONT></td>
    <td colspan="1"></td>
    <td colspan="1"></td>

  </tr>
  <tr>
    <td colspan="1"><FONT SIZE=2>Efectivo (Servicios Finalizados) </FONT><FONT SIZE=1></FONT></td>
    <td colspan="2"><FONT SIZE=2>Depositos (Servicios Finalizados)</FONT><FONT SIZE=1></FONT></td>
    <td colspan="2"><FONT SIZE=2>Efectivo (Anticipos)</FONT><FONT SIZE=1></FONT></td>
     <td colspan="2"><FONT SIZE=2>Depositos (Anticipos)</FONT><FONT SIZE=1></FONT></td>
     <td colspan="2"><FONT SIZE=2>Efectivo (Cancelaciones)</FONT><FONT SIZE=1></FONT></td>
      <td colspan="2"><FONT SIZE=2>Depositos (Cancelaciones)</FONT><FONT SIZE=1></FONT></td>
  </tr>

  <tr>
    <td colspan="1"><FONT SIZE=2></FONT>$ {{$efectivoT}}</td>
    <td colspan="2"><FONT SIZE=2></FONT>$ {{$tarjetaT}}</td>
    <td colspan="2"><FONT SIZE=2></FONT>$ {{$efectivoA}}</td>
    <td colspan="2"><FONT SIZE=2></FONT>$ {{$tarejtaA}}</td>
    <td colspan="2"><FONT SIZE=2></FONT>$ {{$efectivoC}}</td>
    <td colspan="2"><FONT SIZE=2></FONT>$ {{$tarjetaC}}</td>
  </tr>

  <tr>
    <td colspan="1"><FONT SIZE=2>Total Efectivo:$ {{$efectivo}}</FONT><FONT SIZE=1></FONT></td>
    <td colspan="2"><FONT SIZE=2>Total Depositos:$ {{$tarjeta}}</FONT><FONT SIZE=1></FONT></td>
  </tr>

    <tr>
    <td colspan="1"><FONT SIZE=2>Utilidad al dia de hoy de todas las ordenes FINALIZADAS: $ {{$uti}}</FONT><FONT SIZE=1></FONT></td>
  </tr>
 </table>








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
