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
          <a class="Icono-Menu-Perfil" href = "perfil.php">
            <img src="./img/iconos/Etiqueta-Dashboard.svg" alt="Dashboard" height="25px">
          </a>
          <a class="Icono-Menu-Perfil" href = "global.php">
            <img src="./img/iconos/Etiqueta-Global.svg" alt="Global" height="25px">
          </a>
          <a class="Icono-Menu-Perfil current" href = "personas.php">
            <img class="current-Icono" src="./img/iconos/Etiqueta-Personas.svg" alt="Personas" height="27px">
          </a>
          <a class="Icono-Menu-Perfil" href = "presupuesto.php">
            <img src="./img/iconos/Etiqueta-Presupuesto.svg" alt="Presupuesto" height="25px">
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

  <div class="Blanco-Fondo" style="padding-left: 240px; background-image: url('../img/fondos/fondo.svg'); "> 
    <div class="container-fluid">
      <div class="invitados row justify-content-center align-items-center" style="padding-top: 0px">
        <div class="col-6">
          <div class="body-popup box-shadow pb-5">
            <div class="title text-center">
              <div>
                <h3 class="Text-Center Titulo Azul" style="font-size: 28pt">¡GRACIAS!</h3>
                <p class="Subtitulo Text-Center Azul">Gracias por invitar a tu equipo a nuestra plataforma.
                </p>
              </div>
              <p>Esta(s) persona(s) se añadirá(n) a tu lista en cuanto acepte(n)<br>la invitación y se una(n) a Managinn’</p>
            </div>
            <div class="row justify-content-center">
              <div class="col-6  mt-3 mb-0 d-flex justify-content-around" >
                <a class="btn btn-custom  btn-bg-red" href="con_invitacion2.php" style="padding: 10px 20px">Continuar</a>
              </div>
              <div class="w-100"></div>
                <div class="col-6 mt-0 mb-4">
                  <small>¿Quiéres enviar otra? <a href="personas_invitar.php">Hazlo aquí</a></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include("footer.php");
?>


    
