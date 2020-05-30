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

  include("header.php");
  ?>

<body class="global-view panel_control presupuesto">

  <div class = "Columna-Perfil d-flex flex-column">
    <div class="icon_home">
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

      <div class = "Usuario-Perfil"> 

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
              <h4 class="uppercase" style="margin: 25px 0 0 35px"> 
                <img src="img/iconos/icono_dias_activo.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> ESTADO
              </h4>
            </div>
          </div>

          <div class="col-sm-4 col-card-tr" style="">
            <div class="card-dash-azul row" style="margin: 0 !important">
              <div class="col-sm-8">
                <h4 class="uppercase" style="color:white !important"> 
                  <img src="img/iconos/icono-etapa.svg" alt="Dias activos" class="img_icons" 
                  style="margin-right: 15px;"> ETAPA ACTUAL
                </h4>
                <h2 style="color: white; margin-top: 20px; margin-left: 40%">Definición</h2>
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
              <h4 class="uppercase" style="margin: 25px 0 0 35px"> 
                <img src="img/iconos/icono-desempeno.svg " alt="Dias activos" class="img_icons" style="margin-right: 15px"> DESEMPEÑO DE ESTE PROYECTO
              </h4>
            </div>
          </div>

          <div class="col-sm-4 col-card-cr" style="height: 100%">

            <div class="card-dash-blanco" style="min-height: 45% !important; margin-bottom: 40px">
              <h4 class="uppercase" style="margin: 25px 0 0 35px"> 
                <img src="img/iconos/icono-equipo.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> EQUIPO ASIGNADO
              </h4>
            </div>

            <div class="card-dash-blanco" style="min-height: 180px !important;">
              <h4 class="uppercase" style="margin: 25px 0 0 35px"> 
                <img src="img/iconos/icono-presupuesto.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> PRESUPUESTO USADO
              </h4>
              <div style="margin-top: 20px;">
                <div style="margin-left: 35px">
                    <h1 style="margin-left: 45px"><strong style="color:#17AEBF">$ </strong> <?php echo number_format(rand(5000, $arregloProyecto['presupuesto_inicial']-($arregloProyecto['presupuesto_inicial']/3)), 0, ',', '.'); ?></h1>
                    <h4 style="margin-left: 90px; font-weight: 300"><strong style="color:#17AEBF">de</strong> $ <?php echo number_format($arregloProyecto['presupuesto_inicial'], 0, ',', '.');?></h4>
                  </div>
              </div>
            </div>

          </div>
        </div><!-- fin row-->

        <div class="row" style="margin: 0; width:100%">
          <div class="col-sm-5 col-card-bl" style="">
            <div class="card-dash-blanco">
              <h4 class="uppercase" style="margin: 25px 0 0 35px"> 
                <img src="img/iconos/icono-evaluacion.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> EVALUACIÓN DEL PROYECTO
              </h4>
            </div>
          </div>
          <div class="col-sm-3 col-card-bc" style="">
            <div class="card-dash-blanco">
              <h4 class="uppercase" style="margin: 25px 0 0 35px"> 
                <img src="img/iconos/icono-roi.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> ROI
              </h4>
            </div>
          </div>
          <div class="col-sm-4 col-card-br" style="">
            <div class="card-dash-blanco">
              <h4 class="uppercase" style="margin: 25px 0 0 35px"> 
                <img src="img/iconos/icono-activo.svg" alt="Dias activos" class="img_icons" style="margin-right: 15px"> ACTIVO
              </h4>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div id="Dashboard-Global" class="contenedor_dashboard" style="display: none"> <!--Inicio Dashboard-Global -->
      <div class="container-fluid">
        <div class="row kpi">
          <div class="col-4 my-3">
            <div class="info_general px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center">
              <div class="nombre" style="max-width:85%">
                <p style="margin-bottom: 0px">Estás viendo el proyecto:</p> 
                <h2><?php echo $arregloProyecto['nombre'];?></h2>
                <p style="margin-bottom: 0px">Inició en: <?php echo $arregloFechas['F_INICIO']; ?></p> 
                <p style="margin-bottom: 15px; width: 330px">Final estimado en: <?php echo $arregloFechas['F_FIN']; ?></p> 
              </div>

              <div class="mes d-flex flex-row align-items-center">
                <a id="less_month" href="#"><</a>
                <span id="mes_actual">Diciembre</span>
                <a id="more_month" href="#">></a>
              </div>

              <div class="imagen">
                <img src="img/iconos/ilustracion_saludo.svg" alt="Saludo">
              </div>
            </div>
          </div>

          <div class="col-4 my-3">
            <div class="escalamiento box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center">
              <img src="img/iconos/EscalamientoPromedio.svg" alt="escalamiento">
              <div class="texto_escalamiento">
                <h4  class="uppercase">Escalamiento promedio</h4>
                <span id="escalamiento">
                  0%
                </span>
              </div>
            </div>
          </div>

          <div class="col-4 my-3">
            <div class="conversion box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center">
              <img src="img/iconos/tasadeconversion.svg" alt="conversion">
              <div class="texto_escalamiento">
                <h4  class="uppercase">Tasa de conversión</h4>
                <span id="tasa_conversion">
                  0
                </span>
              </div>
            </div>
          </div>

        </div>

        <div class="row graficas align-items-start">
          <div class="col-8">
            <div class="box-shadow my-3">
              <div class="bg-color d-flex align-items-center ">
                <h4 class="uppercase flex-grow-1 m-0"> <img src="img/iconos/icono_tus_metricas.svg" alt="Metricas" class="img_icons"> Tus metricas</h4>
                <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3 active" href="#">Entrada</a>
                <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3" href="#">Proceso</a>
                <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3" href="#">Salida</a>
              </div>
              <canvas id="myChart" class="bg-color grafica" height="400"></canvas>
            </div>
          </div> 

          <div class="col-4 mt-3 d-flex flex-column align-items-center "
            style = "margin-top: 0px !important">
            <div class="dias my-3 box-shadow">
              <h4 class="uppercase"> 
                <img src="img/iconos/icono_dias_activo.svg" alt="Dias activos" class="img_icons"> Días activos
              </h4>
              <span id="dias_activos">0</span>
            </div>
            <div class="dias my-3 box-shadow">
              <h4 class="uppercase"> 
                <img src="img/iconos/icono_dias_activo.svg" alt="Dias activos" class="img_icons"> Días activos
              </h4>
              <span id="dias_activos">0</span>
            </div>
          </div>
        </div>

        <div>
          <div class="row">
            <div class="col-4 my-3">
              <div class="box-shadow">
                <h4 class="uppercase">
                  <img src="img/iconos/icono_personas_capacitadas.svg" alt="" class="img_icons"> Personas capacitadas
                </h4>
                <div class="p_capacitadas d-flex justify-content-center">
                  <span id="personas_capacitadas_relacion" class="flex-fill">
                    0/0
                  </span>
                  <div class="n_personas flex-fill p-2">
                                  
                  </div>
                </div>
              </div>
            </div>

            <div class="col-4 my-3">
              <div class="box-shadow">
                <h4 class="uppercase"><img src="img/iconos/icono_presupuesto_usado.svg" alt="" class="img_icons"> Presupuesto usado</h4>
                <div class="d-flex flex-column ml-5">
                  <span id="presupuesto_usado" class="icon_pesos">0</span>
                  <span class="total">de <em id="total_presupuesto_usado" >$0</em></span>
                </div>
              </div>
            </div>

            <div class="col-4 my-3 ">
              <div class="box-shadow d-flex flex-column">
                <h4 class="uppercase">
                  <img src="img/iconos/icono_valor_actual_neto.svg" alt="" class="img_icons"> Valor actual neto (VAN)
                </h4>
                <span id="valor_actual_neto" class="ml-5 icon_pesos">0</span>
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
  <script src="app/js/graficas.js"></script>
</body>