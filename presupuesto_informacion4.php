<?php
  session_start();

  $usuario_nombre = $_SESSION['name_post'];
  $usuario_correo = $_SESSION['email_post'];
  $usuario_rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  $p_nombre = $_SESSION['proyecto_nombre'];
  $p_fecha = $_SESSION['fecha_proyecto'];
  $p_descripcion = $_SESSION['desc_proyecto'];
  $p_id= $_SESSION['id_proyecto'];


  
  include("header.php");
  ?>

<body style="background-color: #f6f7f9" class="panel_control1">
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

  <div style="position:fixed;">
    <div class = "Columna-Perfil">
      <div class = "Elementos-Perfil">
        <img src="img/iconos/managinn.png" width="180px" alt="" class=""
        style="margin-left:30px; margin-bottom: 110px">
        <div class = "Botones-Perfil">
          <a class="Icono-Menu-Perfil">
            <img src="./img/iconos/Etiqueta-Dashboard.svg" alt="Dashboard" height="25px">
          </a>
          <a class="Icono-Menu-Perfil" href = "global.php">
            <img src="./img/iconos/Etiqueta-Global.svg" alt="Global" height="25px">
          </a>
          <a class="Icono-Menu-Perfil" href = "personas.php">
            <img src="./img/iconos/Etiqueta-Personas.svg" alt="Personas" height="27px">
          </a>
          <a class="Icono-Menu-Perfil current" href = "presupuesto.php">
            <img class="current-Icono" src="./img/iconos/Etiqueta-Presupuesto.svg" alt="Presupuesto" height="25px">
          </a>
        </div>

        <div class = "Usuario-Perfil"> 

          <img src = "./img/iconos/Icono-Perfil.png" alt="Icono" 
          height="45px"
          style = "border-radius: 5px; float: left; margin-right: 10px;">

          <div style = "float:left;">
            <p class="Texto-Nombre-Perfil"><strong> <?php echo $nombre;?></strong></p>
            <p class="Texto-Rol-Perfil"><?php echo $rol?></p>
          </div>

          <div class = "Perfil-Dropdown-Container" style = "float: right;">
            <div class="btn-group dropright ">
              <button type="button" class="btn btn-secondary dropdown-toggle Boton-Dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               
              </button>
              <div class="dropdown-menu">
                <!-- Dropdown menu -->
                <a style="color:#eb5757; margin-left: 15px" href = "index.php?logout='1'">Cerrar Sesión</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>

  <div class="Blanco-Fondo" style="padding-left: 240px; padding-top:30px" > 

  <!--Ventana para crear proyectos-->
  <div id="Crear-Proyecto" class = "Caja-Texto-Blanco" style = "display:block;height: 90%;">
    <div class="progress Linea-Progreso">
      <div class="progress-bar" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:100%">
      </div>
    </div>  

    <div class="Progreso-Proyecto">
        <ul>
          <li class = "progreso-pasado">
            <div class ="circulo-pasado"><img src="img/iconos/Check-Icon.png" 
              style="height: 10px; margin-top: -5px;"></div>
            <p class = "Texto-Progreso" style="color: #eb5757">Inicial</p>
          </li>
          <li class = "progreso-pasado">
            <div class ="circulo-pasado"><img src="img/iconos/Check-Icon.png" 
              style="height: 10px; margin-top: -5px;"></div>
            <p class = "Texto-Progreso" style="color: #eb5757">Actual</p>
          </li>
          <li class = "progreso-actual">
            <div class ="circulo-actual"></div>
            <p class = "Texto-Progreso" style="padding-top:15px; color: #eb5757">Gastos</p>
          </li>
        </ul>
    </div>

    <div>
      <div>
        <h3 class="Text-Center Titulo Azul" style="font-size: 28pt">Selecciona categoría de gastos</h3>
        <p class="Subtitulo Text-Center Azul" style="margin-bottom: 5px">
        ¿En cuáles de estas categorías inviertes el presupuesto para el departamento de innovación? 
        <br>Si no encuentras alguno, no te procupes, puedes agregarlo más tarde.
        </p>
        <div class = "Caja-Centro" style="width: 900px; left: 33%">
          <form class ="FormCrear1" action="con_presupuesto3.php" method = "post">
            <div class="row" style="width: 100%; height: 400px;">
              <div class="col-4" style="height: 100%;">

                <div class="input-group mb-3">
                  <div class="inputGroup">
                    <input id="option1" name="option1" type="checkbox" />
                    <label class="d-flex flex-row box-shadow categoria" for="option1">
                      <img src="img/iconos/papeleria.svg" alt="Papeleria">
                      <div class="titulo_categorias">
                        <h5>PAPELERIA</h5>
                        <p>Post-its, marcadores, libretas, ganchos, papel, carpetas, cinta...</p>
                      </div>
                    </label>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <div class="inputGroup">
                    <input id="option6" name="option6" type="checkbox" />
                    <label class="d-flex flex-row box-shadow categoria" for="option6">
                      <img src="img/iconos/materiales.svg" alt="materiales">
                      <div class="titulo_categorias">
                        <h5>MATERIALES </h5>
                        <p>Materiales específicos para proyectos</p>
                      </div>
                    </label>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <div class="inputGroup">
                    <input id="option9" name="option9" type="checkbox" />
                    <label class="d-flex flex-row box-shadow categoria" for="option9">
                      <img src="img/iconos/desarrollo.svg" alt="desarrollo">
                      <div class="titulo_categorias">
                        <h5>DESARROLLO </h5>
                        <p>Tercerización de servicios de desarrollo</p>
                      </div>
                    </label>
                  </div>
                </div>

              </div>

              <div class="col-4" style="height: 100%;">

                <div class="input-group mb-3">
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

                <div class="input-group mb-3">
                  <div class="inputGroup">
                    <input id="option4" name="option4" type="checkbox" />
                    <label class="d-flex flex-row box-shadow categoria" for="option4">
                      <img src="img/iconos/capacitaciones_cat.svg" alt="capacitaciones">
                      <div class="titulo_categorias">
                        <h5>CAPACITACIONES</h5>
                        <p>Cursos de preparación de cualquier tipo.</p>
                      </div>
                    </label>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <div class="inputGroup">
                    <input id="option5" name="option5" type="checkbox" />
                    <label class="d-flex flex-row box-shadow categoria" for="option5">
                      <img src="img/iconos/licencia.svg" alt="licencia">
                      <div class="titulo_categorias">
                        <h5>LICENCIAS</h5>
                        <p>Software de diseño, prototipado, render, cálculo...</p>
                      </div>
                    </label>
                  </div>
                </div>

              </div>

              <div class="col-4" style="height: 100%;">

                <div class="input-group mb-3">
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

                <div class="input-group mb-3">
                  <div class="inputGroup">
                    <input id="option7" name="option7" type="checkbox" />
                    <label class="d-flex flex-row box-shadow categoria" for="option7">
                      <img src="img/iconos/infraestructura.svg" alt="Papeleria">
                      <div class="titulo_categorias">
                        <h5>INFRAESTRUCTURA </h5>
                        <p>Construcción y remodelación de planta física.</p>
                      </div>
                    </label>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <div class="inputGroup">
                    <input id="option8" name="option8" type="checkbox" />
                    <label class="d-flex flex-row box-shadow categoria" for="option8">
                      <img src="img/iconos/mobiliario.svg" alt="mobiliario">
                      <div class="titulo_categorias">
                        <h5>MOBILIARIO </h5>
                        <p>Todo tipo de elementos de oficina y equipos</p>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            

            <div style="width: 350px; margin-left: 250px">
              <a class = "btn btn-custom btn-large Boton-a-Principal-Sin-Fondo" 
                  style = "padding: 15px 30px;float:left"
                  name = "Boton-Proyecto" 
                  id = "Boton-Omitir-Preferencias"
                  href="presupuesto.php"
              >Cancelar</a>
              <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                  type="submit" 
                  name="Boton-Continuar"
                  value="Continuar"
                >
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

    
<?php
include("footer.php");
?>
