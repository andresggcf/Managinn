<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body>
  <div class="NavBar">
    <div class="Contenedor-Menu">
      <img src="img/iconos/managinn.png" width="180px" alt="" class="">
    </div>
  </div>

  <div>
    <div class = "Columna-Perfil">
      <div class = "Elementos-Perfil">
        <div class = "Botones-Perfil">
          <a class="Icono-Menu-Perfil" href = "perfil.php">
            <img src="./img/iconos/Etiqueta-Dashboard.svg" alt="Dashboard" height="25px">
          </a>
          <a class="Icono-Menu-Perfil" href = "global.php">
            <img src="./img/iconos/Etiqueta-Global.svg" alt="Global" height="25px">
          </a>
          <a class="Icono-Menu-Perfil current">
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
  </div>


  <!--Ventana cuando no hay proyectos -->
  <div class="Blanco-Fondo"> 

    <div id = "Sin-Equipo">
      <h3 class="Text-Center Titulo Negro" style="font-size: 28pt">Es momento de reunir a tu equipo.</h3>
      <p class="Subtitulo Text-Center Negro">Aún no tenemos información. Pero no te preocupes, añádela para comenzar.
      </p>

      <img height="400px" 
        src="./img/iconos/Ilustracion-Personas-Vacio.png" 
        alt="Global"
        style="margin:10px 0px 60px 60px;">

      <div class="d-flex flex-column align-items-center">
        <a class = "Boton-a-Principal-Fondo-Blanco" 
          href="personas_invitar.php"
          >Invitar personas</a>
      </div>
      <div>
        <a class = "btn btn-custom btn-large Boton-a-Principal-Sin-Fondo" 
        style = "padding: 15px 10px; max-width: 190px"
        name = "Boton-Proyecto" 
        id = "Boton-Omitir-Preferencias"
        href="global.php"
       >Omitir</a>
      </div>
    </div>
  </div>


<?php
  include("footer.php");
?>