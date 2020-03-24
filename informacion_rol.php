<?php

session_start();

include("header.php");
?>

<body>
  <div class="NavBar">
    <div class="Contenedor-Menu">
      <img src="img/iconos/managinn.png" width="180px" alt="" class="">
    </div>
  </div>

  <div class="RegDatos-Fondo"> 
    <div class="Caja-Texto">
      <div>
        <h2 class="Titulo Text-Center">¿Qué rol desempeñas?</h2>

        <form action="con_informacion_rol.php" method = "post">

          <div>
            <div class = "Izquierda">
              <input type="radio" name="role_post" value="Director"> Director
            </div>

            <div class = "Izquierda">
              <input type="radio" name="role_post" value="Facilitador"> Facilitador
            </div>

            <div class = "Izquierda">
              <input type="radio" name="role_post" value="Colaborador"> Colaborador
            </div>
          </div>

          <div>
            <a class = "Boton-Submit-Pequeño Submit-Simple Izquierda"
            href="javascript:history.go(-1)">Volver</a> 
          </div>

          <div>
            <input class = "Boton-Submit-Pequeño Submit-Principal Derecha" 
            name = "Boton-Finalizar" 
            type="submit"
            value="Finalizar"/> 
          </div>
        </form>
      </div>

     

    </div>
  </div>

<?php	include("footer.php");?>