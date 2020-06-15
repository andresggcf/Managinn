<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  require 'conexion.php';

  $queryInduccion = "SELECT * FROM data_presupuesto WHERE director = $usuario_id";
  $resultado = mysqli_query($db, $queryInduccion);
  $arreglo= mysqli_fetch_array($resultado);

  include("header.php");
  ?>

<body class="global-view panel_control presupuesto" style="padding-top: 3px;">
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

  <div class = "Columna-Perfil d-flex flex-column" style="position: fixed">
    <div class="icon_home" style="margin-bottom: 120px">
      <img src="img/iconos/inn.svg" width="180px" alt="" class="">
    </div>
    <div class = "Elementos-Perfil">
      <div class = "Botones-Perfil">
        <a class="Icono-Menu-Perfil" href = "perfil.php">
          <img src="./img/iconos/icono_proyectos.svg" alt="Dashboard">
        </a>
        <a class="Icono-Menu-Perfil"  href = "global.php">
          <img src="./img/iconos/icono_global.svg" alt="Global">
        </a>
        <a class="Icono-Menu-Perfil " href = "personas.php">
          <img src="./img/iconos/icono_personas.svg" alt="Personas">
        </a>
        <a class="Icono-Menu-Perfil current" href = "presupuesto.php">
          <img class="current-Icono" src="./img/iconos/icono_presupuesto.svg" alt="Presupuesto">
        </a>
      </div>

      <div class = "Usuario-Perfil" style="margin-top: 110px"> 
        <img src = "./img/iconos/Icono-Perfil.png" alt="Icono" 
          height="45px"
          style = "border-radius: 5px; float: left; margin-right: 10px;">

        <div class = "Perfil-Dropdown-Container" style = "float: right;">
          <div class="btn-group dropright ">
            <button type="button" class="btn btn-secondary dropdown-toggle Boton-Dropdown" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

  <div class="contenedor_dashboard" style="padding-bottom: 20px;">
    <div class="container-fluid" style="padding-left: 40px; padding-right: 40px">
      <div class="row kpi">
        <div class="col-5 my-3" style="padding-left: 0px;">
          <div class="info_general px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center h-100">
            <div class="nombre">
              <h2>Hola, <?php echo $_SESSION['name_post'];?></h2>
              <p>Este es el presupuesto del sistema de innovación en:</p> 
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
              <h4 class="uppercase"><img src="img/iconos/presupuesto_total.svg" alt="" class="img_icons" width="30px"> Presupuesto Total</h4>
              <div class="d-flex flex-column">
                <h1 id="presupuesto_usado-borrar" class="icon_pesos" style="font-size: 30pt">  
                  <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?>
                </h1>
                <h4 class="total" style="margin-left: 40px !important; font-weight:300">de <em id="total_presupuesto_usado.borrar" >$
                  <?php echo number_format($arreglo['presupuesto_gen'], 0, ',', '.');?>
                </em>
                <em><span class="badge badge-pill badge-azul">
                  <?php echo $arreglo['periodo']?>
                </span></em> </h4>
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

        <div class="col-4 my-3" style="padding-right: 0px;">
          <div class="conversion box-shadow px-0 pb-0 pt-2 d-flex flex-row justify-content-around align-items-center">
            <div class="texto_escalamiento">
              <h4  class="uppercase"><img src="img/iconos/icono_dias_activo.svg" alt="" class="img_icons">Estado del presupuesto</h4>
              <div class="valores_conversion" style="margin-top: 25px; margin-bottom: 15px">
                
                <div class="progress" style="background-color: rgba(23, 174, 191, 0.2); 
                width: 100%; 
                height: 30px;
                margin-top: 30px;
                margin-bottom: 10px;
                position: relative;">
                  <div class="progress-bar" role="progressbar" style="width: 50%; height: 30px; position: absolute;
                    background-color: #17AEBF !important" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><!--programado-->
                  </div>
                  <div class="progress-bar" role="progressbar" style="width: 40%; height: 30px; position: absolute;
                    background-color: #30CF5D !important" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><!--gastado-->
                </div>



              </div>
              <div class="row">
                <div class="col-5" style="height: 30px; padding-left: 35px">
                  <div style="width: 15px; 
                      height: 15px; 
                      border-radius: 30px; 
                      margin-top: 7px; 
                      background-color: #30CF5D;
                      float: left;"></div>
                  <p style="color: #30CF5D;
                      margin: 3px 0 0 15px; font-size: 12pt
                      ">Gasto total:  <span
                      style="font-weight: 900; font-size: 12pt; color: #30CF5D">40% </span> </p>
                </div>
                <div class="col-6" style="height: 30px;">
                  <div style="width: 15px; 
                      height: 15px; 
                      border-radius: 30px; 
                      margin-top: 7px; 
                      background-color: #17AEBF;
                      float: left;"></div>
                  <p style="color: #17AEBF;
                      margin: 3px 0 0 15px; font-size: 12pt
                      ">Gasto programado:  <span
                      style="font-weight: 900; font-size: 12pt; color: #17AEBF">50% </span> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- row 1 -->

      <div class="row graficas">
        <div class="col-5 my-3" style="padding-left: 0px;">
          <div class="box-shadow">
            <h4 class="uppercase"><img src="img/iconos/categorias_presupeusto.png" alt="Metricas" class="img_icons">Categorias</h4>
            <div class="row pt-4 categorias_presupuesto">
              <?php
              if($arreglo['papeleria'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/papeleria.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Papeleria</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <?php
              if($arreglo['capacitaciones'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/capacitaciones_cat.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Capacitaciones</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <?php
              if($arreglo['infraestructura'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/infraestructura.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Infraestructura</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <?php
              if($arreglo['salario'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/salarios.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Salario</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <?php
              if($arreglo['licencias'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/licencia.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Licencias</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <?php
              if($arreglo['mobiliario'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/mobiliario.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Mobiliario</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <?php
              if($arreglo['experimentacion'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/experimentacion.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Experimentación</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <?php
              if($arreglo['materiales'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/materiales.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Materiales</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <?php
              if($arreglo['desarrollo'] == 'on')
              {
              ?>
                <div class="col-lg-6 col-xl-3" style="margin-bottom: 15px;">
                  <a href="#" class="bg-blue categoria px-4 pt-4 pb-2 box-shadow d-flex flex-column justify-content-center" style="box-shadow: none;">
                    <img class="mt-auto" src="img/iconos/desarrollo.svg" alt="capacitaciones">
                    <p class="text-center mt-auto mb-0">Desarrollo</p>
                  </a>
                  <div class="icono_mas">
                    <a href="#">
                      <img src="img/iconos/flecha_derecha.svg" alt="">
                    </a>
                  </div>
                </div>
              <?php
              }
              ?>

              <div class="col-lg-6 col-xl-3 d-flex" style="margin-bottom: 15px;">
                <a class="border-radius d-flex flex-column justify-content-center align-items-center more_cat" href="#">
                  +
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-7 my-3" style="padding-right: 0px">
          <div class="box-shadow mb-3" style=" padding-bottom: 0px;">
            <div class="row" style="margin-left: 0px;margin-right: 0px;">

              <div class="col-4" style="padding-left: 0px;">
                <h4 class="uppercase mr-2"> <img src="img/iconos/mapeo_de_gastos.svg" alt="Metricas" class="img_icons"
                  style="margin-left: 0px;"> Mapeo de gastos</h4>
              </div>

              <div class="col-3" style="height: 16px;">
                <select class="form-control mb-2" id="proyectos_convertidos" 
                style="border-bottom: solid 1px; border-radius: 0px; padding-left: 5px" onchange="select(this.value)">
                  <option value="" selected disabled>Selecciona una opcion</option>
                  <?php
                    if($arreglo['papeleria'] == 'on')
                    {
                  ?>
                    <option value="papeleria" >Papeleria</option>
                  <?php
                    }
                  ?>

                  <?php
                    if($arreglo['capacitaciones'] == 'on')
                    {
                  ?>
                    <option value="capacitaciones" >Capacitaciones</option>
                  <?php
                    }
                  ?>

                  <?php
                    if($arreglo['infraestructura'] == 'on')
                    {
                  ?>
                    <option value="infraestructura" >Infraestructura</option>
                  <?php
                    }
                  ?>

                  <?php
                    if($arreglo['salario'] == 'on')
                    {
                  ?>
                    <option value="salario" >Salario</option>
                  <?php
                    }
                  ?>

                  <?php
                    if($arreglo['licencias'] == 'on')
                    {
                  ?>
                    <option value="licencias" >Licencias</option>
                  <?php
                    }
                  ?>

                  <?php
                    if($arreglo['mobiliario'] == 'on')
                    {
                  ?>
                    <option value="mobiliario" >Mobiliario</option>
                  <?php
                    }
                  ?>

                  <?php
                    if($arreglo['experimentacion'] == 'on')
                    {
                  ?>
                    <option value="experimentacion" >Experimentación</option>
                  <?php
                    }
                  ?>

                  <?php
                    if($arreglo['materiales'] == 'on')
                    {
                  ?>
                    <option value="materiales" >Materiales</option>
                  <?php
                    }
                  ?>

                  <?php
                    if($arreglo['desarrollo'] == 'on')
                    {
                  ?>
                    <option value="desarrollo" >Desarrollo</option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="col-5">
                <div class="containter-estados row" style= "margin: 0">
                  <div class="col-sm-7">
                    <div style="width: 20px; 
                      height: 20px; 
                      border-radius: 30px; 
                      margin-top: 5px; 
                      background-color: #17AEBF;
                      float: left;"></div>
                    <p style="color: #17AEBF;
                      margin: 3px 0 0 25px;
                      font-size: 11pt;
                      margin-top: 4px;
                      
                      ">Gasto programado</p>
                  </div>
                  <div class="col-sm-5">
                    <div style="width: 20px; 
                      height: 20px; 
                      border-radius: 30px;
                      margin-top: 5px; 
                      background-color: #eb5757;
                      float: left;"></div>
                    <p style="color: #eb5757;
                      margin: 3px 0 0 25px;">Gasto real</p>
                  </div>
                </div>
              </div>
              <div style="width:100%; height: 100%; margin-top: 0px; position: relative">
                <canvas id="chartPresupuesto" class="bg-color grafica" style="width: 50%; height: 100%"></canvas>
              </div>
              
                <div class="icono_info">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </div>
            </div>  
          </div>

          <div class="row">
            <div class="col-3 mt-3">
              <div class="row">
                <div class="col-12 mb-4">
                  <div class="box-shadow">
                    <h4 class="uppercase"><img src="img/iconos/alcance.svg" alt="" class="img_icons"> Alcance</h4>
                    <div class="valores_escalamiento d-flex flex-row py-2" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                      <span id="escalamiento">
                          0%
                      </span>
                      <p>
                        <strong>+0%</strong>
                        que el mes anterior
                      </p>
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
                <div class="col-12">
                  <div class="box-shadow">
                    <h4 class="uppercase"><img src="img/iconos/coste.svg" alt="" class="img_icons"> Coste</h4>
                    <div class="valores_escalamiento d-flex flex-row py-2" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                      <span id="escalamiento">
                        0%
                      </span>
                      <p>
                        <strong>+0%</strong>
                        que el mes anterior
                      </p>
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

            <div class="col-6 mt-3">
              <div class="evaluacion_innovacion box-shadow d-flex flex-column">
                <h4 class="uppercase"><img src="img/iconos/evaluacion.svg" alt="" class="img_icons"> Evaluación de innovación</h4>
                <div class="row h-100 my-3">
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
                <div class="icono_info">
                  <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                  </a>
                </div>
              </div>
            </div>
            <div class="col-3 mt-3 ">
              <div class="box-shadow d-flex flex-column calidad_presupuesto">
                <h4 class="uppercase"><img src="img/iconos/calidad.svg" alt="" class="img_icons"> Calidad</h4>
                <div class="row align-items-center h-100" style="padding-top: 20px;">
                  <div class="col-xl-6 col-lg-6 col-md-12 d-flex flex-column align-items-center border-right border-dark my-3">
                    <span class="calidad_relacion mb-2">0/ 10</span>
                    <h5>Proyectos</h5>
                  </div>
                <div class="col-xl-6 col-lg-6 col-md-12 d-flex flex-column align-items-center my-3">
                    <span class="calidad_relacion mb-2">0/ 10</span>                    <h5>Equipos</h5>
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <span>Valoracion Promedio</span>
                </div>
              </div>
              <div class="icono_info">
                <a href="#">
                    <img src="img/iconos/icono-informacion.svg" alt="">
                </a>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="btn-flotante"  data-toggle="modal" data-target="#modalPresupuesto">
      <img src="img/iconos/boton_reporte.svg" alt="Descargar Reporte">
    </div>
  </div>


<div class="modal fade" 
id="modalPresupuesto" 
tabindex="-1" role="dialog" 
aria-labelledby="modalPresupuestoLabel" 
aria-hidden="true">
  <div class="modal-dialog  modal-xl" role="document" style="width: 1100px !important; max-width: 1100px !important">
    <div class="modal-content" style="width: 1100px">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPresupuestoLabel">
          <img src="img/iconos/categoria_presupuesto.png" alt=""> Categorías
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p class="text-center subtitle-form" style="width: 550px; font-size: 14pt">Distribuye tu presupuesto total en las categorías que seleccionaste anteriormente.</p>
        <div class="row">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-xl-2 col-lg-12">
                <span id="asignado">Asignado</span>
              </div>
              <div class="col-xl-2 col-lg-12">
                <span id="disponible">Disponible</span>
              </div>
              <div style="margin-left: 40px;">
                <span id="no_disponible">No disponible</span>
              </div>
            </div>
          </div>
        </div>

        <form action="#" class="form_download m-5">
          <div class="row justify-content-center slider_presupuesto">

            <?php
              if($arreglo['capacitaciones'] == 'on')
              {
            ?>
            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/capacitaciones.svg" alt="">
              <span class="titulo_valores">Capacitaciones</span>
            </div>
            <div class="col-9">
              <div class="form-group capacitaciones_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exCapacitaciones" data-slider-handle="custom" type="text"/><span class="max_valor">$
                  <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?></span>
              </div>
            </div>
            <?php
              }
            ?>

            <?php
              if($arreglo['papeleria'] == 'on')
              {
            ?>
            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/papeleria.svg" alt="">
              <span class="titulo_valores">Papeleria</span>
            </div>
            <div class="col-9">
              <div class="form-group papeleria_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exPapeleria" data-slider-handle="custom" type="text"/><span class="max_valor">$
                <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?>
                </span>
              </div>
            </div>
            <?php
              }
            ?>

            <?php
              if($arreglo['infraestructura'] == 'on')
              {
            ?>

            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/infraestructura.svg" alt="">
              <span class="titulo_valores">Infraestructura</span>
            </div>
            <div class="col-9">
              <div class="form-group infraestructura_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exInfraestructura" data-slider-handle="custom" type="text"/><span class="max_valor">$
                <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');?>
                </span>
              </div>
            </div>
            <?php
              }
            ?>

            <?php
              if($arreglo['mobiliario'] == 'on')
              {
            ?>
            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/mobiliario.svg" alt="">
              <span class="titulo_valores">Mobiliario</span>
            </div>
            <div class="col-9">
              <div class="form-group mobiliario_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exMobiliario" data-slider-handle="custom" type="text"/><span class="max_valor">$
                  <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?></span>
              </div>
            </div>
            <?php
              }
            ?>

            <?php
              if($arreglo['materiales'] == 'on')
              {
            ?>
            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/materiales.svg" alt="">
              <span class="titulo_valores">Materiales</span>
            </div>
            <div class="col-9">
              <div class="form-group materiales_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exMateriales" data-slider-handle="custom" type="text"/><span class="max_valor">$
                <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?>
                </span>
              </div>
            </div>
            <?php
              }
            ?>

            <?php
              if($arreglo['desarrollo'] == 'on')
              {
            ?>
            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/desarrollo.svg" alt="">
              <span class="titulo_valores">Desarrollo</span>
            </div>
            <div class="col-9">
              <div class="form-group desarrollo_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exDesarrollo" data-slider-handle="custom" type="text"/><span class="max_valor">$
                <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?>
                </span>
              </div>
            </div>
            <?php
              }
            ?>

            <?php
              if($arreglo['salario'] == 'on')
              {
            ?>
            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/salarios.svg" alt="">
              <span class="titulo_valores">Salarios</span>
            </div>
            <div class="col-9">
              <div class="form-group salarios_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exSalarios" data-slider-handle="custom" type="text"/><span class="max_valor">$
                <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?>
                </span>
              </div>
            </div>
            <?php
              }
            ?>


            <?php
              if($arreglo['licencias'] == 'on')
              {
            ?>
            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/licencia.svg" alt="">
              <span class="titulo_valores">Licencias</span>
            </div>
            <div class="col-9">
              <div class="form-group licencias_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exLicencias" data-slider-handle="custom" type="text"/><span class="max_valor">$
                <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?>
                </span>
              </div>
            </div>
            <?php
              }
            ?>

            <?php
              if($arreglo['experimentacion'] == 'on')
              {
            ?>
            <div class="col-3 justify-content-start d-flex align-items-center">
              <img src="img/iconos/experimentacion.svg" alt="">
              <span class="titulo_valores">Experimentación</span>
            </div>
            <div class="col-9">
              <div class="form-group experimentacion_presupuesto d-flex flex-row align-items-center">
                <span class="min_valor">$0</span><input id="exExperimentacion" data-slider-handle="custom" type="text"/><span class="max_valor">$
                <?php echo number_format($arreglo['presupuesto_act'], 0, ',', '.');
                  ?>
                </span>
              </div>
            </div>
            <?php
              }
            ?>

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
                      style = "max-width: 190px;font-size: 12pt;"
                      type="submit" 
                      >Generar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <?php
  include("footer_4.php");
  ?>
  <script type="text/javascript">
    $.noConflict();
    jQuery(document).ready(function ($) {
      $('#Boton-Preferencias').click(function () {
        $('#Crear-Implementacion').css('display', 'block');
        $('#Sin-Metricas').css('display', 'none');
        $('#Dashboard-Global').css('display', 'none');
        $('.Blanco-Fondo').addClass('general_bg');
      })
     
      /**
      * Presupuesto
      */
      $('.datepicker').datepicker({
        language: 'es'
      });
      $('#ex1').slider({
        formatter: function(value) {
          return numeral(value).format('$ 0,0[.]00');
        }
      });
      $("#exCapacitaciones").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 70000000],formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exPapeleria").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exInfraestructura").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exMobiliario").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exMateriales").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exDesarrollo").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exSalarios").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exExperimentacion").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 70000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });
      $("#exLicencias").slider({ id: "slider12c", step: 100000,min: 0, max: <?php echo $arreglo['presupuesto_act'];?>, range: true, value: [1000000, 90000000] ,formatter: function(value) {
        return numeral(value[0]).format('$ 0,0[.]00') + ' / '+numeral(value[1]).format('$ 0,0[.]00');
      } });

    }); // Close JQuery noConflict

    function select(text) {
     console.log('select() ; '+ text);
     if (text == "papeleria")
     {
       list1=[1.2, 1, 3, 5]; //programado
       list2=[2, 0.9, 2, 2]; //real
       loadChart(list1, list2, "papeleria");
     }
     if (text == "capacitaciones")
     {
       list1=[1, 2, 0.5, 0.2];
       list2=[0.5, 5, 1, 0.5];
       loadChart(list1, list2, "capacitaciones");
     }
     if (text == "infraestructura")
     {
       list1=[5, 8, 2, 3.5];
       list2=[6, 5, 2, 3];
       loadChart(list1, list2, "infraestructura");
     }
     if (text == "salario")
     {
       list1=[2, 3, 5, 8];
       list2=[2, 3, 6, 8.5];
       loadChart(list1, list2, "salario");
     }
     if (text == "licencias")
     {
       list1=[4, 2, 0, 2];
       list2=[3.2, 2, 0.5, 1.8];
       loadChart(list1, list2, "licencias");
     }
     if (text == "mobiliario")
     {
       list1=[5, 5, 6.5, 5];
       list2=[5, 4.8, 7, 5.5];
       loadChart(list1, list2, "mobiliario");
     }
     if (text == "experimentacion")
     {
       list1=[0, 0, 3, 7];
       list2=[0, 0, 3.5, 6.8];
       loadChart(list1, list2, "experimentacion");
     }
     if (text == "materiales")
     {
       list1=[6, 3, 7, 3.7];
       list2=[7.5, 4, 6.4, 5];
       loadChart(list1, list2, "materiales");
     }
     if (text == "desarrollo")
     {
       console.log("desarrollo");
       list1=[6, 6, 6.5, 6.2];
       list2=[6, 6, 7, 8];
       loadChart(list1, list2, "desarrollo");
     }
    }
    // Grafica personas
    function loadChart(data, data2, text)
    {
      console.log("loadchart() " + text);
      console.log("loadchart() " + data + " " + data2);
      var ctx3 = document.getElementById('chartPresupuesto');
      var blue_color = "#17AEBF";
      var blue_color_alpha = "#17AEBF7A";
      var red_color = "#EB5757";
      var red_color_alpha= "#EB57577A";

      if (ctx3) {
        var chartPresupuesto = new Chart(ctx3, 
        {
          type: 'line',
          data: 
          {
            labels: ['SEMANA 1', 'SEMANA 2', 'SEMANA 3', 'SEMANA 4'],
            datasets: [
              {
                label:'Gasto Programado',
                data: data,
                borderColor: [blue_color],
                borderWidth: 2,
                barPercentage: 0.5,
                fill:false,
              },
              {
                label:'Gasto Real',
                data: data2,
                borderColor: [red_color],
                borderWidth: 2,
                barPercentage: 0.5,
                fill:false,

              }
            ]
          },
          options: 
          {
            scales: 
            {
              yAxes: 
              [{
                stacked: false,
                ticks: 
                {
                  min: 0,
                  max: 10,
                  stepSize: 1,
                  fontSize:10,
                  fontColor:'#131A40'
                },
                scaleLabel: 
                {
                  display: true,
                  labelString: 'Millones de pesos',
                  fontStyle: 'bold',
                  fontSize:12,
                  fontColor:'#131a40',
                },       
              }],
              xAxes: 
              [{
                stacked: false,
                scaleLabel: 
                {
                  display: true,
                  labelString: 'Semana',
                  fontStyle: 'bold',
                  fontSize:10,
                  fontColor:'#131a40',
                },
                gridLines: 
                {
                  display: false,
                  tickMarkLength: 8
                },
                ticks:
                {
                  fontSize:10,
                  fontColor:'#131a40',
                },
              }]
            },
            legend: 
            {
              display: false
            },
            layout:
            {
              padding: 
              {
                left: 10,
                right: 10,
                top: 10,
                bottom: 10
              }
            }
          }
        });
      }
    }
  </script>
</body>