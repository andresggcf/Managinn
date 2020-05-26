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
          <a class="Icono-Menu-Perfil "  href = "global.php">
            <img src="./img/iconos/icono_global.svg" alt="Global">
          </a>
          <a class="Icono-Menu-Perfil" href = "personas.php">
            <img src="./img/iconos/icono_personas.svg" alt="Personas">
          </a>
          <a class="Icono-Menu-Perfil current" href = "presupuesto.php">
            <img class="current-Icono" src="./img/iconos/icono_presupuesto.svg" alt="Presupuesto">
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
                          <div class="d-flex flex-column">
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
                    <div class="box-shadow mb-3">
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
                    <canvas id="chartPresupuesto" class="bg-color grafica" height="300"></canvas>
                    </div>
                    
                </div> 
            </div>
            <div class="row">
              <div class="col-3 my-3">
                <div class="row">
                  <div class="col-12 mb-4">
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
                  <div class="evaluacion_innovacion box-shadow">
                    <h4 class="uppercase"><img src="img/iconos/evaluacion.svg" alt="" class="img_icons"> Evaluación de innovación</h4>
                    <div class="row">
                      <div class="col-xl-3 col-lg-4">
                        <div class="metricas d-flex flex-column justify-content-around px-2 py-5">
                          <span>0/10</span>
                          <h5>métricas de entrada </h5>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-4">
                        <div class="metricas d-flex flex-column justify-content-around px-2 py-5">
                          <span>0/10</span>
                          <h5>métricas de entrada </h5>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-4">
                        <div class="metricas d-flex flex-column justify-content-around px-2 py-5">
                          <span>0/10</span>
                          <h5>métricas de entrada </h5>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-4">
                        <div class="metricas resultado px-2 py-5">
                          <p>Tu sistema <br>de innovación está en : </p>
                          <span>0/10</span>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-4 my-3 ">
                  <div class="box-shadow d-flex flex-column calidad_presupuesto">
                    <h4 class="uppercase"><img src="img/iconos/calidad.svg" alt="" class="img_icons"> Calidad</h4>
                    <div class="row align-items-center h-100">
                      <div class="col-xl-6 col-lg-6 col-md-12 d-flex flex-column align-items-center border-right border-dark my-3">
                        <span class="calidad_relacion mb-2">0/10</span>
                        <h5>Proyectos</h5>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 d-flex flex-column align-items-center my-3">
                        <span class="calidad_relacion mb-2">0/10</span>
                        <h5>Proyectos</h5>
                      </div>
                      <div class="col-12 d-flex justify-content-around">
                        <span>Valoracion Promedio: </span>
                        <span>0</span>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="btn-flotante"  data-toggle="modal" data-target="#modalPresupuesto">
          <img src="img/iconos/boton_reporte.svg" alt="Descargar Reporte">
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalPresupuesto" tabindex="-1" role="dialog" aria-labelledby="modalPresupuestoLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100 mt-3" id="modalPresupuestoLabel"><img src="img/iconos/categoria_presupuesto.png" alt=""> Categorías</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body my-3">
        <p class="text-center subtitle-form" style="width: 620px;">Distribuye tu presupuesto total en las categorías que seleccionaste anteriormente.</p>
        <div class="row">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-xl-2 col-lg-12">
                <span id="asignado">Asignado</span>
              </div>
              <div class="col-xl-2 col-lg-12">
                <span id="disponible">Disponible</span>
              </div>
              <div class="col-xl-2 col-lg-12">
                <span id="no_disponible">No disponible</span>
              </div>
            </div>
          </div>
        </div>
        <form action="#" class="form_download m-5">
        <div class="row justify-content-center slider_presupuesto">
          <div class="col-3 justify-content-start d-flex align-items-center">
            <img src="img/iconos/capacitaciones.svg" alt="">
            <span class="titulo_valores">Capacitaciones</span>
          </div>
          <div class="col-9">
            <div class="form-group capacitaciones_presupuesto d-flex flex-row align-items-center">
              <span class="min_valor">$0</span><input id="exCapacitaciones" data-slider-handle="custom" type="text"/><span class="max_valor">$1000000000</span>
            </div>
          </div>
          <div class="col-3 justify-content-start d-flex align-items-center">
            <img src="img/iconos/papeleria.svg" alt="">
            <span class="titulo_valores">Papeleria</span>
          </div>
          <div class="col-9">
            <div class="form-group papeleria_presupuesto d-flex flex-row align-items-center">
              <span class="min_valor">$0</span><input id="exPapeleria" data-slider-handle="custom" type="text"/><span class="max_valor">$1000000000</span>
            </div>
          </div>
          <div class="col-3 justify-content-start d-flex align-items-center">
            <img src="img/iconos/infraestructura.svg" alt="">
            <span class="titulo_valores">Infraestructura</span>
          </div>
          <div class="col-9">
            <div class="form-group infraestructura_presupuesto d-flex flex-row align-items-center">
              <span class="min_valor">$0</span><input id="exInfraestructura" data-slider-handle="custom" type="text"/><span class="max_valor">$1000000000</span>
            </div>
          </div>
          <div class="col-3 justify-content-start d-flex align-items-center">
            <img src="img/iconos/categorias_presupeusto.png" alt="">
            <span class="titulo_valores">Otros</span>
          </div>
          <div class="col-9">
            <div class="form-group otros_presupuesto d-flex flex-row align-items-center">
              <span class="min_valor">$0</span><input id="exOtros" data-slider-handle="custom" type="text"/><span class="max_valor">$1000000000</span>
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer mx-5 mb-4">
        <input class="Boton-a-Principal-Sin-Fondo inline" type="button" data-dismiss="modal" value="Cerrar">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <input class="Boton-a-Principal-Fondo-Blanco Boton-Creacion-Proyecto" type="button" name="Boton-Continuar" value="Ingresar">
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" 
    id="Modal-Export-Presupuesto" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="exampleModalLabel" 
    aria-hidden="true">
    
    <div class="modal-dialog" role="document" style="max-width:530px !important">
      <div class="modal-content" style="height: 500px; max-width:530px">
        <div class="modal-header" 
          style = "padding-bottom: 20px !important;padding-left: 110px !important;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div style="
            margin-bottom: 10px;
            margin-top: -25px; 
            height:35px;">
              <img src="img/iconos/Icono-Export.png" style="margin-left: 80px;width:30px;float:left;margin-right: 20px;">
              <h5
                style="color:#eb5757; font-size: 20pt; float: left;">Generar Reporte</h5>
          </div>
          <p>Selecciona los ítems que quieres (REEMPLAZAR CON NUEVO MODAL) <br>incluir en este reporte.</p>
        </div>
        <form class="form-export-global" action="con_pdf_presupuesto.php" method = "post">
          <div class="modal-body">
            <div class="row" style="margin-top:10px">

              <div class="column" style=" width:50%; padding-left: 20px; height:200px">

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="fecha_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Fecha</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="desempeno_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Personas</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="productividad_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Productividad</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="calidad_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Calidad</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="alcance_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Alcance</label>
                </div>
              </div>

              <div class="column" style="height:200px; width:50%; padding-left: 20px">

              <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="ejecucion_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Ejecución</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="categorias_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Categorías</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="presupuesto_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Presupuesto actual</label>
                </div>

                <div class="form-check" style="text-align: left; margin-bottom: 10px">
                  <input type="checkbox" class="form-check-input" id="fechaCheck"
                   style="width: 20px !important;
                      height: 20px !important;
                      background: #F6F7F9 !important;
                      box-shadow: inset 2px 2px 5px rgba(55, 84, 170, 0.25), 
                        inset -2px -2px 5px #FFFFFF !important;
                      border-radius: 6px !important;"
                    name="coste_post">
                  <label 
                    class="form-check-label" 
                    for="fechaCheck"
                    style="font-weight: 700; font-size: 16pt; margin-left: 15px;">Coste</label>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer" style="border-top: none; justify-content: center;">
            <div>
              <a class = "btn btn-custom btn-large Boton-a-Principal-Sin-Fondo" 
                      name = "Boton-Proyecto" 
                      id = "Boton-Omitir-Preferencias"
                      href="presupuesto.php"
                      style = "max-width: 180px"
                      data-dismiss="modal"
                      >Cancelar</a>
            </div>
            <div>
              <button class = "Boton-a-Principal-Fondo-Blanco" 
                      name = "Boton-PDF" 
                      id = "Boton-Generar-PDF"
                      style = "max-width: 190px"
                      type="submit" 
                      >Generar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



    
<?php
include("footer.php");
?>