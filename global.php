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

<body class="global-view panel_control">
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

  <div class="Columna-Perfil d-flex flex-column">
    <div class="icon_home">
      <img src="img/iconos/inn.svg" width="180px" alt="" class="">
    </div>
    <div class="Elementos-Perfil">
      <div class="Botones-Perfil">
        <a class="Icono-Menu-Perfil" href="perfil.php">
          <img src="./img/iconos/icono_proyectos.svg" alt="Dashboard">
        </a>
        <a class="Icono-Menu-Perfil current" href="global.php">
          <img class="current-Icono"  src="./img/iconos/icono_global.svg" alt="Global">
        </a>
        <a class="Icono-Menu-Perfil " href="personas.php">
          <img src="./img/iconos/icono_personas.svg" alt="Personas">
        </a>
        <a class="Icono-Menu-Perfil " href="presupuesto.php">
          <img src="./img/iconos/icono_presupuesto.svg" alt="Presupuesto">
        </a>
      </div>
  
      <div class="Usuario-Perfil">
  
        <img src="./img/iconos/Icono-Perfil.png" alt="Icono" height="45px"
          style="border-radius: 5px; float: left; margin-right: 10px;">
  
        <div style="float:left;">
          <p class="Texto-Nombre-Perfil"><strong> <?php echo $_SESSION['name_post'];?></strong></p>
          <p class="Texto-Rol-Perfil"><?php echo $_SESSION['role_post'];?></p>
        </div>
  
        <div class="Perfil-Dropdown-Container" style="float: right;">
          <div class="btn-group dropright ">
            <button type="button" class="btn btn-secondary dropdown-toggle Boton-Dropdown" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
  
            </button>
            <div class="dropdown-menu">
              <!-- Dropdown menu links -->
              <a style="color:#eb5757; margin-left: 15px" href="index.php?logout='1'">Cerrar Sesión</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  
  <div class="Blanco-Fondo">

    <div id = "Sin-Metricas">
      <h3 class="Text-Center Titulo " style="font-size: 28pt">Ahora ajusta tus preferencias en métricas e indicadores.</h3>
      <p class="Subtitulo Text-Center ">Managinn te ayuda a tener completo control y monitoreo de tu sistema de innovación.
      </p>

      <img height="400px" 
        src="./img/iconos/Ilustracion-Global-Vacio.png" 
        alt="Global"
        style="margin:10px 0px 60px 340px;">

      <div class="d-flex flex-column justify-content-center">
        <button class = "Boton-a-Principal-Fondo-Blanco" 
                name = "Boton-Proyecto" 
                id = "Boton-Preferencias"
                >Ajustar Preferencias</button>

        <a class = "btn btn-custom btn-large Boton-a-Principal-Sin-Fondo" 
          name = "Boton-Proyecto" 
          id = "Boton-Omitir-Preferencias"
          href="personas.php"
          >Omitir
        </a>
      </div>
    </div> <!-- Fin Sin-Metricas -->

    <div id="Crear-Implementacion" class = "Caja-Texto-Blanco"> <!-- inicio Crear-Implementacion -->

      <div class="progress Linea-Progreso">
        <div class="progress-bar" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:0%">
        </div>
      </div>  

      <div class="Progreso-Proyecto">
        <ul class="items_progreso progreso_global d-flex">
          <li class = "progreso-actual">
            <div class ="circulo-actual"></div>
            <p class = "Texto-Progreso">Personas</p>
          </li>
          <li class = "progreso-no">
            <div class ="Circulo-Progreso"></div>
            <p class = "Texto-Progreso">Implementación</p>
          </li>
          <li class = "progreso-no">
            <div class ="Circulo-Progreso"></div>
            <p class = "Texto-Progreso">Métricas</p>
          </li>
        </ul>
      </div>

          <div class = "Caja-Centro global">
            <!-- Agregar ACTION para enviar el formulario a donde se quiera guardar la info-->
            <form class ="FormCrear1" action="global_panel_control.php" method = "post"> 
              <div class="tab step1">
                <h3 class="Text-Center Titulo " style="font-size: 28pt">Datos sobre personas.</h3>
                  <p class="Subtitulo Text-Center ">Con estos datos calcularemos por tí algunos indicadores relacionados con tu equipo.
                  </p>
                  <h5 class="title-forms mb-5">Actualmente ¿cuántas personas tienes a cargo en innovación?</h5>
                <div class="row justify-content-center">
                  <div class="input-group mb-3 col-3 ml-auto mr-auto border-radius" style="max-width: 170px;">
                    <div class="input-group-prepend">
                      <a id="less_persons" class="btn btn-custom btn-on">-</a> 
                    </div>
                    <input id="num_persons" type="number" required class="form-control input-clear input-numeric" value="1" >
                    <div class="input-group-append">
                      <a id="more_persons" class="btn btn-custom btn-on">+</a>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-auto">
                  <div class="col-5  mt-4 Text-Center" >
                    <input class = "Boton-a-Principal-Sin-Fondo inline"  
                      name="btn_back"
                      type="button" 
                      value="Omitir"
                      >  
                    <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                      type="button" 
                      name="Boton-Continuar"
                      value="Siguiente"
                      >
                  </div>
                </div>
              </div> <!-- step1-->
              <div class="tab step2">
                <h3 class="Text-Center Titulo " style="font-size: 28pt">Datos sobre personas.</h3>
                  <p class="Subtitulo Text-Center ">Con estos datos calcularemos por tí algunos indicadores relacionados con tu equipo.
                  </p>
                <h5 class="title-forms mb-5">Actualmente ¿cuántas dde esas se han capacitado en innovación al menos una vez en los ultimos 6 meses?</h5>
                <div class="row justify-content-center">
                  <div class="input-group mb-3 col-6 ml-auto mr-auto border-radius" style="max-width: 170px;">
                    <div class="input-group-prepend">
                      <a id="less_persons_cap" class="btn btn-custom btn-on">-</a> 
                    </div>
                    <input id="num_persons_cap" type="number" required class="form-control input-clear input-numeric" value="1">
                    <div class="input-group-append">
                      <a id="more_persons_cap" class="btn btn-custom btn-on">+</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-auto">
              <div class="col-5  mt-4 Text-Center" >
                <a class = "Boton-a-Principal-Sin-Fondo inline"  
                  style="text-decoration: none"
                  name="btn_back"
                  type="button" 
                  href="global.php"
                  >Omitir</a>  
                <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                  type="button" 
                  name="Boton-Continuar"
                  value="Siguiente"
                  >
              </div>
            </div>
          </div> <!-- step1-->

          <div class="tab step2">
            <h3 class="Text-Center Titulo Negro" style="font-size: 28pt">Datos sobre personas.</h3>
            <p class="Subtitulo Text-Center Negro">Con estos datos calcularemos por tí algunos indicadores relacionados con tu equipo.
            </p>
            <h5 class="title-forms mb-5">Actualmente ¿cuántas de esas se han capacitado en innovación al menos una vez en los ultimos 6 meses?
            </h5>
            <div class="row justify-content-center">
              <div class="input-group mb-3 col-6 ml-auto mr-auto border-radius" style="max-width: 170px;">
                <div class="input-group-prepend">
                  <a id="less_persons_cap" class="btn btn-custom btn-on">-</a> 
                </div>
                <input id="num_persons_cap" type="number" name="post_num_persons_cap" required class="form-control input-clear input-numeric" value="1">
                <div class="input-group-append">
                  <a id="more_persons_cap" class="btn btn-custom btn-on">+</a>
                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-auto">
              <div class="col-5  mt-4 Text-Center" >
                <a class = "Boton-a-Principal-Sin-Fondo inline"  
                  style="text-decoration: none"
                  name="btn_back"
                  type="button" 
                  href="global.php"
                  >Omitir</a>  
                <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                  type="button" 
                  name="Boton-Continuar"
                  value="Siguiente"
                  >
              </div>
            </div>
          </div> <!--step2-->

          <div class="tab step3">
            <h3 class="Text-Center Titulo Negro" style="font-size: 28pt">Implementación de proyectos.</h3>
            <p class="Subtitulo Text-Center Negro">Del total de proyectos de tu portafolio, ¿cuántos se conviertieron en un <br> producto/mejor/servicio/modelo/metodología al finalizar?.
            </p>
            <div class="row row-cols-2 justify-content-center select_proyectos">
              <div class="form-group mb-3 col-3 ">
                <label for="exampleFormControlSelect1">Proyectos Totales</label>
                <select class="form-control border-radius" name="post_pr_totales" id="proyectos_totales">
                  <option value="" disabled selected>Rango</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="col-2 divider">
                /
              </div>
              <div class="form-group mb-3 col-3 ">
                <label for="exampleFormControlSelect1">Convertidos</label>
                <select class="form-control border-radius" name="post_pr_convertidos" id="proyectos_convertidos">
                  <option value="" disabled selected>Rango</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>  
            </div>
            <div class="row justify-content-center mt-auto">
              <div class="col-5  mt-4 Text-Center" >
                <a class = "Boton-a-Principal-Sin-Fondo inline"  
                  style="text-decoration: none"
                  name="btn_back"
                  type="button" 
                  href="global.php"
                  >Omitir</a> 
                <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                  type="button" 
                  name="Boton-Continuar"
                  value="Siguiente"
                  >
              </div>
            </div>
          </div><!--step3-->

          <div class="tab step4">
            <h3 class="Text-Center Titulo Negro mb-3" style="font-size: 28pt">Selecciona las métricas de tu preferencia.</h3>
            <div class="row justify-content-center metricas_content ">
              <div class="input-group mb-3 col-4">
                <div class="box-shadow">
                  <p class="subtitle Text-Center">Entrada</p>
                  <div class="inputGroup">
                    <input id="option1" name="option1" type="checkbox"/>
                    <label for="option1"># personas capacitadas</label>
                  </div>
                  <div class="inputGroup">
                    <input id="option2" name="option2" type="checkbox"/>
                    <label for="option2"># sesiones realizadas</label>
                  </div>
                  <div class="inputGroup">
                    <input id="option3" name="option3" type="checkbox"/>
                    <label for="option3"># prototipos</label>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3 col-4">
                <div class="box-shadow">
                  <p class="subtitle Text-Center">Proceso</p>
                  <div class="inputGroup">
                    <input id="option4" name="option4" type="checkbox"/>
                    <label for="option4">% participación</label>
                  </div>
                  <div class="inputGroup">
                    <input id="option5" name="option5" type="checkbox"/>
                    <label for="option5">% ideas aprobadas</label>
                  </div>
                  <div class="inputGroup">
                    <input id="option6" name="option6" type="checkbox"/>
                    <label for="option6">% de implementación</label>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3 col-4">
                <div class="box-shadow">
                  <p class="subtitle Text-Center">Salida</p>
                  <div class="inputGroup">
                    <input id="option7" name="option7" type="checkbox"/>
                    <label for="option7"># nuevos productos</label>
                  </div>
                  <div class="inputGroup">
                    <input id="option8" name="option8" type="checkbox"/>
                    <label for="option8"># nuevos servicios</label>
                  </div>
                  <div class="inputGroup">
                    <input id="option9" name="option9" type="checkbox"/>
                    <label for="option9"># proyectos existosos</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-auto">
              <div class="col-5  mt-4 Text-Center">
                <!--<input class = "Boton-a-Principal-Sin-Fondo inline"  
                  name="btn_back"
                  type="button" 
                  value="Omitir"
                  >   -->
                <a class = "Boton-a-Principal-Sin-Fondo inline"  
                  style="text-decoration: none"
                  name="btn_back"
                  type="button" 
                  href="global.php"
                  >Omitir</a>
                <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                  type="submit" 
                  name="Boton-Guardar-Global"
                  value="Finalizar"
                  >
              </div>
            </div>
          </div><!--step4-->
        </form>
      </div> <!-- Fin Caja-Centro global-->
    </div> <!-- Fin Crear-Implementacion -->
  </div> <!--Fin Blanco-Fondo-->

  <script type="text/javascript">
    var ind_global = <?php echo $induccion_gl?>;
    console.log ("Usuario tuvo induccion global: " + ind_global);

    function loadPage(){
      if (ind_global == 0)
      {
        console.log ("Usuario tuvo induccion global sufyashdufjdsfgh");
        document.getElementById('Sin-Metricas').style.display = 'block';
        document.getElementById('Crear-Implementacion').style.display = 'none';
      }
      else{
        console.log ("1234567890");
        window.location.href = "global_dashboard.php";
      }
    }

    loadPage();
  </script>

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
      $('#Sin-Metricas #Boton-Preferencias').click(function () {
        $('#Crear-Implementacion').css('display', 'block');
        $('#Sin-Metricas').css('display', 'none');
        $('#Dashboard-Global').css('display', 'none');
        $('.Blanco-Fondo').addClass('general_bg');
      })

       /**
       * Sumar y restar valores en los input de Datos sobre Personas.
       */
      $('#less_persons').click(function (e) {
        e.preventDefault()
        var num_persons = parseInt($('#num_persons').val());
        num_persons--;
        if (num_persons > 0) {
          $('#num_persons').val(num_persons)
        }
      })
      $('#more_persons').click(function (e) {
        e.preventDefault()
        var num_persons = parseInt($('#num_persons').val());
        num_persons++;
        $('#num_persons').val(num_persons)
      })

      $('#less_persons_cap').click(function (e) {
        e.preventDefault()
        var num_persons = parseInt($('#num_persons_cap').val());
        num_persons--;
        if (num_persons > 0) {
          $('#num_persons_cap').val(num_persons)
        }
      })
      $('#more_persons_cap').click(function (e) {
        e.preventDefault()
        var num_persons = parseInt($('#num_persons_cap').val());
        num_persons++;
        $('#num_persons_cap').val(num_persons)
      })

      /**
       * Permitir solo valores numericos en los input:number
       */
      $('input[type=number]').change(function () {
        var valueNumber = $(this).val();
        console.log(valueNumber)
        valueNumber = parseInt(valueNumber);
        valueNumber = (!isNaN(valueNumber)) ? valueNumber : 0;
        console.log(valueNumber)
        $(this).val(valueNumber)
      });

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

      var presupuesto_usado = '<?php $numero = 1500000;
          $numero_cop =  number_format($numero, 0, ',', '.');
          echo $numero_cop;
      ?>';

      var total_presupuesto_usado = "<?php 
        if($arregloSuma['SUMA']==0)
        {
          echo 0;
        }
        else{
          $numero = $arregloSuma['SUMA'];
          $numero_cop =  number_format($numero, 0, ',', '.');
          echo '$ '.$numero_cop;
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

    }); // Close JQuery noConflict
  </script>
  <script src="app/js/graficas.js"></script>
</body>