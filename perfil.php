<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  include("header.php");
  ?>

<body>
  <div class="NavBar">
    <div class="Contenedor-Menu">
      <img src="img/iconos/managinn.png" width="180px" alt="" class="">
      <nav role="navigation" class="Navegador">
        <a class="Boton-Delinieado-Menu Derecha" href = "index.php?logout='1'">Cerrar Sesión</a>
      </nav>
    </div>
  </div>

  <div class="RegDatos-Fondo"> 
    <div class="Caja-Texto">
      <h5>Hola <strong> <?php echo $_SESSION['name_post'];?></strong>!</h5>
      <h5>Este es tu correo: <strong> <?php echo $_SESSION['email_post'];?></strong></h5>
      <h5>y tienes este rol:  <strong> <?php echo $_SESSION['role_post'];?></strong>.</h5>
    </div>
  </div>


<?php
  include("footer.php");
?>