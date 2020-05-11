<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body class="panel_control">
  <div class="NavBar">
    <div class="Contenedor-Menu">
      <!-- <img src="img/iconos/managinn.png" width="180px" alt="" class=""> -->
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
          <a class="Icono-Menu-Perfil" >
            <img   src="./img/iconos/icono_global.svg" alt="Global">
          </a>
          <a class="Icono-Menu-Perfil current" href = "personas.php">
            <img class="current-Icono" src="./img/iconos/icono_personas.svg" alt="Personas">
          </a>
          <a class="Icono-Menu-Perfil" href = "presupuesto.php">
            <img src="./img/iconos/icono_presupuesto.svg" alt="Presupuesto">
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

    <div class="new-body">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-8">
            <div class="body-popup box-shadow ">
              <div class="title text-center">
                <h2>
                  Tu equipo de trabajo
                </h2>
                <p>Enviaremos una invitación a esta(s) persona(s), recibirán acceso una vez se registren.</p>
              </div>
              <form action="">
                <div class="row justify-content-center select_proyectos">
                  <div class="form-group mb-3 col-5 my-3">
                    <input class="form-control border-radius" type="email" name="email_invite" id="email_invite" placeholder="Email">
                  </div>
                  <div class="form-group mb-3 col-3 my-3">
                    <select class="form-control border-radius" id="proyectos_convertidos" >
                      <option value="" disabled selected>Asignar rol</option>
                      <option>Desarrollo</option>
                      <option>Diseño</option>
                      <option>Marketing</option>
                      <option>Recursos</option>
                    </select>
                  </div> 
                  <div class="w-100"></div>
                  <div class="col-8 d-flex flex-column mt-3 mb-5">
                    <a href="" class="invitar_mas">  Invitar a más personas</a>
                    <a href="" class="seleccionar_lista"> Seleccionar desde tu lista</a>
                  </div> 
              </div>
              <div class="row justify-content-center">
                <div class="col-5  my-3 d-flex justify-content-around" >
                <a class = "btn btn-custom btn-large Boton-a-Principal-Sin-Fondo" 
                    name = "Boton-Proyecto" 
                    id = "Boton-Omitir-Preferencias"
                    href="personas_panel_control.php"
                    >Omitir</a>
                  <input class = "Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" 
                    type="submit" 
                    name="Boton-Continuar"
                    value="Enviar"
                    >
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--container-fluid-->
    </div>


    
<?php
include("footer.php");
?>