<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  require 'conexion.php';

  /*Query que muestra si el perfil tuvo "induccion"*/
  $queryInduccion = "SELECT induccion, induccion_global FROM usuarios WHERE correo = '$correo' AND nombre = '$nombre'";
  $resultado3 = mysqli_query($db, $queryInduccion);
  $arregloInduccion = mysqli_fetch_array($resultado3);

  $_SESSION['induccion'] = $arregloInduccion['induccion'];
  $_SESSION['induccion_global'] = $arregloInduccion['induccion_global'];

  $induccion = $_SESSION['induccion'];
  $induccion_gl = $_SESSION['induccion_global'];

  include("header.php");
  ?>

<body class="global-view panel_control presupuesto">

  <div class = "Columna-Perfil d-flex flex-column">
    <div class="icon_home">
      <img src="img/iconos/inn.svg" width="180px" alt="" class="">
    </div>
    <div class = "Elementos-Perfil">
      <div class = "Botones-Perfil">
        <a class="Icono-Menu-Perfil" href = "perfil.php">
          <img src="./img/iconos/icono_proyectos.svg" alt="Dashboard">
        </a>
        <a class="Icono-Menu-Perfil current"  href = "global.php">
          <img class="current-Icono" src="./img/iconos/icono_global.svg" alt="Global">
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
    <div id="Dashboard-Global" class="contenedor_dashboard"> <!--Inicio Dashboard-Global -->
      <?php
        $queryDashboardGlobal = "SELECT d.* FROM data_global d 
        INNER JOIN usuarios u ON d.usuario_id = u.id WHERE 
        u.correo = '$correo'";

        $resultado =  mysqli_query($db, $queryDashboardGlobal);
        $arreglo = mysqli_fetch_assoc($resultado);

        $queryPresupuesto = "SELECT SUM(p.presupuesto_inicial) AS SUMA
          FROM (
            SELECT u.id, p.presupuesto_inicial 
            FROM usuarios u 
            INNER JOIN equipos e ON u.id = e.id_usuario 
            INNER JOIN proyecto p ON e.id_proyecto = p.id 
            WHERE u.correo = '$correo'
          ) AS p";
        $resultado2 =  mysqli_query($db, $queryPresupuesto);
        $arregloSuma = mysqli_fetch_assoc($resultado2);

        $queryDias = "SELECT DATEDIFF(SYSDATE(),(SELECT u.creacion FROM usuarios u 
        WHERE u.correo = 'director@gmail.com'))
        AS DIAS_ACTIVO;";

        $resultado3 =  mysqli_query($db, $queryDias);
        $arregloDias = mysqli_fetch_assoc($resultado3);

      ?>
      <div class="container-fluid">
        <div class="row kpi">
          <div class="col-6 my-3">
            <div class="info_general px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center">
              <div class="nombre" style="max-width:85%">
                <h2>Hola, <?php echo $_SESSION['name_post'];?></h2>
                <p>Asi se ve tu sistema de innovación global en:</p> 
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

          <div class="col-3 my-3">
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

          <div class="col-3 my-3">
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
          <div class="col-10">
            <div class="box-shadow my-3">
              <div class="bg-color d-flex align-items-center ">
                <h4 class="uppercase flex-grow-1 m-0"> <img src="img/iconos/icono_tus_metricas.svg" alt="Metricas" class="img_icons"> Tus metricas</h4>
                <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3 active" href="#">Entrada</a>
                <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3" href="#">Proceso</a>
                <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3" href="#">Salida</a>
              </div>
              <canvas id="myChart" class="bg-color grafica" height="400"></canvas>
            </div>

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

          <div class="col-2 mt-3 d-flex flex-column align-items-center "
            style = "margin-top: 0px !important">
            <div class="dias my-3 box-shadow">
              <h4 class="uppercase"> 
                <img src="img/iconos/icono_dias_activo.svg" alt="Dias activos" class="img_icons"> Días activos
              </h4>
              <span id="dias_activos">0</span>
            </div>

            <div class="info_dias p-3 my-3 box-shadow" style="height=480px; position:relative">
              <h5 style="font-size: 14pt; margin-top: 24px">Descarga tu reporte automático</h5>
              <p>Olvídate de las largas horas realizando reportes. Descarga el tuyo haciendo clic en el botón de abajo</p>
              <img src="img/iconos/ilustracion_reporte_auto.svg" alt="Persona" style="height: 232px;">
              <button class="Boton-Export" data-toggle="modal" data-target="#Modal-Export-Global">
                <img src="img/iconos/Boton-Export.png" style="width: 25px;margin: 0 15 !important;padding-top:-10px;margin-top: 0px;margin-bottom: 0px;">
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!--Fin Dashboard-global -->
  </div> <!--Fin Blanco-Fondo-->

  <!-- Modal -->
  <div class="modal fade" 
    id="Modal-Export-Global" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="exampleModalLabel" 
    aria-hidden="true">
    
    <div class="modal-dialog" role="document" style="max-width:530px !important">
      <div class="modal-content" style="height: 500px; max-width:530px">
        <div class="modal-header" 
          style = "padding-bottom: 20px !important;padding-left: 110px !important;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div style="
            margin-bottom: 10px;
            margin-top: -25px; 
            height:35px;">
              <img src="img/iconos/Icono-Export.png" style="margin-left: 80px;width:30px;float:left;margin-right: 20px;">
              <h5
                style="color:#eb5757; font-size: 20pt; float: left;">Generar Reporte</h5>
          </div>
          <p>Selecciona los ítems que quieres<br>incluir en este reporte.</p>
        </div>
        <form class="form-export-global" action="con_pdf_global.php" method = "post">
          <div class="modal-body">
            <div class="row" style="margin-top:10px">

              <div class="column" style=" width:50%; padding-left: 20px; height:200px">

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="escalamiento_check"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="escalamiento_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Escalamiento Promedio</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="tasa_check"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="tasa_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Tasa de Conversión</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="dias_check"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="dias_act_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Días Activos</label>
                </div>
              </div>

              <div class="column" style="height:200px; width:50%; padding-left: 20px">

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="personas_check"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="personas_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Personas Capacitadas</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="presupuesto_check"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="presupuesto_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Presupuesto</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="vlr_port_check"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="vlr_portafolio_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Valor del Portafolio</label>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer" style="border-top: none; justify-content: center;">
            <div>
              <a class = "btn btn-custom btn-large Boton-a-Principal-Sin-Fondo" 
                      name = "Boton-Proyecto" 
                      id = "Boton-Omitir-Preferencias"
                      href="presupuesto.php"
                      style = "max-width: 180px"
                      data-dismiss="modal"
                      >Cancelar</a>
            </div>
            <div>
              <button class = "Boton-a-Principal-Fondo-Blanco" 
                      name = "Boton-PDF" 
                      id = "Boton-Generar-PDF"
                      style = "max-width: 190px"
                      type="submit" 
                      >Generar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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
    $.noConflict();
    jQuery(document).ready(function ($) {
      
      
      /**
       * Cambiar de pasos en el formulario de Ajustar Preferencias 
       */
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the current tab
      function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = $(".tab");
        if (x.length == 0) { return false }
        x[n].style.display = "flex";
        var bar = $(".progress-bar");
        if(!x.hasClass('tab_presupuesto')){
          switch (n) {
            case 0:
              bar.css('width', "0%");
              $(".items_progreso li:nth-child(1)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
              $(".items_progreso li:nth-child(2)>div").addClass("Circulo-Progreso").removeClass("circulo-actual");
              $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual");
              break;
            case 1:
              bar.css('width', "25%");
              $(".items_progreso li:nth-child(1)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
              $(".items_progreso li:nth-child(2)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
              $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
              console.log(n)
              break;
            case 2:
              bar.css('width', "50%");
              $(".items_progreso li:nth-child(1)>div").addClass("circulo-pasado").removeClass("circulo-actual");
              $(".items_progreso li:nth-child(2)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
              $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
              console.log(n)
              break;
            case 3:
              bar.css('width', "100%");
              $(".items_progreso li:nth-child(2)>div").addClass("circulo-pasado").removeClass("circulo-actual");
              $(".items_progreso li:nth-child(3)>div").addClass("circulo-actual").removeClass("Circulo-Progreso");
              console.log(n)
              break;
            default:
              console.log(n, bar);
          }
        }else{
          switch (n) {
            case 0:
              bar.css('width', "0%");
              $(".items_progreso li:nth-child(1)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
              $(".items_progreso li:nth-child(2)>div").addClass("Circulo-Progreso").removeClass("circulo-actual");
              $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual");
              break;
            case 1:
              bar.css('width', "50%");
              $(".items_progreso li:nth-child(1)>div").addClass("circulo-pasado").removeClass("circulo-actual");
              $(".items_progreso li:nth-child(2)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
              $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
              break;
            case 2:
              bar.css('width', "100%");
              $(".items_progreso li:nth-child(2)>div").addClass("circulo-pasado").removeClass("circulo-actual");
              $(".items_progreso li:nth-child(3)>div").addClass("circulo-actual").removeClass("Circulo-Progreso");
              console.log(n)
              break;
            default:
              console.log(n, bar);
          }
        }
      }
      $("input[name='btn_back']").click(function () {
        nextPrev(1)
      })
      $("input[name='Boton-Continuar']").click(function () {
        nextPrev(1)
      })
      function nextPrev(n) {
        var x = $(".tab");
        if ((n >= 1 && currentTab >= (x.length - 1)) || n < 1 && currentTab == 0) return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= x.length) {
          return false;
        }
        showTab(currentTab);
      }

      /**
       * Variables para las metricas GLOBAL
       */
      var escalamiento = '10%';
      var tasa_conversion = 15;
      var dias_activos = <?php 
        if($arregloDias['DIAS_ACTIVO']==NULL)
        {
          echo 0;
        }
        else
        {
          echo $arregloDias['DIAS_ACTIVO'];
        }
        ?>;

      var total_presupuesto_usado = '<?php $numero = 1500000;
          $numero_cop =  number_format($numero, 0, ',', '.');
          echo '$ '.$numero_cop;
      ?>';

      var presupuesto_usado = "<?php 
        if($arregloSuma['SUMA']==0)
        {
          echo 0;
        }
        else{
          $numero = $arregloSuma['SUMA'];
          $numero_cop =  number_format($numero, 0, ',', '.');
          echo $numero_cop;
        }
      ?>";

      var valor_actual_neto = '<?php
        $numero = 350000;
        $numero_cop =  number_format($numero, 0, ',', '.');
        echo $numero_cop?>';

      var personas_capacitadas = <?php 
        if($arreglo['num_personas_capacitadas']==NULL)
        {
          echo 0;
        }
        else{
          echo $arreglo['num_personas_capacitadas'];
        }
      ?>;

      var personas_capacitadas_total = <?php 
        if ($arreglo['num_personas'] == NULL)
        {
          echo 0;
        }
        else{
          echo $arreglo['num_personas'];
        }
      ?>;

      var personas_capacitadas_relacion = personas_capacitadas + "/" + personas_capacitadas_total;

      /**
       * Asignar de variables
       */
      $("#escalamiento").text(escalamiento);
      $("#tasa_conversion").text(tasa_conversion);
      $("#dias_activos").text(dias_activos);
      $("#presupuesto_usado").text(presupuesto_usado);
      $("#total_presupuesto_usado").text(total_presupuesto_usado);
      $("#valor_actual_neto").text(valor_actual_neto);
      $("#personas_capacitadas_relacion").text(personas_capacitadas_relacion);

      /**
       * Asignar meses
       */
      var meses = [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ];
      var d = new Date();
      var n = d.getMonth();
      $('#mes_actual').text(meses[n]);
      $('#less_month').click(function () {
        n--;
        $('#mes_actual').text(meses[n]);
      })
      $('#more_month').click(function () {
        n++;
        $('#mes_actual').text(meses[n]);
      })
      /**
      * Asignar valores random a la grafica cada vez que se cambie de filtro
      */
      $('.change_graph').click(function (e) {
        e.preventDefault();
        if ($(this).hasClass('active')) {
          return false;
        }
        $(".change_graph").removeClass("active");
        $(this).addClass('active')
        var dataUpdate = Array.from({ length: 6 }, () => Math.floor(Math.random() * 100));
        var dataComplement = []
        dataUpdate.forEach(function (element) {
          dataComplement.push(100 - element)
        })
        myChart.data.datasets[0].data = dataUpdate;
        myChart.data.datasets[1].data = dataComplement;
        myChart.update();
      })
      /**
      * Agregar iconos de personas segun los valores asignados
      * a las personas capacitadas
      * @argument personas_capacitadas = Numero de personas capacitadas
      * @argument personas_capacitadas_total = Numero total de personas
      */
      var n_personas = [];
      for (let index = 0; index < personas_capacitadas_total; index++) {
        var persona = $('<span />').attr('class', 'persona');
        if (index < personas_capacitadas) {
          persona.addClass('active');
        }
        n_personas.push(persona);
      }
      $('.n_personas').append(n_personas)

      // Personas
      $(".add-more").click(function (e) {
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source', $(addto).attr('data-source'));
        $("#count").val(next);

        $('.remove-me').click(function (e) {
          e.preventDefault();
          var fieldNum = this.id.charAt(this.id.length - 1);
          var fieldID = "#field" + fieldNum;
          $(this).remove();
          $(fieldID).remove();
        });
      });

      $('#radioBtn a').on('click', function () {
        // agregarPersonas();
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#' + tog).prop('value', sel);

        $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
      })

      // Crear personas
      var personas = {
        'mejora':[
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
          {
            nombre:'Jorge Castaño Valencia',
            cargo:'Recursos',
            img:'img/iconos/avatar_hombre.svg'
          },
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
          {
            nombre:'Jorge Castaño Valencia',
            cargo:'Recursos',
            img:'img/iconos/avatar_hombre.svg'
          },
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
          {
            nombre:'Jorge Castaño Valencia',
            cargo:'Recursos',
            img:'img/iconos/avatar_hombre.svg'
          },
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
          {
            nombre:'Jorge Castaño Valencia',
            cargo:'Recursos',
            img:'img/iconos/avatar_hombre.svg'
          },
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
          {
            nombre:'Jorge Castaño Valencia',
            cargo:'Recursos',
            img:'img/iconos/avatar_hombre.svg'
          },
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
          {
            nombre:'Jorge Castaño Valencia',
            cargo:'Recursos',
            img:'img/iconos/avatar_hombre.svg'
          },
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
          {
            nombre:'Jorge Castaño Valencia',
            cargo:'Recursos',
            img:'img/iconos/avatar_hombre.svg'
          },
        ],
        'medio':[],
        'alto':[
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
          {
            nombre:'Jorge Castaño Valencia',
            cargo:'Recursos',
            img:'img/iconos/avatar_hombre.svg'
          },
          {
            nombre:'Paula Muñoz Vergara',
            cargo:'Desarrollo',
            img:'img/iconos/avatar_mujer.svg'
          },
        ]

      }
      // Agregar personas
      function agregarPersonas(){
        $('#mejora').empty();
        personas.mejora.forEach(element => {
          $('#mejora').append(
            `<div class="col-xl-1 col-lg-2 col-md-6">
              <div class="perfil_persona">
                <img class="img-fluid" src="${element.img}" alt="">
                <div class="nombre">${element.nombre}</div>
                <div class="cargo">${element.cargo}</div>
              </div>
            </div>`
          );
        });
        $('#alto').empty();
        personas.alto.forEach(element => {
          $('#alto').append(
            `<div class="col-xl-1 col-lg-2 col-md-6">
              <div class="perfil_persona">
                <img class="img-fluid" src="${element.img}" alt="">
                <div class="nombre">${element.nombre}</div>
                <div class="cargo">${element.cargo}</div>
              </div>
            </div>`
          ).show();
        });
      }
      agregarPersonas();


      // Abrir perfil de persona
      $('.perfil_persona').click(function(e){
        console.log('click')
        $('.perfil_persona').not(this).toggleClass('grey_effect');
        if($('.panel_lateral').hasClass('show')){
          $('.perfil_persona').removeClass('grey_effect')
        }
        // $(this).removeClass('grey_effect');
        e.preventDefault();
        $('.panel_lateral').toggleClass('show');
      })
      $('.close_btn').click(function(e){
        e.preventDefault();
        $('.perfil_persona').removeClass('grey_effect')
        $('.panel_lateral').removeClass('show')
      })

      /**
      * Presupuesto
      */
      $('.datepicker').datepicker({
        language: 'es'
      });
      $('#ex1').slider({
        formatter: function(value) {
          return numeral(value).format('$ 0,0[.]00');
        }
      });
      $("#exCapacitaciones").slider({ id: "slider12c", step: 100000,min: 0, max: 100000000, range: true, value: [9000000, 70000000],formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' - '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exPapeleria").slider({ id: "slider12c", step: 100000,min: 0, max: 100000000, range: true, value: [90000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' - '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exInfraestructura").slider({ id: "slider12c", step: 100000,min: 0, max: 100000000, range: true, value: [90000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' - '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exOtros").slider({ id: "slider12c", step: 100000,min: 0, max: 100000000, range: true, value: [90000000, 90000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' - '+numeral(value[1]).format('$ 0,0[.]00');
      } });

    }); // Close JQuery noConflict
  </script>
  <script src="app/js/graficas.js"></script>
</body>