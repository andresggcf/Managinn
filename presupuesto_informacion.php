<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body class="panel_control presupuesto general_bg h-100">
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

    <div class = "Columna-Perfil d-flex flex-column">
      <div class="icon_home">
        <img src="img/iconos/inn.svg" width="180px" alt="" class="">
      </div>
      <div class = "Elementos-Perfil">
        <div class = "Botones-Perfil">
          <a class="Icono-Menu-Perfil" href = "perfil.php">
            <img src="./img/iconos/icono_proyectos.svg" alt="Dashboard">
          </a>
          <a class="Icono-Menu-Perfil"  href = "global.php">
            <img   src="./img/iconos/icono_global.svg" alt="Global">
          </a>
          <a class="Icono-Menu-Perfil " href = "personas.php">
            <img  src="./img/iconos/icono_personas.svg" alt="Personas">
          </a>
          <a class="Icono-Menu-Perfil current" href = "presupuesto.php">
            <img class="current-Icono" src="./img/iconos/icono_presupuesto.svg" alt="Presupuesto">
          </a>
        </div>

        <div class = "Usuario-Perfil"> 

          <img src = "./img/iconos/Icono-Perfil.png" alt="Icono" 
          height="45px"
          style = "border-radius: 5px; float: left; margin-right: 10px;">

          <div style = "float:left;">
            <p class="Texto-Nombre-Perfil"><strong> <?php echo $_SESSION['name_post'];?></strong></p>
            <p class="Texto-Rol-Perfil"><?php echo $_SESSION['role_post'];?></p>
          </div>

          <div class = "Perfil-Dropdown-Container" style = "float: right;">
            <div class="btn-group dropright ">
              <button type="button" class="btn btn-secondary dropdown-toggle Boton-Dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               
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

    <div class="new-body general_bg">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center py-5">
          <div class="col-xl-10 col-lg-12x">
            <div class="body-popup box-shadow ">
              <div class="mt-5 progress Linea-Progreso">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                  style="width:0%">
                </div>
              </div>
              <div class="Progreso-Proyecto">
                <ul class="items_progreso d-flex">
                  <li class="progreso-actual">
                    <div class="circulo-actual"></div>
                    <p class="Texto-Progreso" style="padding-top:15px;">Inicio</p>
                  </li>
                  <li class="progreso-no">
                    <div class="Circulo-Progreso"></div>
                    <p class="Texto-Progreso">Actual</p>
                  </li>
                  <li class="progreso-no">
                    <div class="Circulo-Progreso"></div>
                    <p class="Texto-Progreso">Gastos</p>
                  </li>
                </ul>
              </div>
              <!-- Agregar ACTION para enviar el formulario a donde se quiera guardar la info-->
              <form class="FormPresupuesto" action="#" method="post">
                <div class="tab tab_presupuesto step1 flex-column">
                  <h3 class="Text-Center Titulo Negro">Presupuesto inicial general.</h3>
                  <p class="mb-5 Subtitulo Text-Center Negro">
                    ¿Cuál es la cantidad de dinero asignado al departamento de innovación?
                  </p>
                  <div class="row justify-content-center">
                    <div class="input-group mb-4 col-4 border-radius" >
                      <input id="presupuesto_inicial" type="number" required class="form-control input-clear input-numeric" placeholder="Presupuesto inicial general">
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group mb-4 col-4 border-radius input-date" >
                      <input id="fecha_presupuesto" type="text" required class="form-control input-clear datepicker " placeholder="Fecha de inicio">
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group  mb-4 col-4 border-radius">
                      <div id="radioBtn" class="btn-group">
                        <a class="btn btn-custom btn-bg-azul-claro btn-large active" data-toggle="select_periodo" data-title="Trimestral">Trimestral</a>
                        <a class="btn btn-custom btn-bg-azul-claro btn-large notActive" data-toggle="select_periodo" data-title="Semestral">Semestral</a>
                        <a class="btn btn-custom btn-bg-azul-claro btn-large notActive" data-toggle="select_periodo" data-title="Anual">Anual</a>
                      </div>
                      <input type="hidden" name="select_periodo" id="select_periodo">
                    </div>
                  </div>
                  <div class="row justify-content-center mt-auto">
                    <div class="col-5  mt-4 Text-Center d-flex justify-content-center">
                      <input class="Boton-a-Principal-Sin-Fondo inline" name="btn_back" type="button" value="Cancelar">
                      <input class="Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" type="button" name="Boton-Continuar"
                        value="Siguiente">
                    </div>
                  </div>
                </div> <!-- step1-->
                <div class="tab tab_presupuesto step2 flex-column">
                  <h3 class="Text-Center Titulo Negro">Presupuesto actual.</h3>
                  <p class="Subtitulo Text-Center Negro my-5">
                    A la fecha, aproximadamente, ¿cuánto queda de presupuesto que ingresó incialmente?
                  </p>
                  <div class="row justify-content-center align-items-center my-5">
                    <div class="col-2">
                      <p style="text-align: right;width: 100%;display: block;" >$0</p>
                    </div>
                    <div class="input-group my-3 col-8 border-radius d-flex align-items-center" style="height: 54px;">
                      <!-- <input type="range" class="form-control custom-range slider" min="0" max="5" step="0.5" id="customRange3"> -->
                      <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100000000" data-slider-step="100000" data-slider-value="0"/> 
                    </div>
                    <div class="col-2">
                      <p>$ 100,000,000</p>
                    </div>
                  </div>
                  <div class="row justify-content-center mt-auto">
                    <div class="col-5  mt-4 Text-Center d-flex justify-content-center">
                      <input class="Boton-a-Principal-Sin-Fondo inline" name="btn_back" type="button" value="Cancelar">
                      <input class="Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" type="button" name="Boton-Continuar"
                        value="Siguiente">
                    </div>
                  </div>
                </div>
                <!--step2-->
                
                <div class="tab tab_presupuesto step3 flex-column">
                  <h3 class="Text-Center Titulo Negro mb-3">Selecciona categoría de gastos.
                  </h3>
                  <p class="mb-5 Subtitulo Text-Center Negro">
                    ¿En cuáles de estas categorías inviertes el presupuesto para el departamento de innovación? <br>Si no encuentras alguno, no te procupes, puedes agregarlo más tarde.
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-8">
                      <div class="row justify-content-center metricas_content ">
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option1" name="option1" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option1">
                              <img src="img/iconos/papeleria.svg" alt="Papeleria">
                              <div class="titulo_categorias">
                                <h5>Papelería</h5>
                                <p>Post-its, marcadores, libretas, ganchos, papel, carpetas, cinta...</p>
                              </div>
                            </label>
                          </div>
                        </div>
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option2" name="option2" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option2">
                              <img src="img/iconos/salarios.svg" alt="Salarios">
                              <div class="titulo_categorias">
                                <h5>SALARIOS</h5>
                                <p>Post-its, marcadores, libretas, ganchos, papel, carpetas, cinta...</p>
                              </div>
                            </label>
                          </div>
                        </div>
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option3" name="option3" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option3">
                              <img src="img/iconos/experimentacion.svg" alt="experimentacion">
                              <div class="titulo_categorias">
                                <h5>EXPERIMENTACIÓN</h5>
                                <p>Costos de prototipado, pruebas de usuario, viáticos, recompensas...</p>
                              </div>
                            </label>
                          </div>
                        </div>
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option5" name="option5" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option5">
                              <img src="img/iconos/capacitaciones_cat.svg" alt="capacitaciones">
                              <div class="titulo_categorias">
                                <h5>CAPACITACIONES</h5>
                                <p>Cursos de preparación de cualquier tipo.</p>
                              </div>
                            </label>
                          </div>
                        </div>
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option6" name="option6" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option6">
                              <img src="img/iconos/licencia.svg" alt="licencia">
                              <div class="titulo_categorias">
                                <h5>LICENCIAS</h5>
                                <p>Software de diseño, prototipado, render, cálculo...</p>
                              </div>
                            </label>
                          </div>
                        </div>
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option7" name="option7" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option7">
                              <img src="img/iconos/materiales.svg" alt="materiales">
                              <div class="titulo_categorias">
                                <h5>MATERIALES </h5>
                                <p>Materiales específicos para proyectos</p>
                              </div>
                            </label>
                          </div>
                        </div>
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option8" name="option8" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option8">
                              <img src="img/iconos/infraestructura.svg" alt="Papeleria">
                              <div class="titulo_categorias">
                                <h5>INFRAESTRUCTURA </h5>
                                <p>Construcción y remodelación de planta física.</p>
                              </div>
                            </label>
                          </div>
                        </div>
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option9" name="option9" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option9">
                              <img src="img/iconos/mobiliario.svg" alt="mobiliario">
                              <div class="titulo_categorias">
                                <h5>MOBILIARIO </h5>
                                <p>Todo tipo de elementos de oficina y equipos</p>
                              </div>
                            </label>
                          </div>
                        </div>
                        <div class="input-group mb-3 col-xl-4 col-lg-6">
                          <div class="inputGroup">
                            <input id="option1" name="option1" type="checkbox" />
                            <label class="d-flex flex-row box-shadow categoria" for="option1">
                              <img src="img/iconos/desarrollo.svg" alt="desarrollo">
                              <div class="titulo_categorias">
                                <h5>DESARROLLO </h5>
                                <p>Tercerización de servicios de desarrollo</p>
                              </div>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center mt-auto">
                    <div class="col-5  mt-4 Text-Center d-flex justify-content-center">
                      <a href="presupuesto_panel_control.php" class="Boton-a-Principal-Sin-Fondo inline" name="btn_back" type="button" value="">Cancelar</a>
                      <a href="presupuesto_panel_control.php" class="py-3 btn btn-custom btn-bg-red btn-large Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" type="submit" name="Boton-Continuar"
                        >Finalizar</a>
                    </div>
                  </div>
                </div>
                <!--step3-->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--container-fluid-->
    </div>
    <style>
  /* Hide all steps by default: */
.tab {
  display: none;
}
</style>

    
<?php
include("footer.php");
?>