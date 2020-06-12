<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body class="panel_control personas h-100" style="position: absolute;">
  <div class="NavBar">
    <div class="Contenedor-Menu d-flex align-items-center justify-content-end">
      <!-- <img src="img/iconos/managinn.png" width="180px" alt="" class=""> -->
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
        <div class="row justify-content-between mb-5">
          <div class="col-3 radioBtn_container">
            <div class="form-group">
                <div class="input-group">
                  <div id="radioBtn" class="btn-group border-radius">
                    <a class="btn btn-custom btn-bg-azul btn-large active" data-toggle="selector" data-title="Facilitadores">Facilitadores</a>
                    <a class="btn btn-custom btn-bg-azul btn-large notActive" data-toggle="selector" data-title="Colaboradores">Colaboradores</a>
                  </div>
                  <input type="hidden" name="selector" id="selector">
                </div>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <div class="input-group border-radius filtro">
                <input type="text" class="input-clear form-control" placeholder="Filtro de palabras claves">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-4 mejora">
            <h2>
              Rendimiento con necesidad de mejora 
            </h2>
            <div id="mejora" class="row">
            </div>
          </div>
          <div class="col-12 mb-4 medio">
            <h2>
              Rendimiento medio 
            </h2>
            <div id="medio" class="row">

            </div>
            <p class="not_found">No hay personas en estas categoría</p>
          </div>
          <div class="col-12 mb-4 alto">
            <h2>
              Rendimiento alto 
            </h2>
            <div id="alto" class="row">
            </div>
          </div>
        </div>
        <div class="row panel_lateral ">
          <div class="col-12 py-4 padding-panel">
            <div class="close_btn"><img src="img/iconos/icono_cerrar.svg" alt=""></div>
            <div class="row">
              <div class="col-12 my-3">
                  <div class="perfil_completo d-flex flex-row justify-content-start align-items-center">
                    <img class="mx-3" style="width: 80px;" src="img/iconos/avatar_mujer.svg" alt="">
                    <div class="nombre">
                      <h2 class="m-0">Natalia Guevara Salcedo</h2>
                      <div class="cargo">Desarrollo</div>
                    </div>
                    <a href="#" class="btn btn-custom btn-bg-red btn-large btn-shadow-red ml-auto">Escribir mensaje</a>
                  </div>
              </div>
              <div class="col-4 my-3">
                <div class="datos box-shadow d-flex flex-column justify-content-around">
                  <h4><img class="img-fluid" src="img/iconos/icono_datos.svg" alt="Datos"> Datos</h4>
                  <span><strong>Activo desde:</strong></span>
                  <span><strong>Días de actividad:</strong></span>
                  <span><strong>Teléfono:</strong></span>
                  <span><strong>Correo:</strong></span>
                </div>
              </div>
              <div class="col-8 my-3">
                <div class="capacitaciones box-shadow ">
                  <h4><img src="img/iconos/capacitaciones.svg" style="height: 18px;" alt=""> Capacitaciones</h4>
                  <div class="row">
                    <div class="col-4">
                      <div class="box-shadow capacitacion d-flex flex-column justify-content-end px-0">
                        <h5 class="px-4">Design Thinking</h5>
                        <span class="px-4 pb-1">17/feb/19 - 30/feb/19</span>
                        <div class="progress">
                          <div class="progress-bar bg-blue" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="check-blue">
                        <img src="img/iconos/check-blue.svg" alt="">
                      </div>
                    </div>
                    <div class="col-4 d-flex">
                      <div class="border-radius d-flex justify-content-center align-items-center">
                        <img src="img/iconos/icono_anadir.svg" style="height: 15px;display: block;" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 my-3">
                <div class="desempeno box-shadow">
                  <h4><img src="img/iconos/desempeno.svg" style="height: 24px;" alt=""> Desempeño</h4>
                    <canvas id="chartDesempeno" class="bg-color grafica" ></canvas>
                </div>
              </div>
              <div class="col-7 mt-3">
                <div class="participacion box-shadow d-flex flex-column">
                  <h4><img src="img/iconos/participacion.svg" alt=""> Participación</h4>
                  <div class="row" style="height: 100%;">
                    <div class="col-3 d-flex">
                      <div class="bg-blue-texture px-0 d-flex flex-column justify-content-between">
                        <p class="px-3">Paneles Solares</p>
                        <div class="progress mb-2" style="height: 10px;">
                          <div class="progress-bar bg-yellow" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-5 mt-3">
                <div class="perfil_creativo box-shadow ">
                  <h4 class="mb-3"><img src="img/iconos/perfilcreativo.svg" style="height: 26px;" alt=""> Perfil Creativo</h4>
                  <div class="row">
                    <span class="herramienta col-5 d-flex align-items-center justify-content-end"><img src="img/iconos/herramienta-perfilcreativo.svg" style="height: 36px;"
                        alt=""></span>
                    <div class="col-7">
                      <h5>Implementador</h5>
                      <p>Su principal interés es <strong>hacer que las cosas se lleven a cabo.</strong></p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-6 my-3">
                <div class="habilidades box-shadow">
                  <h4><img src="img/iconos/habilidadesduras.svg" style="height: 24px;" alt=""> Habilidades Duras</h4>
                  <span class="badge badge-pill badge-azul">php7</span>
                </div>
              </div>
              <div class="col-6 my-3">
                <div class="habilidades box-shadow">
                  <h4><img src="img/iconos/habilidadesblandas.svg" style="height: 22px;" alt=""> Habilidades Blandas</h4>
                  <span class="badge badge-pill badge-rojo">Liderazgo</span>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <!--container-fluid-->
    </div>


    
<?php
include("footer.php");
?>