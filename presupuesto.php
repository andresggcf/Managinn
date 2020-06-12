<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body class="panel_control presupuesto h-100">
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

  <!--Ventana cuando no hay proyectos -->
  <div class="Blanco-Fondo"> 

    <div id = "Sin-Presupuesto">
      <h3 class="Text-Center Titulo Negro" style="font-size: 28pt">Por último, plantea los números.</h3>
      <p class="Subtitulo Text-Center Negro">Aún no tenemos información. Pero no te preocupes, añádela para comenzar.
      </p>

      <img height="400px" 
        src="./img/iconos/Ilustracion-Presupuesto-Vacio.png" 
        alt="Global"
        style="margin:10px 0px 60px 100px;">

      <div class="d-flex flex-column align-items-center">
        <a class="btn btn-custom btn-large btn-bg-red" name="Boton-Proyecto" id="Boton-Omitir-Preferencias"
          href="presupuesto_informacion.php">Añadir información</a>
        <a class="btn btn-custom btn-on btn-large" name="Boton-Proyecto" id="Boton-Omitir-Preferencias"
          href="presupuesto_panel_control.php">Omitir</a>
      </div>
    </div>
  </div>

<?php
  include("footer.php");
?>