    @extends('layouts.admin')
    @section('content')
<head>
  <title>Encuesta al cliente</title>
</head>

<script type="text/javascript" src="https://www.google.com/jsapi"></script> 
<body>


<div  align="center"> <img src={{$imagen->politicas}} style="width:500%; max-width:250px;" > </div>
FECHA DE CONSULTA: {{$hoy}} 
<div style="background-color: #3867b7; height: 16px"></div>

TOTAL DE CLIENTES ENCUESTADOS: {{$suma}}
<div id="GraficoGoogleChart-ejemplo-1" style="width: 900px; height: 700px"></div>

</body>

<script>
  google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(dibujarGrafico);
   function dibujarGrafico() {
     // Tabla de datos: valores y etiquetas de la gráfica
     var data = google.visualization.arrayToDataTable([
       ['Sucursal 1', '¿Como se entero de nosotros al dia de hoy?'],
       ['Correo', {{$correo}}],
       ['Espectacular', {{$espectacular}}],
       ['Publicacion', {{$publicacion}}],
       ['Local', {{$local}}],
       ['Recomendación', {{$recomendacion}}],
       ['Medallon', {{$medallon}}],
       ['Flechas', {{$flechas}}],
       ['Redes', {{$redes}}],
       ['Web', {{$web}}],
       ['Busqueda en Google', {{$google}}],
       ['Negocio', {{$otronegocio}}],
       ['Otros', {{$otros}}],

     ]);
     var options = {
       title: '¿Como se entero de nosotros al dia de hoy?',
       is3D: true,
     }
     // Dibujar el gráfico
     new google.visualization.PieChart( 
     //ColumnChart sería el tipo de gráfico a dibujar
       document.getElementById('GraficoGoogleChart-ejemplo-1')
     ).draw(data, options);
   }
 </script>
@stop()

