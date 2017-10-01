 <html lang="en">


      <body>
        <br><br>
            <div class="col-lg-6" ALIGN=center>
                <table class="col-lg-12">
              <thead>
                <tr>
                <th><img src="https://scontent.fjal1-1.fna.fbcdn.net/v/t1.0-9/13906759_1072074689494467_437567419571137602_n.jpg?oh=cacafd009db1984aed32cd8004aa0219&oe=5A4BF0D5" style="width:500%; max-width:150px;" ></th>
                  
                </tr>

              </thead>
              <tbody>
                <tr>

                </tr>
              </tbody>
            </table>

            
            <div class="col-lg-10 col-md-10 col-sm-12"><br><br></div>
            <h4 class="">Reporte de de ventas del:  {{$fechauno}} al {{$fechados}} </h4>
            <h4 class=""></h4>
            <div style="background-color: #3867b7; height: 16px"></div>
                      <table  WIDTH="100%" style="text-align:center;"   border-collapse: separate;>
                        <thead >
                          <tr>
                              <th colspan="2" ALIGN="center">No. Servicio</th>
                              <th colspan="2" ALIGN="center">Cliente</th>
                               <th colspan="80" ALIGN="center">Fecha de recepción</th>
                               <th colspan="30" ALIGN="center">Pago 1</th>
                              <th colspan="30" ALIGN="center">Pago2</th>
                              <th colspan="30" ALIGN="center">Pago3</th>
                              <th colspan="30" ALIGN="center">Pago4</th>
                              <th colspan="30" ALIGN="center">Pago5</th>

                          </tr>
                        </thead>
                        <tbody>
                      @foreach($gr as $grs)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechaingreso))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono1}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono2}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono3}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono4}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono5}}</td>
                          </tr>
                      @endforeach


                      <tr><H3> </H3></tr>
                        </tbody>
                    </table>





                  <br>
                 <div class="col-lg-20">
                    <br><br>
                     <H3> Total Global en efectivo: $ {{$efectivo}}  </H3>
                     
                     <H3> Total Global en tarjeta(debito/credito): $ {{$efectivo1}}  </H3>
                     
                     <H3> Total Global en transferencias: $ {{$efectivo2}}  </H3>
                     
                     <H3> Total Global en depositos: $ {{$efectivo3}}  </H3>
                     
                     <H3> Total Global en PayPal: $ {{$efectivo4}}  </H3>
                </div>

</div>
      </body>
    </html>
