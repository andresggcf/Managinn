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
        <h2 class="Titulo Text-Center Blanco"
        style = "margin-bottom: 50px">¿Qué rol desempeñas?</h2>

        <form action="con_informacion_rol.php" method = "post">

          <div class = "radio-toolbar">
            
              <input type="radio" id="Director" name="role_post" value="Director">
              <label for="Director">Director</label>

              <input type="radio" id="Facilitador" name="role_post" value="Facilitador">
              <label for="Facilitador">Facilitador</label>

              <input type="radio" id="Colaborador" name="role_post" value="Colaborador">
              <label for="Colaborador">Colaborador</label>
            
          </div>
          <div style="width: 400px; margin-left: 90px"> 
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
          </div> 
        </form>
      </div>

     

    </div>
  </div>

<?php	include("footer.php");?>