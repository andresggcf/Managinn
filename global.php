<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body class="global-view panel_control h-100">
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


  <!--Ventana cuando no hay proyectos -->
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
                href="global_panel_control.php"
                >Omitir</a>
      </div>
    </div>
    <!-- Sin Metrica -->
    <!-- Info Implementacion -->
    <div id="Crear-Implementacion" class = "Caja-Texto-Blanco">

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
              </div> <!--step2-->
              <div class="tab step3">
                <h3 class="Text-Center Titulo " style="font-size: 28pt">Implementación de proyectos.</h3>
                  <p class="Subtitulo Text-Center ">Del total de proyectos de tu portafolio, ¿cuántos se conviertieron en un <br> producto/mejor/servicio/modelo/metodología al finalizar?.
                  </p>
                <div class="row row-cols-2 justify-content-center select_proyectos">
                    <div class="form-group mb-3 col-3 ">
                      <label for="exampleFormControlSelect1">Proyectos Totales</label>
                      <select class="form-control border-radius" id="proyectos_totales">
                        <option value="" disabled selected>Rango</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <!-- <div class="col-2 divider">
                      /
                    </div> -->
                    <div class="form-group mb-3 col-3 offset-2 divider_icon">
                      <label for="exampleFormControlSelect1">Convertidos</label>
                      <select class="form-control border-radius" id="proyectos_convertidos_global">
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
              </div><!--step3-->
              <div class="tab step4">
                <h3 class="Text-Center Titulo  mb-3" style="font-size: 28pt">Selecciona las métricas de tu preferencia.</h3>
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
                  <div class="col-5  mt-4 Text-Center" >
                    <input class = "Boton-a-Principal-Sin-Fondo inline"  
                      name="btn_back"
                      type="button" 
                      value="Omitir"
                      >   
                    <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                      type="submit" 
                      name="Boton-Continuar"
                      value="Finalizar"
                      >
                  </div>
                </div>
              </div><!--step4-->
            </form>
          </div>
      </div>
    <!-- Info Implementacion -->
    
  </div>
<style>
  /* Hide all steps by default: */
.tab {
  display: none;
}
</style>
  <script>

  </script>
  
<?php
  include("footer.php");
?>