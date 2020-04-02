<?php
  session_start();

  $usuario_nombre = $_SESSION['name_post'];
  $usuario_correo = $_SESSION['email_post'];
  $usuario_rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  $p_nombre = $_SESSION['proyecto_nombre'];
  $p_fecha = $_SESSION['fecha_proyecto'];
  $p_descripcion = $_SESSION['desc_proyecto'];
  $p_id= $_SESSION['id_proyecto'];


  
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
            <p class="Texto-Nombre-Perfil"><strong> <?php echo $_SESSION['name_post'];?></strong></p>
            <p class="Texto-Rol-Perfil"><?php echo $_SESSION['role_post'];?></p>
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

  <div class="Blanco-Fondo"> 

    <!--Ventana para crear proyectos-->
    <div id="Crear-Proyecto" class = "Caja-Texto-Blanco" style = "display:block">

      <div class="Progreso-Proyecto">
          <ul>
            <li class = "progreso-pasado">
              <div class ="circulo-pasado"></div>
              <p class = "Texto-Progreso">Datos</p>
            </li>
            <li class = "progreso-actual">
              <div class ="circulo-actual"></div>
              <p class = "Texto-Progreso">Equipo</p>
            </li>
            <li class = "Gris">
              <div class ="Circulo-Progreso"></div>
              <p class = "Texto-Progreso">Recursos</p>
            </li>
          </ul>
      </div>

      <div id = "Creacion1">
        <div>
          <h3 class="Text-Center Titulo Negro" style="font-size: 28pt">Invitar al equipo</h3>
          <p class="Subtitulo Text-Center Negro">Manda una invitación a los integrantes que deseas en este proyecto.
          </p>
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
                  <label class="Label-Form">Correo</label>

                  <div class = "Select-Campo-Equipo">
                    <select class = "Select-Equipo"id="roles" name="rol_equipo">
                      <option value="volvo">Facilitador</option>
                      <option value="saab">Colaborador</option>
                    </select>
                    <label class="Label-Form Label-Focus">Rol</label>
                  </div>
                </div>
                <div>
                  <a class = "Boton-a-Principal-Fondo-Blanco Submit-Simple Boton-Cancel-Creacion-Proyecto"
                    href="javascript:history.go(-1)"
                    style="margin-top: 0px; height: 50px;">Volver</a> 
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
  </div>



<?php
  include("footer.php");
?>