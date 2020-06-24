<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  require 'conexion.php';

  $queryInduccion = "SELECT induccion, induccion_personas FROM usuarios WHERE correo = '$correo' AND nombre = '$nombre'";
  $resultado = mysqli_query($db, $queryInduccion);
  $arregloInduccion = mysqli_fetch_array($resultado);

  $induccion_per =  $arregloInduccion['induccion_personas'];

  include("header.php");
  ?>

<body class="global-view panel_control1">
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
          <a class="Icono-Menu-Perfil " href = "presupuesto.php">
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


  <!--Ventana cuando no hay proyectos -->
  <div class="Blanco-Fondo" style="padding-left: 240px;"> 

    <div id = "Sin-Equipo">
      <h3 class="Text-Center Titulo" style="font-size: 28pt">Es momento de reunir a tu equipo.</h3>
      <p class="Subtitulo Text-Center">Aún no tenemos información. Pero no te preocupes, añádela para comenzar.
      </p>

      <img height="400px" 
        src="./img/iconos/Ilustracion-Personas-Vacio.png" 
        alt="Global"
        style="margin:10px 0px 60px 60px;">

      <div class="d-flex flex-column align-items-center">
        <a class = "Boton-a-Principal-Fondo-Blanco" href="personas_invitar.php">Invitar personas</a>
        <a class = "Boton-a-Principal-Sin-Fondo inline"  
            style="text-decoration: none; width: 190px; padding-left: 70px"
            name="btn_back"
            type="button" 
            href="presupuesto.php"
            >Omitir</a>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    var ind_per = <?php echo $induccion_per ?>;
    console.log("usuario tuvo induccion personas: " + ind_per);

    function loadPage(){
      console.log ("loadPage()");
      if (ind_per == 0 )
      {
        console.log ("ind_per = 0 ? :" + ind_per);
      }
      else
      {
        console.log ("ind_per = 1 ? :" + ind_per);
        window.location.href="personas_panel_control.php?rol=Facilitador"
      }
    }

    loadPage();
  </script>


<?php
  include("footer.php");
?>