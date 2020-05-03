<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  require 'conexion.php';
  
  /*Cogemos el id del usuario para ver si tiene proyectos*/
  $queryIdUsuario = "SELECT id FROM usuarios WHERE correo = '$correo' AND nombre = '$nombre'";
  $resultado =  mysqli_query($db, $queryIdUsuario);
  $arregloIdU = mysqli_fetch_assoc($resultado);

  $_SESSION['id_usuario'] = $arregloIdU['id'];

  $id = $_SESSION['id_usuario'];

  /*Query para sacar la cantidad de proyectos que pertenecen a un perfil*/
  $queryConProyectos = "SELECT COUNT(*) FROM equipos WHERE id_usuario = '$id'";
  $resultado2 =  mysqli_query($db, $queryConProyectos);
  $arregloProyectos = mysqli_fetch_array($resultado2);

  $contProyectos = $arregloProyectos[0];

  /*Query que muestra si el perfil tuvo "induccion"*/
  $queryInduccion = "SELECT induccion FROM usuarios WHERE correo = '$correo' AND nombre = '$nombre'";
  $resultado3 = mysqli_query($db, $queryInduccion);
  $arregloInduccion = mysqli_fetch_array($resultado3);

  $_SESSION['induccion'] = $arregloInduccion['induccion'];

  $induccion = $_SESSION['induccion'];

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


  <div class="Blanco-Fondo"> 

    <!--Ventana cuando no hay proyectos-->
    <div id="Sin-Proyecto">
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

      <div>
        <div>
          <h3 class="Text-Center Titulo Azul" style="font-size: 28pt">Datos básicos del proyecto</h3>
          <p class="Subtitulo Text-Center Azul">Queremos conocer tu proyecto, cuéntanos sobre él.
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
                  <label class="Label-Form Label-Dark">Nombre del Proyecto</label>
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
                  <label class="Label-Form Label-Dark">Descripción Breve</label>
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

    <!-- Si ya hay un proyecto: -->
    <div class = "Contenedor-Info-Proyectos" id="Cont-Proyecto">
      <p class = "Titulo-Dashboard">Proyectos en Curso (<?php echo $contProyectos ?>)<p>
      <div class = "row">
        <?php 
          require 'conexion.php';

          $queryProyectos = "SELECT p.* FROM proyecto p
          INNER JOIN equipos e ON p.id = e.id_proyecto
          INNER JOIN usuarios u ON e.id_usuario = u.id 
          WHERE u.id = $id AND p.estado = 'A'";
          echo $queryProyectos;
          
          if ($result = mysqli_query($db, $queryProyectos)) 
          {
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) 
            { 
              $idProyecto = $row['id'];
              $queryFacilitador = "SELECT u.nombre FROM usuarios u
              INNER JOIN equipos e ON u.id = e.id_usuario WHERE u.rol = 'facilitador'
              AND e.id_proyecto = $idProyecto";

              $executeFacilitador = mysqli_query($db, $queryFacilitador);
              $facilitador = mysqli_fetch_assoc($executeFacilitador);
              ?> 
              <div class="col-sm-3"> 
                <div class="card Tarjeta-Proyecto">
                  <div class="card-body">
                    <div>
                      <div class = "Perfil-Dropdown-Container">
                        <div class="btn-group">
                          <button type="button" class="btn btn-secondary dropdown-toggle Boton-Dropdown-Proyecto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          </button>
                          <div class="dropdown-menu proyecto">
                            <!-- Dropdown menu -->
                            <a class="proyecto-boton-menu" 
                              style="margin-left:15px;" 
                              id="boton-editar"
                              href=<?php echo "perfil.php?proyecto=",$idProyecto;?>
                              >
                              <img  alt="" src="img/iconos/icono-editar.svg" width="40px" height="40px"
                                style = "margin-top:60px; margin-bottom:15px">
                            </a>
                            <a class="proyecto-boton-menu" 
                              style="margin-left: 15px;" 
                              >
                              <img  alt="" src="img/iconos/icono-borrar.svg" width="40px" height="40px"
                                style = "margin-bottom:15px">
                            </a>
                            <a class="proyecto-boton-menu" 
                              style="margin-left: 15px;" 
                              >
                              <img  alt="" src="img/iconos/icono-copiar.svg" width="40px" height="40px"
                                style = "margin-bottom:15px">
                            </a>
                          </div>
                        </div>
                      </div>

                      <p class = "Titulo-Tarjeta-P"> <?php echo $row['nombre'];?></p>
                      <p class = "Subtitulo-Tarjeta-P"> <?php echo "<b>Facilitador: </b>", $facilitador['nombre'];?></p>
                      <p class = "Subtitulo-Tarjeta-P"> <?php echo "<b>Fecha Inicio: </b>", $row['fecha_inicio']?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          } 
        ?>
        <div class = "col-sm-3">
          <button class = "Btn-Add-Proyecto" id="Boton-Crear-Proyecto-2">+</button>
        </div>
      </div>
    </div>


     <!-- Si ya hizo induccion -->
     <div class = "Contenedor-Info-Proyectos" id="Induc-Proyecto"> 
      <p class = "Titulo-Dashboard">Proyectos en Curso (0)<p>
        <div class = "col-sm-3" style="float:left">
          <button class = "Btn-Add-Proyecto" id="Boton-Crear-Proyecto-2">+</button>
        </div>
        <div class = "col-sm-9" style="float:left; height: 95%; position:relative">
          <div class = "contenedor-Induc-Proyecto">
            <img height="300px" 
              src="./img/iconos/Illustracion-Induccion.png" 
              alt="Global"
              style="margin-bottom: 30px">
              <p class = "Titulo-Dashboard"
              style = "text-align: center;">Ups!<p>
              <p class="Subtitulo Text-Center Negro">Aún no tienes ningún proyecto en curso.<br>Pero no te preocupes,
              crea uno para comenzar.
              </p>
          </div>
        </div>
     </div>

  </div>




  <script type="text/javascript">
    var longProyectos = <?php echo $contProyectos?> ; 
    var induccion = <?php echo $induccion?>;
    console.log ("Usuario tuvo induccion:" + induccion);
    console.log ("proyectos en perfil: " + longProyectos);

    function loadPage(){
      if (induccion == 0 && longProyectos == 0)
      {
        console.log ("Usuario tuvo induccion: asd " + induccion);
        
        document.getElementById('Sin-Proyecto').style.display = 'block';
        document.getElementById('Crear-Proyecto').style.display = 'none';
        document.getElementById('Cont-Proyecto').style.display = 'none';
        document.getElementById('Induc-Proyecto').style.display = 'none';

        /* Al hacer clic en el botón de crear proyecto */
        document.getElementById('Boton-Crear-Proyecto').onclick = function()
        {
          document.getElementById('Sin-Proyecto').style.display = 'none';
          document.getElementById('Crear-Proyecto').style.display = 'block';
          document.getElementById('Cont-Proyecto').style.display = 'none';
          document.getElementById('Induc-Proyecto').style.display = 'none';
        }

        /* Al hacer clic en el botón de cancelar creacion proyecto */
        document.getElementById('Boton-Cancelar-Creacion').onclick = function()
        {
          document.getElementById('Sin-Proyecto').style.display = 'block';
          document.getElementById('Crear-Proyecto').style.display = 'none';
          document.getElementById('Cont-Proyecto').style.display = 'none';
          document.getElementById('Induc-Proyecto').style.display = 'none';
        }
      }

      else if(induccion == 1 && longProyectos == 0)
      {
        /*document.getElementById('Cont-Proyecto').style.display = 'none';
        document.getElementById('Crear-Proyecto').style.display = 'none';
        document.getElementById('Sin-Proyecto').style.display = 'none';
        document.getElementById('Induc-Proyecto').style.display = 'block';*/
      }
      
      else if (longProyectos != 0)
      {
        console.log ("Usuario tuvo induccion: asd34 " + induccion);
        document.getElementById('Sin-Proyecto').style.display = 'none';
        document.getElementById('Crear-Proyecto').style.display = 'none';
        document.getElementById('Cont-Proyecto').style.display = 'block';
        document.getElementById('Induc-Proyecto').style.display = 'none';

        document.getElementById('Boton-Crear-Proyecto-2').onclick = function()
        {
          document.getElementById('Sin-Proyecto').style.display = 'none';
          document.getElementById('Crear-Proyecto').style.display = 'block';
          document.getElementById('Cont-Proyecto').style.display = 'none';
          document.getElementById('Induc-Proyecto').style.display = 'none';
        }

        document.getElementById('Boton-Cancelar-Creacion').onclick = function()
        {
          document.getElementById('Sin-Proyecto').style.display = 'none';
          document.getElementById('Crear-Proyecto').style.display = 'none';
          document.getElementById('Cont-Proyecto').style.display = 'block';
          document.getElementById('Induc-Proyecto').style.display = 'none';
        }
      }
    }

    loadPage();

    document.getElementById("boton-editar").onclick = function()
    {
      console.log("clicked editar asdasf");
    }
    

  </script>


<?php
  include("footer.php");
?>