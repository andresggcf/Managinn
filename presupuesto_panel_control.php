<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body class="global-view panel_control presupuesto">
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
          <a class="Icono-Menu-Perfil current" >
            <img class="current-Icono"  src="./img/iconos/icono_global.svg" alt="Global">
          </a>
          <a class="Icono-Menu-Perfil" href = "personas.php">
            <img src="./img/iconos/icono_personas.svg" alt="Personas">
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

    <div class="contenedor_dashboard">
        <div class="container-fluid">
            <div class="row kpi">
                <div class="col-5 my-3">
                    <div class="info_general px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center">
                        <div class="nombre">
                            <h2>Hola,<?php echo $_SESSION['name_post'];?></h2>
                            <p>Asi se ve tu sistema de innovación global en:</p> 
                        </div>
                        <div class="mes d-flex flex-row align-items-center justify-content-around">
                            <a id="less_month" href="#"><</a>
                            <span id="mes_actual">Diciembre</span>
                            <a id="more_month" href="#">></a>
                        </div>
                        <div class="imagen">
                            <img src="img/iconos/ilustracion_saludo.svg" alt="Saludo">
                        </div>
                    </div>
                </div>
                <div class="col-3 my-3">
                    <div class="box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-around align-items-center">
                        <div class="texto_escalamiento">
                          <h4 class="uppercase"><img src="img/iconos/presupuesto_total.svg" alt="" class="img_icons"> Presupuesto Total</h4>
                          <div class="d-flex flex-column ml-5">
                            <span id="presupuesto_usado" class="icon_pesos">0</span>
                            <span class="total">de <em id="total_presupuesto_usado" >$0</em> <em><span class="badge badge-pill badge-azul">Anual</span></em> </span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 my-3">
                    <div class="conversion box-shadow px-0 pb-0 pt-2 d-flex flex-row justify-content-around align-items-center">
                        <div class="texto_escalamiento">
                            <h4  class="uppercase"><img src="img/iconos/icono_dias_activo.svg" alt="" class="img_icons">Estado del presupuesto</h4>
                            <div>
                              <span id="value1">40%</span>
                              <span id="value2">50%</span>
                            </div>
                            <div class="valores_conversion">
                              <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-blue" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="d-flex flex-row justify-content-around">
                              <span id="p_usado">presupuesto usuado</span>
                              <span id="p_programado">presupuesto programado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row graficas">
                <div class="col-5">
                  <div class="box-shadow">
                    <h4 class="uppercase"><img src="img/iconos/categorias_presupeusto.png" alt="Metricas" class="img_icons">Categorias</h4>
                    <div class="row pt-4 categorias_presupuesto">
                      <div class="col-lg-6 col-xl-3">
                        <a href="#" class="bg-blue p-4 box-shadow d-flex flex-column justify-content-center">
                          <img src="img/iconos/capacitaciones_cat.svg" alt="capacitaciones">
                          <p class="text-center mt-3">Capacitaciones</p>
                        </a>
                      </div>
                      <div class="col-lg-6 col-xl-3 d-flex">
                        <a class="border-radius d-flex flex-column justify-content-center align-items-center" href="#">
                          +
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-7">
                    <div class="box-shadow my-3">
                    <div class="bg-color d-flex align-items-center ">
                      <h4 class="uppercase mr-2"> <img src="img/iconos/mapeo_de_gastos.svg" alt="Metricas" class="img_icons"> Mapeo de gastos</h4>
                      <select class="form-control mb-2" id="proyectos_convertidos">
                        <option value="" disabled selected>Capacitaciones</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <canvas id="chartPresupuesto" class="bg-color grafica" height="400"></canvas>
                    </div>
                    
                </div> 
            </div>
            <div class="row">
              <div class="col-3 my-3">
                <div class="row">
                  <div class="col-12">
                    <div class="box-shadow">
                      <h4 class="uppercase"><img src="img/iconos/alcance.svg" alt="" class="img_icons"> Alcance</h4>
                      <div class="valores_escalamiento d-flex flex-row">
                        <span id="escalamiento">
                            0%
                        </span>
                        <p>
                          <strong>+0%</strong>
                          que el mes anterior
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="box-shadow">
                      <h4 class="uppercase"><img src="img/iconos/coste.svg" alt="" class="img_icons"> Coste</h4>
                      <div class="valores_escalamiento d-flex flex-row">
                        <span id="escalamiento">
                            0%
                        </span>
                        <p>
                          <strong>+0%</strong>
                          que el mes anterior
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-5 my-3">
                  <div class="box-shadow">
                    <h4 class="uppercase"><img src="img/iconos/evaluacion.svg" alt="" class="img_icons"> Evaluación de innovación</h4>
                    <div class="d-flex flex-column ml-5">
                      <span id="presupuesto_usado" class="icon_pesos">0</span>
                      <span class="total">de <em id="total_presupuesto_usado" >$0</em></span>
                    </div>
                  </div>
              </div>
              <div class="col-4 my-3 ">
                  <div class="box-shadow d-flex flex-column">
                    <h4 class="uppercase"><img src="img/iconos/calidad.svg" alt="" class="img_icons"> Calidad</h4>
                    <span id="valor_actual_neto" class="ml-5 icon_pesos">0</span>
                  </div>
              </div>
          </div>
        </div>
        <div class="btn-flotante">
          <img src="img/iconos/boton_reporte.svg" alt="Descargar Reporte">
        </div>
    </div>


    
<?php
include("footer.php");
?>