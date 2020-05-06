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
      <img src="img/iconos/managinn.png" width="180px" alt="" class="">
    </div>
  </div>

    <div class = "Columna-Perfil">
      <div class = "Elementos-Perfil">
        <div class = "Botones-Perfil">
          <a class="Icono-Menu-Perfil" href = "perfil.php">
            <img src="./img/iconos/Etiqueta-Dashboard.svg" alt="Dashboard" height="25px">
          </a>
          <a class="Icono-Menu-Perfil current" >
            <img class="current-Icono"  src="./img/iconos/Etiqueta-Global.svg" alt="Global" height="25px">
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
                <div class="col-6">
                    <div class="info_general px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center">
                        <div class="nombre">
                            <h2>Hola,<?php echo $_SESSION['name_post'];?></h2>
                            <p>Asi se ve tu sistema de innovación global en:</p> 
                        </div>
                        <div class="mes">
                            <a href="#"><</a>
                            <span>Diciembre</span>
                            <a href="#">></a>
                        </div>
                        <div class="imagen">
                            <img src="img/iconos/ilustracion_saludo.svg" alt="Saludo">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="escalamiento box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center">
                        <img src="img/iconos/EscalamientoPromedio.svg" alt="escalamiento">
                        <div class="texto_escalamiento">
                            <h4>Escalamiento promedio</h4>
                            <span id="escalamiento">
                                0%
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="conversion box-shadow px-2 pb-0 pt-2 d-flex flex-row justify-content-between align-items-center">
                        <img src="img/iconos/tasadeconversion.svg" alt="conversion">
                        <div class="texto_escalamiento">
                            <h4>Tasa de conversión</h4>
                            <span id="tasa_conversion">
                                0
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row graficas">
                <div class="col-10">
                    Tus metricas
                </div> 
                <div class="col-2">
                    <div class="dias">
                        Días activos
                    </div>
                    <div class="info_dias">
                        Descarga tu reporte automatico
                    </div>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <h3>Personas capacitadas</h3>
                            <span>0/0</span>
                            <div class="n_personas">
                                muñequitos
                            </div>
                        </div>
                        <div class="col-4">
                            <h3>Presupuesto usado</h3>
                            <span>0</span>
                            <span class="total">de <em>$0</em></span>
                        </div>
                        <div class="col-4">
                            <h3>Valor actual neto (VAN)</h3>
                            <span>0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
<?php
include("footer.php");
?>