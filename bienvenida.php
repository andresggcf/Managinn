<?php
session_start();

$nombre = $_SESSION['name_post'];

include("header.php");

?>


<body>
  <div class="NavBar" style="box-shadow: none;">
    <div class="Contenedor-Menu">
      <img src="img/iconos/managinn2.png" width="180px" alt="" class="">
    </div>
  </div>

  <div class="Bienvenida-Fondo">
    <div class="Col-2 Modal-Centro Derecha">

      <h1 class = "Texto-Grande Text-Center">¡Bienvenido, 
        <?php echo $nombre?>!</h1>
      
        <p class = "Parrafo-Bienvenida Text-Center" style="color: white">A continuación, construiremos paso a paso 
          tu sistema de innovación para que puedas gestionarlo en cuanto empiece
          a fluir la información.
        </p>

        <a class = "Boton-Principal Submit-Inverso" href="perfil.php">Empezar</a>
    </div>
  </div>

<?php	include("footer.php");?>