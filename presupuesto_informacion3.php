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

  <div class="Blanco-Fondo" style="padding-left: 240px; background-image: url('../img/fondos/fondo.svg'); " > 

  <!--Ventana para crear proyectos-->
  <div id="Crear-Proyecto" class = "Caja-Texto-Blanco" style = "display:block; height: 70%;">
    <div class="progress Linea-Progreso">
      <div class="progress-bar" role="progressbar" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100" style="width:50%">
      </div>
    </div>  

    <div class="Progreso-Proyecto">
        <ul>
          <li class = "progreso-pasado">
            <div class ="circulo-pasado"><img src="img/iconos/Check-Icon.png" 
              style="height: 10px; margin-top: -5px;"></div>
            <p class = "Texto-Progreso" style="color: #eb5757">Inicial</p>
          </li>
          <li class = "progreso-actual">
            <div class ="circulo-actual"></div>
            <p class = "Texto-Progreso" style="padding-top:15px; color: #eb5757">Actual</p>
          </li>
          <li class = "progreso-no">
            <div class ="Circulo-Progreso"></div>
            <p class = "Texto-Progreso">Gastos</p>
          </li>
        </ul>
    </div>

    <div>
      <div>
        <h3 class="Text-Center Titulo Azul" style="font-size: 28pt">Presupuesto actual</h3>
        <p class="Subtitulo Text-Center Azul" style="margin-bottom: 50px">
          A la fecha, aproximadamente, ¿cuánto queda de presupuesto que ingresó incialmente?
        </p>
        <?php 
          require 'conexion.php';

          $queryPresupuesto = "SELECT presupuesto_gen FROM data_presupuesto
          WHERE director = $usuario_id";

          $result = mysqli_query($db, $queryPresupuesto);
          $arreglo = mysqli_fetch_assoc($result);
        ?>
        <div class = "Caja-Centro" style="left: 36% !important;width: 750px;">
          <form class ="FormCrear1" action="con_presupuesto2.php" method = "post">
            <div>
              <div class="row justify-content-center align-items-center my-5">
                <div class="col-2" style="padding-left: 0px; padding-right: 20px; padding-top: 15px;">
                  <p style="text-align: right;width: 100%;display: block;" >$0</p>
                </div>
                <div class="input-group my-3 col-8 border-radius d-flex align-items-center" style="height: 54px;">
                  <!-- <input type="range" class="form-control custom-range slider" min="0" max="5" step="0.5" id="customRange3"> -->
                  <input id="ex1" data-slider-id='ex1Slider' 
                  type="text" 
                  data-slider-min="0" 
                  data-slider-max="<?php echo $arreglo['presupuesto_gen']; ?>" 
                  data-slider-step="100000" 
                  data-slider-value="0"
                  name="presupuesto_act"
                  /> 
                </div>
                <div class="col-2" style="padding-right: 0px;padding-top: 10px;">
                  <p>$ <?php
                    echo $arreglo['presupuesto_gen'];
                  ?></p>
                </div>
              </div>
              <div style="width: 350px;margin-top: 80px;margin-left: 33%;">
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
