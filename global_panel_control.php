<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body class="global-view panel_control">
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
                <div class="col-6 my-3">
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
                    <div class="escalamiento box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-around align-items-center">
                        <img src="img/iconos/EscalamientoPromedio.svg" alt="escalamiento">
                        <div class="texto_escalamiento">
                            <h4  class="uppercase">Escalamiento promedio</h4>
                            <div class="valores_escalamiento">
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
                <div class="col-3 my-3">
                    <div class="conversion box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-around align-items-center">
                        <img src="img/iconos/tasadeconversion.svg" alt="conversion">
                        <div class="texto_escalamiento">
                            <h4  class="uppercase">Tasa de conversión</h4>
                            <div class="valores_conversion">
                            <span id="tasa_conversion">
                                0
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
            <div class="row graficas align-items-start">
                <div class="col-10">
                    <div class="box-shadow my-3">
                    <div class="bg-color d-flex align-items-center ">
                      <h4 class="uppercase flex-grow-1 m-0"> <img src="img/iconos/icono_tus_metricas.svg" alt="Metricas" class="img_icons"> Tus metricas</h4>
                      <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3 active" href="#">Entrada</a>
                      <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3" href="#">Proceso</a>
                      <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3" href="#">Salida</a>
                    </div>
                    <canvas id="myChart" class="bg-color grafica" height="400"></canvas>
                    </div>
                    <div class="row">
                        <div class="col-4 my-3">
                            <div class="box-shadow">
                              <h4 class="uppercase"><img src="img/iconos/icono_personas_capacitadas.svg" alt="" class="img_icons"> Personas capacitadas</h4>
                              <div class="p_capacitadas d-flex justify-content-center ml-5">
                                <span id="personas_capacitadas_relacion" class="flex-fill">0/0</span>
                                <div class="n_personas flex-fill p-2">
                                    
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-4 my-3">
                            <div class="box-shadow">
                              <h4 class="uppercase"><img src="img/iconos/icono_presupuesto_usado.svg" alt="" class="img_icons"> Has gastado</h4>
                              <div class="d-flex flex-column ml-5">
                                <span id="presupuesto_usado" class="icon_pesos">0</span>
                                <span class="total">de <em id="total_presupuesto_usado" >$0</em></span>
                              </div>
                            </div>
                        </div>
                        <div class="col-4 my-3 ">
                            <div class="box-shadow d-flex flex-column">
                              <h4 class="uppercase"><img src="img/iconos/icono_valor_actual_neto.svg" alt="" class="img_icons"> Tu portafolio vale</h4>
                              <span id="valor_actual_neto" class="ml-5 icon_pesos">0</span>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-2 d-flex flex-column align-items-center ">
                    <div class="dias my-3 box-shadow">
                        <h4 class="uppercase"> <img src="img/iconos/icono_dias_activo.svg" alt="Dias activos" class="img_icons"> Días activos</h4>
                        <span id="dias_activos">0</span>
                        <p class="Text-Center">Días</p>
                    </div>
                    <div class="info_dias p-3 my-3 box-shadow">
                        <h5>Descarga tu reporte automático</h5>
                        <p>Olvídate de las largas horas realizando reportes. Descarga el tuyo haciendo clic en el botón de abajo</p>
                        <img src="img/iconos/ilustracion_reporte_auto.svg" alt="Persona">
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