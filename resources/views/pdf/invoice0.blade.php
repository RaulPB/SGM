<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Nota de venta</title>

</head>

<body>
  <br><br>
  <div class="col-lg-12">
    <table class="col-lg-12" align="center">
      <thead>
        <tr>
          <th><img src="https://scontent.fjal1-1.fna.fbcdn.net/v/t1.0-9/11403237_877024122332859_5771792069315024696_n.jpg?oh=968b51f2dd93c12b4f41350afb9d240a&oe=5A172DDB" style="width:800%; max-width:200px;"></th>
          <th></th>
          <th style="text-align: center">
            <FONT SIZE=0>
              <pre>Dahab García Ávila</pre>
              <pre>R.F.C GAAD8703172M6</pre>
              <pre>CURP. GAAD870317HVZRVH03</pre>
              <pre>Pedro de Alvarado #533-bis Fracc. Reforma C.P. 91919 Veracruz, Ver-</pre>
              <pre>Cuauhtémoc #4254 casi esq. Alcocer. Col. Centro C.P 91700 Veracruz, Ver.</pre>
              <pre>facturasifiix@gmail.com</pre>
              <pre>Tel: 2299379301 & 3345634</pre>
              <pre>Whatsapp: 2291169546 & 2293567746</pre>
            </FONT>
          </th>

          <th></th>
        </tr>
      </thead>
    </table>

    <table width="80%"  border="1" align="center" cellspacing="0" cellpadding="5">
      <tbody>
        <tr>
          <td colspan="2" align="left"> Nota de venta: {{$claven}}{{$cont}} </th>
            <td colspan="3" align="center"> Fecha: {{\Carbon\Carbon::now()}} </td>
          </tr>
          <tr>
            <td colspan="">Nombre: {{$nombrecliente}}</td>
            <td colspan="">Modelo: {{$marca}} {{$modelo}}</td>
            <td colspan="3">Telefono/whatsapp:{{$telefono}}</td>
          </tr>

          <tr>
            <td colspan="3" align="center">Detalles:</td>
            <td colspan="2" align="center">Anticipos</td>
          <!--  <td colspan="1" align="center">Anticipo 2</td> -->
          </tr>
          <tr>
            <td  height="3" colspan="3">{{$diagnostico2}}</td>
            <td colspan="2" align="center">$ {{$pago1}}</td>
          </tr>
          <tr>
            <td  height="3" colspan="3"></td>
            <td colspan="2" align="center">$ {{$pago2}}</td>
          </tr>
          <tr>
            <td  height="3" colspan="3"></td>
            <td colspan="2" align="center">$ {{$pago3}}</td>
          </tr>
          <tr>
            <td  height="3" colspan="3"></td>
            <td colspan="2" align="center">${{$pago4}}</td>
          </tr>
          <tr>
            <td  height="3" colspan="3"></td>
            <td colspan="2" align="center">$ {{$pago5}}</td>
          </tr>

          <tr>
            <td colspan="3">Dia y hora de entrega: {{\Carbon\Carbon::now()}}</td>
            <td colspan="2"></td>
          </tr>

          <tr>
            <td colspan="3" align="left"> Cantidad con letra: {{$letras}}</td>
            <FONT SIZE=1><td colspan="2" align="left">Total:$ {{$costo}} M.N.</td></FONT>
          </tr>

          <tr><FONT SIZE=1>
            <td height="50"colspan="2">Aviso importante: El plazo para recoger su equipo es de 5 dias habiles a partir de la fecha de la entrega programada
            , transcurrido este tiempo. Ifiix podra disponer de su equipo. Si el equipo no es recogido inmediatamente se enviara a planta donde se destinara
          al "Programa de reciclaje" sin previo aviso y sin que esto represente una obligación de nuestra parte con el cliente. *El cliente acepta una vez
        que Ifiix abra el equipo pierde la garantia de fabrica con la marca.</td>
            <td colspan="3">Politicas de garantia:
            <pre>*La garantia solo es valida por defectos de fabrica.</pre>
          <pre>*La garantia NO es valida cuando haya:</pre>
          <pre>-Sufrido un golpe o enmendadura.</pre>
        <pre>-Estado en contacto con cualquier tipo de liquido.</pre>
      <pre>-Tenido corto circuito debido a cambio de voltaje.</pre>
    <pre>-Sido abierto por una persona ajena a Ifiix.</pre>
  <pre>*En equipos reparados por estar mojados NO HAY GARANTIA.</pre>
  <pre>*SIN EXCEPCION es necesario presentar su nota de venta para aplicación de garantía.</pre>
  <pre>*Tiempo de respuesta de su garantia es de 2 a 7 días hábiles.</pre>
  <pre>*En ningún caso Ifiix se hace responsable de los gastos extraordinarios </pre>
    <pre>que le ocacionen aplicar su garantia.</pre>
  </td>
</FONT>
          </tr>

        </tbody>
      </table>







    </div>
  </body>
  </html>
