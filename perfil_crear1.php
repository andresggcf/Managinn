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
          <a class="Icono-Menu-Perfil current">
            <img class="current-Icono" src="./img/iconos/Etiqueta-Dashboard.svg" alt="Dashboard" height="25px">
          </a>
          <a class="Icono-Menu-Perfil" href = "global.php">
            <img src="./img/iconos/Etiqueta-Global.svg" alt="Global" height="25px">
          </a>
          <a class="Icono-Menu-Perfil" href = "personas.php">
            <img src="./img/iconos/Etiqueta-Personas.svg" alt="Personas" height="27px">
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


  <div class="Blanco-Fondo" style="padding-left: 240px;"> 

    <!--Ventana para crear proyectos-->
    <div id="Crear-Proyecto" class = "Caja-Texto-Blanco" style = "display:block">

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
              <p class = "Texto-Progreso">Datos</p>
            </li>
            <li class = "progreso-actual">
              <div class ="circulo-actual"></div>
              <p class = "Texto-Progreso" style="padding-top:15px;">Equipo</p>
            </li>
            <li class = "progreso-no">
              <div class ="Circulo-Progreso"></div>
              <p class = "Texto-Progreso">Recursos</p>
            </li>
          </ul>
      </div>

      <div class="Cont-Crear">
        <div>
          <h3 class="Text-Center Titulo Azul" style="font-size: 28pt">Invitar al equipo</h3>
          <p class="Subtitulo Text-Center Azul">Manda una invitación a los integrantes que deseas en este proyecto.
          </p>
        </div>

        <div style="width: 500px; margin-top: 40px;">
          <form class ="FormCrear1" action="perfil_crear2.php" method = "post" id="form-equipo">
            <div>
              <div style = "position: relative;">
                <input class="Form-Field Input-Fondo-Blanco" 
                    autocomplete="off"
                    name="proyecto_post"
                    id="proyecto" 
                    type="text"
                    required/>
                <label class="Label-Form Label-Dark">Correo</label>

                <div class = "Select-Campo-Equipo">
                  <select class = "Select-Equipo" id = "roles" name = "rol_equipo">
                    <option value = "facilitador">Facilitador</option>
                    <option value = "colaborador">Colaborador</option>
                  </select>
                  <label class="Label-Form Label-Focus">Rol</label>
                </div>
              </div>

              <div style="width:300px; padding-left: 0px; margin-left: 80px; margin-top: 200px;">
              <a class = "btn btn-custom btn-large Boton-a-Principal-Sin-Fondo" 
                    style = "padding: 15px 30px;float:left"
                    name = "Boton-Proyecto" 
                    id = "Boton-Omitir-Preferencias"
                    href="perfil.php"
                  >Cancelar</a>
                <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                    type="submit" 
                    name="Boton-Continuar"
                    id="Boton-Continuar-creacion" 
                    value="Continuar">
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>



<?php
  include("footer.php");
?>