<?php

/*conectar la base de datos de mySQL con la siguiente funcion
parametros: servidor, usuario, clave, base de datos*/
  //include("conexion.php");
  include("header.php");
?>

<body>
  <div class="Pc-Screen">
    <!-- Menu -->
    <div class="NavBar">
      <div class="Contenedor-Menu">
        <a href="index.php">
          <img src="img/iconos/managinn.png" width="180px" alt="" class="">
        </a>
        <nav role="navigation" class="Navegador">
          <a href="inicio.php" class="Boton-Inverso-Menu">Iniciar sesión</a>
          <a href="registro.php" class="Boton-Delinieado-Menu">Regístrate</a>
        </nav>
      </div>
    </div>

    <!-- Ventana inicio -->
    <div class="App" >
      <div class = "Contenedor-Inicio">
        <h1 class="Text-Left Texto-Grande">El espacio de trabajo para administrar 
            tu sistema de innovación</h1>
        <h3 class="Text-Left Texto-Mediano">Fácil, rápido y confiable</h3>
      </div>
      <a class="Boton-Principal" href="registro.php">Prueba gratis</a>
    </div>
  </div>


  <div class ="Other-Screen">
    <div class="App" style="">
      <div class = "Contenedor-Inicio">
        <h1>Agranda la ventana del navegador o cámbiate a un computador!</h3>
        <img src="img/iconos/managinn.png" style="padding-top: 30px" class="image home">
      </div>
    </div>
  </div>

	<script type="text/javascript">
	function clic_bienvenida(){
	  document.location.href='encuesta.php';
	}
	</script>

<?php	include("footer.php");?>