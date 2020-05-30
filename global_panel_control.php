<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body class="global-view panel_control">
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
                <div class="flex-fill my-3 mr-3" style="max-width:691px;">
                    <div class="info_general d-flex flex-row justify-content-between align-items-center">
                        <div class="nombre">
                            <h2>Hola, <?php echo $_SESSION['name_post'];?></h2>
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
                <div class="flex-fill row">
                  <div class="col-6 my-3">
                    <div class="escalamiento box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-around align-items-center">
                      <img src="img/iconos/EscalamientoPromedio.svg" alt="escalamiento">
                      <div class="texto_escalamiento">
                        <h4 class="uppercase  mb-2">Proyectos Existosos</h4>
                        <div class="valores_escalamiento d-flex flex-row align-items-center">
                          <span id="escalamiento">
                            <div class="value">0%</div>
                            <div>Proyectos</div>
                          </span>
                          <p>
                            <strong>+0%</strong>
                            que el mes anterior
                          </p>
                        </div>
                      </div>
                      <div class="icono_info">
                        <a href="#">
                          <img src="img/iconos/icono-informacion.svg" alt="">
                        </a>
                      </div>
                      <div class="icono_mas">
                        <a href="#">
                          <img src="img/iconos/flecha_derecha.svg" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 my-3">
                    <div class="conversion box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-around align-items-center">
                      <img src="img/iconos/tasadeconversion.svg" alt="conversion">
                      <div class="texto_escalamiento">
                        <h4 class="uppercase mb-2">Lanzados al mercado</h4>
                        <div class="valores_conversion d-flex flex-row align-items-center">
                          <span id="tasa_conversion">
                            <div class="value">0</div>
                            <div>Proyectos</div>
                          </span>
                          <p>
                            <strong>+0%</strong>
                            que el mes anterior
                          </p>
                        </div>
                      </div>
                      <div class="icono_info">
                        <a href="#">
                          <img src="img/iconos/icono-informacion.svg" alt="">
                        </a>
                      </div>
                      <div class="icono_mas">
                        <a href="#">
                          <img src="img/iconos/flecha_derecha.svg" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row graficas align-items-start">
                <div class="col-10">
                    <div class="box-shadow my-3">
                    <div class="bg-color d-flex align-items-center ">
                      <h4 class="uppercase flex-grow-1 m-0"> <img src="img/iconos/icono_tus_metricas.svg" alt="Metricas" class="img_icons"> Tus métricas</h4>
                      <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3 active" href="#">Entrada</a>
                      <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3" href="#">Proceso</a>
                      <a class="change_graph uppercase btn btn-custom btn-on-bg mx-3" href="#">Salida</a>
                    </div>
                    <canvas id="myChart" class="bg-color grafica" height="400"></canvas>
                    </div>
                    <div class="row">
                        <div class="col-4 my-4">
                            <div class="box-shadow">
                              <h4 class="uppercase"><img src="img/iconos/icono_personas_capacitadas.svg" alt="" class="img_icons"> Personas capacitadas</h4>
                              <div class="p_capacitadas d-flex justify-content-center ml-5">
                                <span id="personas_capacitadas_relacion" class="flex-fill">0/0</span>
                                <div class="n_personas flex-fill py-2 px-4">
                                    
                                </div>
                              </div>
                              <div class="icono_info">
                                <a href="#">
                                  <img src="img/iconos/icono-informacion.svg" alt="">
                                </a>
                              </div>
                              <div class="icono_mas">
                                <a href="#">
                                  <img src="img/iconos/flecha_derecha.svg" alt="">
                                </a>
                              </div>
                            </div>
                        </div>
                        <div class="col-4 my-4">
                            <div class="box-shadow">
                              <h4 class="uppercase"><img src="img/iconos/icono_presupuesto_usado.svg" alt="" class="img_icons"> Has gastado</h4>
                              <div class="d-flex flex-column ml-5">
                                <span id="presupuesto_usado" class="icon_pesos">0</span>
                                <span class="total">de <em id="total_presupuesto_usado" >$0</em></span>
                              </div>
                              <div class="icono_info">
                                <a href="#">
                                  <img src="img/iconos/icono-informacion.svg" alt="">
                                </a>
                              </div>
                            </div>
                        </div>
                        <div class="col-4 my-4 ">
                            <div class="box-shadow d-flex flex-column">
                              <h4 class="uppercase"><img src="img/iconos/icono_valor_actual_neto.svg" alt="" class="img_icons"> Tu portafolio vale</h4>
                              <span id="valor_actual_neto" class="ml-5 icon_pesos">0</span>
                              <div class="icono_info">
                                <a href="#">
                                  <img src="img/iconos/icono-informacion.svg" alt="">
                                </a>
                              </div>
                              <div class="icono_mas">
                                <a href="#">
                                  <img src="img/iconos/flecha_derecha.svg" alt="">
                                </a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-2 d-flex flex-column align-items-center ">
                    <div class="dias mt-3 pb-1 box-shadow">
                        <h4 class="uppercase"> <img src="img/iconos/icono_dias_activo.svg" alt="Dias activos" class="img_icons"> Días activos</h4>
                        <span id="dias_activos">0</span>
                        <p class="Text-Center">Días</p>
                        <div class="icono_mas">
                          <a href="#">
                            <img src="img/iconos/flecha_derecha.svg" alt="">
                          </a>
                        </div>
                    </div>
                    <div class="info_dias p-0 my-3 box-shadow">
                        <h5 class="px-4">Descarga tu reporte automático</h5>
                        <p class="px-4">Olvídate de las largas horas realizando reportes. Descarga el tuyo haciendo clic en el botón de abajo <img class="m-0 p-0" style="width: 12px;filter: brightness(0) invert(1);display: inline;" src="img/iconos/boton_descarga.svg" alt=""></p>
                        <img src="img/iconos/ilustracion_reporte_auto.svg" alt="Persona">
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-flotante" data-toggle="modal" data-target="#exampleModal">
          <img src="img/iconos/boton_reporte.svg" alt="Descargar Reporte">
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100 mt-3" id="exampleModalLabel"><img src="img/iconos/boton_descarga.svg" alt=""> Generar reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body my-3">
        <p class="text-center subtitle-form" style="width: 420px;">Selecciona los ítems que quieres incluir en este reporte.</p>
        <form action="#" class="form_download m-4">
        <div class="row">
          <div class="col-6">
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">
                Fecha
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck2">
              <label class="custom-control-label" for="customCheck2">
                Desempeño
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck3">
              <label class="custom-control-label" for="customCheck3">
                Productividad
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck4">
              <label class="custom-control-label" for="customCheck4">
                Calidad
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck5">
              <label class="custom-control-label" for="customCheck5">
                Alcance
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
          </div>
          <div class="col-6">
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck6">
              <label class="custom-control-label" for="customCheck6">
                Ejecución
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck7">
              <label class="custom-control-label" for="customCheck7">
                Categorías
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck8">
              <label class="custom-control-label" for="customCheck8">
                Presupuesto actual
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
            <div class="custom-control custom-checkbox my-3">
              <input type="checkbox" class="custom-control-input" id="customCheck9">
              <label class="custom-control-label" for="customCheck9">
                Coste
                <div class="icono_info popup">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </label>
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer mx-5 mb-4">
        <input class="Boton-a-Principal-Sin-Fondo inline" type="button" data-dismiss="modal" value="Cerrar">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <input class="Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" type="button" name="Boton-Continuar" value="Descargar">
      </div>
    </div>
  </div>
</div>

    
<?php
include("footer.php");
?>