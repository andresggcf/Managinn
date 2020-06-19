<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  require 'conexion.php';

  /*Query que muestra si el perfil tuvo "induccion"*/
  $queryProyecto = "SELECT p.* FROM proyecto p WHERE p.id = ".$_GET['proyecto'];
  $resultado = mysqli_query($db, $queryProyecto);
  $arregloProyecto = mysqli_fetch_array($resultado);

  $queryFechas = "SELECT DATE_FORMAT(fecha_inicio, '%d/%m/%Y') AS F_INICIO,
  DATE_FORMAT(DATE_ADD(fecha_inicio, INTERVAL ".$arregloProyecto['duracion_meses']." MONTH), '%d/%m/%Y') AS F_FIN
  FROM
  	proyecto
  WHERE
    id = ".$_GET['proyecto'];
  $resultadoFechas = mysqli_query($db, $queryFechas);
  $arregloFechas = mysqli_fetch_array($resultadoFechas);

  $queryf2 = "SELECT fecha_inicio AS F_INICIO,
  DATE_ADD(fecha_inicio, INTERVAL ".$arregloProyecto['duracion_meses']." MONTH) AS F_FIN
  FROM
  	proyecto
  WHERE
    id = ".$_GET['proyecto'].";";

  $rf2 = mysqli_query($db, $queryf2);
  $af2 = mysqli_fetch_array($rf2);
  $fecha_inicio = $af2['F_INICIO'];
  $fecha_fin = $af2['F_FIN'];


  $queryDiasDur = "SELECT DATEDIFF('".$fecha_fin."','".$fecha_inicio."') AS DIAS_TOTALES, DATEDIFF(SYSDATE(), '".$fecha_inicio."') AS DIAS_PROGRESO;";
  $resDias = mysqli_query($db, $queryDiasDur);
  $arregloDias = mysqli_fetch_array($resDias);
  $diasTotales = $arregloDias['DIAS_TOTALES'];
  $diasProg = $arregloDias['DIAS_PROGRESO'];
  $porcentajePr = round(($diasProg/$diasTotales)*100);

  include("header.php");
  ?>

<body class="global-view panel_control presupuesto">
  <div class="NavBar">
    <div class="Contenedor-Menu d-flex align-items-center justify-content-end">
      <a href="#">
        <img src="img/iconos/solicitudes.svg" alt="">
      </a>
      <a href="#">
        <img src="img/iconos/icono-checklist.svg" alt="">
      </a>
      <a href="#">
        <img src="img/iconos/notificaciones.svg" alt="">
      </a>
      <a href="#">
        <img src="img/iconos/settings.svg" alt="">
      </a>
    </div>
  </div>

  <div class = "Columna-Perfil d-flex flex-column" style="position: fixed">
    <div class="icon_home" style="margin-bottom: 120px">
      <img src="img/iconos/inn.svg" width="180px" alt="" class="">
    </div>
    <div class = "Elementos-Perfil">
      <div class = "Botones-Perfil">
        <a class="Icono-Menu-Perfil current" href = "perfil.php">
          <img class="current-Icono" src="./img/iconos/icono_proyectos.svg" alt="Dashboard">
        </a>
        <a class="Icono-Menu-Perfil "  href = "global.php">
          <img src="./img/iconos/icono_global.svg" alt="Global">
        </a>
        <a class="Icono-Menu-Perfil " href = "personas.php">
          <img  src="./img/iconos/icono_personas.svg" alt="Personas">
        </a>
        <a class="Icono-Menu-Perfil" href = "presupuesto.php">
          <img src="./img/iconos/icono_presupuesto.svg" alt="Presupuesto">
        </a>
      </div>

      <div class = "Usuario-Perfil" style="margin-top: 110px"> 
        <img src = "./img/iconos/Icono-Perfil.png" alt="Icono" 
          height="45px"
          style = "border-radius: 5px; float: left; margin-right: 10px;">

        <div class = "Perfil-Dropdown-Container" style = "float: right;">
          <div class="btn-group dropright ">
            <button type="button" class="btn btn-secondary dropdown-toggle Boton-Dropdown" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu">
              <!-- Dropdown menu links -->
              <a style="color:#eb5757; margin-left: 15px" href = "index.php?logout='1'">Cerrar Sesión</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  

  
  <div class="Blanco-Fondo">
    <div class="contenedor_dash_perfil">
      <div class="dashboard_fluid">

        <div class="row" style="margin: 0 !important; width:100%">

          <div class="col-sm-4 col-card-tl" style="">
            <div class="card-dash-naranja row" style="margin: 0 !important;">
              <div class="col-sm-8">
                <p style="margin-bottom: 0px; color: white">Estás viendo el proyecto:</p> 
                <h2 style="color: white;"><?php echo $arregloProyecto['nombre'];?></h2>
                <p style="margin-bottom: 0px ; color: white">Inició en: <?php echo $arregloFechas['F_INICIO']; ?></p> 
                <p style="margin-bottom: 15px; width: 330px; color: white">Final estimado en: <?php echo $arregloFechas['F_FIN']; ?></p> 
              </div>
              <div class="col-sm-4">
                <img src="img/iconos/icono-dash-proyecto.png" alt="Saludo">
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-card-tc" style="">
            <div class="card-dash-blanco">
              <h4 class="uppercase" style="margin: 25px 0 0 35px; letter-spacing: 5px;"> 
                <img src="img/iconos/icono_dias_activo.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> ESTADO
              </h4>
              <div class="progress" style="background-color: rgba(23, 174, 191, 0.2); 
                width: 100%; 
                height: 30px;
                margin-top: 40px;
                margin-bottom: 10px;
                position: relative;">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $porcentajePr?>%; height: 30px; position: absolute;
                  background-color: #17AEBF !important" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                </div>
                <div id="barra-avance" class="progress-bar" role="progressbar" style="width: <?php echo $arregloProyecto['progreso']?>%; height: 30px; position: absolute;
                background-color: <?php
                if($porcentajePr-$arregloProyecto['progreso'] <= 5)
                {
                  echo "#30CF5D !important";
                } 
                else if ($porcentajePr-$arregloProyecto['progreso'] > 5 and $porcentajePr-$arregloProyecto['progreso'] <= 20)
                {
                  echo "#FBD534 !important";
                }
                else
                {
                  echo "#EB5757 !important";
                }
                ?>"
                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <div class="containter-estados row" style= "margin: 0">
                <div class="col-sm-5">
                  <a id= "boton-avance" style="width: 20px; 
                    height: 20px; 
                    border-radius: 30px;
                    margin-top: 5px; 
                    float: left;"
                    href="cambio1.php?id=<?php echo $_GET['proyecto']?>"></a>
                  <p id="percent-avance"style="margin: 3px 0 0 25px;">Avance real: <span
                      style="font-weight: 700"><?php echo $arregloProyecto['progreso']?>%</span></p>
                </div>
                <div class="col-sm-7">
                  <a style="width: 20px; 
                    height: 20px; 
                    border-radius: 30px; 
                    margin-top: 5px; 
                    background-color: #17AEBF;
                    float: left;"
                    href="cambio2.php?id=<?php echo $_GET['proyecto']?>"></a>
                   <p style="color: #17AEBF;
                    margin: 3px 0 0 25px;
                    ">Esperado: <span
                      style="font-weight: 700"><?php echo $porcentajePr?>%</span></p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-card-tr" style="">
            <div class="card-dash-azul row" style="margin: 0 !important">
              <div class="col-sm-8">
                <h4 class="uppercase" style="color:white !important;  letter-spacing: 5px;"> 
                  <img src="img/iconos/icono-etapa.svg" alt="Dias activos" class="img_icons" 
                  style="margin-right: 15px;"> ETAPA ACTUAL
                </h4>
                <h2 style="color: white; margin-top: 20px; margin-left: 25%"><?php 
                if($arregloProyecto['etapa']=="Investigacion")
                {
                  echo "Investigación";
                }
                else if ($arregloProyecto['etapa']=="Definicion")
                {
                  echo "Definición";
                }
                else if ($arregloProyecto['etapa']=="Implementacion")
                {
                  echo "Implementación";
                }
                else if ($arregloProyecto['etapa']=="Correcion")
                {
                  echo "Corrección";
                }
                else
                {
                  echo "Lanzamiento";
                }?></h2>
              </div>
              <div class="col-sm-4" style="position:relative">
                <img style="position: absolute; right: 0; bottom: 0px; height: 200px"
                src="img/iconos/icono-dash-proyecto2.svg" alt="Saludo">
              </div>
            </div>
          </div>
        </div> <!-- fin row-->

        <div class="row" style="margin: 0; width:100%; height: 440px">
          <div class="col-sm-8 col-card-cl" style="height: 100%">
            <div class="card-dash-blanco" style="height: 100%">
              <h4 class="uppercase" style="margin: 25px 0 0 35px; letter-spacing: 5px;"> 
                <img src="img/iconos/icono-desempeno.svg " alt="Dias activos" class="img_icons" style="margin-right: 15px"> DESEMPEÑO DE ESTE PROYECTO
              </h4>
              <div class="row" style="height: 30px; width: 100%;">
                <div class="col-sm-3" >
                </div>
                <div class="col-sm-3" >
                </div>
                <div class="col-sm-3" style="width: 100%;">
                  <div style="width: 20px; 
                    height: 20px; 
                    border-radius: 30px;
                    margin-top: 5px; 
                    background-color: #17AEBF;
                    float: left;"></div>
                  <p style="color: #17AEBF;
                    margin: 3px 0 0 25px;">Actividades Programadas</p>
                </div>
                <div class="col-sm-3" style="width: 100%;">
                  <div style="width: 20px; 
                    height: 20px; 
                    border-radius: 30px;
                    margin-top: 5px; 
                    background-color: #eb5757;
                    float: left;"></div>
                  <p style="color: #eb5757;
                    margin: 3px 0 0 25px;">Actividades Completadas</p>
                </div>
              </div>
              <div style="width:100%; height: 75%; margin-top: 0px; position: relative">
                <canvas id="chartProyecto" class="bg-color grafica" style="width: 100%; height: 100%"></canvas>
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-card-cr" style="height: 100%">

            <div class="card-dash-blanco" style="min-height: 45% !important; margin-bottom: 40px">
              <h4 class="uppercase" style="margin: 25px 0 0 35px; letter-spacing: 5px;"> 
                <img src="img/iconos/icono-equipo.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> EQUIPO ASIGNADO
              </h4>
              <div class="row" style="margin: 0; padding: 15px 30px;">

                <div class="col-sm-3" style="height: 100%;">
                  <img src = "./img/iconos/Icono-Perfil.png" alt="Icono" 
                    height="45px"
                    style = "border-radius: 45px; float: left; margin-left: 22px;">
                  <p class="Texto-Nombre-Perfil Text-Center" style="color: #131A40"><strong><?php echo $nombre;?></strong></p>
                  <p class="Texto-Rol-Perfil Text-Center" style="color: #131A40"><?php echo $rol?></p>
                </div>

                <?php 
                  require 'conexion.php';

                  $queryEquipo = "SELECT e.id_usuario, u.nombre, u.rol 
                  FROM equipos e 
                  INNER JOIN usuarios u 
                  ON e.id_usuario = u.id 
                  WHERE e.id_proyecto = ".$_GET['proyecto']."
                  AND u.id NOT IN (
                    SELECT us.id 
                    FROM usuarios us 
                    WHERE correo = '$correo') 
                  LIMIT 3;";

                  if ($result = mysqli_query($db, $queryEquipo))
                  {
                    while ($row = mysqli_fetch_assoc($result)) 
                    { 
                      ?>
                      <div class="col-sm-3" style="height: 100%;">
                        <img src = "./img/iconos/Icono-Perfil.png" alt="Icono" 
                        height="45px"
                        style = "border-radius: 45px; float: left; margin-left: 22px;">
                        <p class="Texto-Nombre-Perfil Text-Center" style="color: #131A40"><strong><?php echo $row['nombre'];?></strong></p>
                        <p class="Texto-Rol-Perfil Text-Center" style="color: #131A40"><?php echo $row['rol'];?></p>
                      </div>
                    <?php
                    }
                  }
                ?>    
              </div>
            </div>

            <div class="card-dash-blanco" style="min-height: 180px !important;">
              <h4 class="uppercase" style="margin: 25px 0 0 35px; letter-spacing: 5px;"> 
                <img src="img/iconos/icono-presupuesto.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> PRESUPUESTO USADO
              </h4>
              <div style="margin-top: 20px;">
                <div style="margin-left: 35px">
                    <h1 style="margin-left: 45px; letter-spacing:0.085em"><strong style="color:#17AEBF;">$ </strong> <?php echo number_format($arregloProyecto['presupuesto_usado'], 0, ',', '.'); ?></h1>
                    <h4 style="margin-left: 90px; font-weight: 300; letter-spacing:0.085em"><strong style="color:#17AEBF">de</strong> $ <?php echo number_format($arregloProyecto['presupuesto_inicial'], 0, ',', '.');?></h4>
                  </div>
              </div>
            </div>

          </div>
        </div><!-- fin row-->

        <div class="row" style="margin: 0; width:100%">
          <div class="col-sm-5 col-card-bl" style="">
            <div class="card-dash-blanco">
              <h4 class="uppercase" style="margin: 25px 0 0 35px; letter-spacing: 5px;"> 
                <img src="img/iconos/icono-evaluacion.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> EVALUACIÓN DEL PROYECTO
              </h4>
              <div class="row" style= "margin: 15px 0px">
                <div class="col-sm-4">
                  <div class="card-azul">
                    <h2 class= "text-center" style="color:white"><?php echo rand(0,5)?>/10</h2>
                    <p class= "text-center" style="color:white; margin-bottom: 0; font-size: 10pt">VALOR<br>GENERADO</p>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card-azul">
                    <h2 class= "text-center" style="color:white"><?php echo rand(1,5)?>/10</h2>
                    <p class= "text-center" style="color:white; margin-bottom: 0; font-size: 10pt">NIVEL DE<br>DIFERENCIACION</p>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card-azul">
                    <h2 class= "text-center" style="color:white">
                <?php
                if($arregloProyecto['etapa']=="Investigacion")
                {
                  echo 2;
                }
                else if ($arregloProyecto['etapa']=="Definicion")
                {
                  echo 4;
                }
                else if ($arregloProyecto['etapa']=="Implementacion")
                {
                  echo 6;
                }
                else if ($arregloProyecto['etapa']=="Correcion")
                {
                  echo 8;
                }
                else
                {
                  echo 10;
                }
                ?>/10</h2>
                    <p class= "text-center" style="color:white; margin-bottom: 0; font-size: 10pt">NIVEL DE<br>IMPLEMENTACION</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-card-bc" style="">
            <div class="card-dash-blanco">
              <h4 class="uppercase" style="margin: 25px 0 0 35px; color: rgba(0,0,0, 0.3); letter-spacing: 5px;"> 
                <img src="img/iconos/icono-roi.svg" alt="Dias activos" class="img_icons" 
                  style="margin-right: 15px; 
                    filter: saturate(100%) brightness(100%) opacity(40%) contrast(100%) !important;"> ROI
              </h4>
              <div style="margin-top: 20px">
                <h1 class = "Text-Center" style="color: rgba(0,0,0, 0.3)">0 %</h1>
                <p class = "Text-Center" style="font-weight: 900; color: rgba(0,0,0, 0.3)">NEGATIVO ( &lt 0 )</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-card-br" style="">
            <div class="card-dash-blanco">
              <h4 class="uppercase" style="margin: 25px 0 0 35px; color: rgba(0,0,0, 0.3); letter-spacing: 5px;"> 
                <img src="img/iconos/icono-activo.svg" alt="Dias activos" class="img_icons" 
                style="margin-right: 15px;
                  filter: saturate(100%) brightness(100%) opacity(40%) contrast(100%) !important;"> ACTIVO
              </h4>
              <div style="margin-top: 20px">
                <h1 class = "Text-Center" style="color: rgba(0,0,0, 0.3)">$ 0</h1>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div> <!--Fin Dashboard-perfil -->
  </div> <!--Fin Blanco-Fondo-->

  <style>
    /* Hide all steps by default: */
  .tab {
    display: none;
  }
  </style>
  
	<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace("HOST", location.hostname));
  //]]></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script type="text/javascript">
    function colorpr()
    {
      var diferencia = <?php echo $porcentajePr?> - <?php echo $arregloProyecto['progreso']?>;
      if(diferencia <= 5)
      {
        //verde
        console.log("menor a 5");
        document.getElementById("percent-avance").style.color = "#30CF5D";
        document.getElementById("boton-avance").style.backgroundColor="#30CF5D";
      }
      else if (diferencia > 5 && diferencia <= 20)
      {
        //amarillo
        console.log("entre 6 y 20");
        document.getElementById("percent-avance").style.color = "#FBD534";
        document.getElementById("boton-avance").style.backgroundColor="#FBD534";
      }
      else
      {
        //rojo
        console.log("mayor a 20");
        document.getElementById("percent-avance").style.color = "#EB5757";
        document.getElementById("boton-avance").style.backgroundColor="#EB5757";
      }
    }


    //Grafica de proyectos
    var ctx4 = document.getElementById('chartProyecto');
    var blue = "#17AEBF";
    var blue_alpha = "#17AEBF7A";
    var red = "#EB5757";
    var red_alpha = "#EB57577A";
    var datapr = [
      <?php echo $arregloProyecto['investigacion_p']?>, 
      <?php echo $arregloProyecto['definicion_p']?>, 
      <?php echo $arregloProyecto['implementacion_p']?>, 
      <?php echo $arregloProyecto['correccion_p']?>, 
      <?php echo $arregloProyecto['lanzamiento_p']?>
    ];
    var datapr2 = [
      <?php echo $arregloProyecto['investigacion_c']?>, 
      <?php echo $arregloProyecto['definicion_c']?>, 
      <?php echo $arregloProyecto['implementacion_c']?>, 
      <?php echo $arregloProyecto['correccion_c']?>, 
      <?php echo $arregloProyecto['lanzamiento_c']?>
    ];

    if(ctx4){
      var chartProyecto = new Chart(ctx4,{
        type: 'bar',
        data: {
          labels: ['INVESTIGACIÓN', 'DEFINICIÓN', 'IMPLEMENTACIÓN', 'CORRECCIÓN', 'LANZAMIENTO'],
          datasets: 
          [
            {
              data: datapr,
              backgroundColor:[
                blue,
                blue,
                blue,
                blue,
                blue
              ],
              barThickness: 15
            },
            {
              data: datapr2,
              backgroundColor:[
                red,
                red,
                red,
                red,
                red
              ],
              barThickness: 15
            },
          ]
        },
        options: {
          scales: {
            yAxes:[{
              //stacked: true,
              ticks: {
                min: 0,
                max: 50,
                stepSize: 10,
                fontSize:10,
                fontColor:'#131A40'
              },
              scaleLabel: {
                display: true,
                labelString: 'Actividades',
                fontStyle: 'bold',
                fontSize:12,
                fontColor:'#131a40',
              }
            }],
            xAxes:[{
              //stacked: true,
              scaleLabel: {
                display: true,
                labelString: 'Etapa',
                fontStyle: 'bold',
                fontSize:12,
                fontColor:'#131A40',
              },
              gridLines: {
                display: false,
                tickMarkLength: 8
              },
              ticks:{
                fontSize:10,
                fontColor:'#131A40',
              }
            }]
          },
          legend: {
            display: false,
          },
          layout: {
            padding: {
              left: 10,
              right: 10,
              top: 10,
              bottom: 10
            }
          }
        }
      });
    }

    colorpr();
  </script>
</body>