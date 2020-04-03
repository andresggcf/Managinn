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
    <!--Ventana cuando no hay proyectos-->
    <div id = "Sin-Proyecto">
      <h3 class="Text-Center Titulo Negro" style="font-size: 28pt">Primero, crea un proyecto.</h3>
      <p class="Subtitulo Text-Center Negro">Tu sistema de Innovación está conformado por <br>diversos
        factores, uno de ellos es tu portafolio de proyectos.
      </p>

      <img height="400px" 
      src="./img/iconos/Ilustracion-Dashobard-Vacio.png" 
      alt="Global"
      style="margin:10px 0px 60px 55px;">

      <div>
        <button class = "Boton-a-Principal-Fondo-Blanco" 
              name = "Boton-Proyecto" 
              id = "Boton-Crear-Proyecto"
               >Crear un Proyecto</button>
      </div>
    </div>

    <!--Ventana para crear proyectos-->
    <div id="Crear-Proyecto" class = "Caja-Texto-Blanco">

    <div class="progress Linea-Progreso">
        <div class="progress-bar" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:0%">
      </div>
      </div>  
      <div class="Progreso-Proyecto">
          <ul>
            <li class = "progreso-actual">
              <div class ="circulo-actual"></div>
              <p class = "Texto-Progreso" style="padding-top:15px;">Datos</p>
            </li>
            <li class = "progreso-no">
              <div class ="Circulo-Progreso"></div>
              <p class = "Texto-Progreso">Equipo</p>
            </li>
            <li class = "progreso-no">
              <div class ="Circulo-Progreso"></div>
              <p class = "Texto-Progreso">Recursos</p>
            </li>
          </ul>
      </div>

      <div id = "Creacion1">
        <div>
          <h3 class="Text-Center Titulo Negro" style="font-size: 28pt">Datos básicos del proyecto</h3>
          <p class="Subtitulo Text-Center Negro">Queremos conocer tu proyecto, cuéntanos sobre él.
          </p>
          <div class = "Caja-Centro">
            <form class ="FormCrear1" action="con_crearProyecto.php" method = "post">
              <div>
                <div style = "position: relative;">
                  <input class="Form-Field Input-Fondo-Blanco" 
                  autocomplete="off"
                  name="proyecto_post"
                  id="proyecto" 
                  placeholder="" 
                  type="text"
                  required/>
                  <label class="Label-Form">Nombre del Proyecto</label>
                </div>
                <div style = "position: relative;">
                  <input class="Form-Field Input-Fondo-Blanco" 
                  autocomplete="off"
                  name="fecha_post" 
                  id="fecha" 
                  placeholder= "" 
                  type="date"
                  required/> 
                  <label class="Label-Form Label-Focus">Fecha de Inicio</label>
                </div>
                <div style = "position: relative;">
                  <textarea class="Form-Field Input-Fondo-Blanco Area-Texto-Crear" 
                  autocomplete="off"
                  name="descripcion_post" 
                  id="descripcion" 
                  placeholder= "" 
                  type="text"
                  required></textarea> 
                  <label class="Label-Form">Descripción Breve</label>
                </div>
                <div>
                <button class = "Boton-a-Principal-Fondo-Blanco Submit-Simple Boton-Cancel-Creacion-Proyecto"  
                  name="Boton-inicio"
                  id="Boton-Cancelar-Creacion" 
                  >Cancelar</button>  
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

   <!-- Si ya hay un proyecto:
    <div class="Caja-Texto-Blanco">
    </div>

    -->
  </div>



  <script type="text/javascript">

    /* Al hacer clic en el botón de crear proyecto */
    document.getElementById('Boton-Crear-Proyecto').onclick = function(){
      document.getElementById('Sin-Proyecto').style.display = 'none';
      document.getElementById('Crear-Proyecto').style.display = 'block';
    }

    document.getElementById('Boton-Cancelar-Creacion').onclick = function(){
      document.getElementById('Sin-Proyecto').style.display = 'block';
      document.getElementById('Crear-Proyecto').style.display = 'none';
    }
  </script>


<?php
  include("footer.php");
?>