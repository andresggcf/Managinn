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
      <div class = "Modal-1">
        <h2 class="Titulo Text-Center">¡Hola! Déjanos conocerte</h2>
        <p style = "margin-bottom: 50px" class="Subtitulo Text-Center">Cuéntanos sobre ti y tu trabajo.</p>

        <form action="con_informacion.php" method = "post">

          <div class="Modal-Centro">

            <div style = "position: relative;">
              <input class = "Form-Field" 
              name="name_post"
              placeholder="" 
              type="text"
              required/>
              <label class="Label-Form Label-Blanco">¿Cómo te llamas?</label>
            </div>

            <div style = "position: relative;">
              <input class = "Form-Field"  
              name="company_post"
              placeholder= "" 
              type="text"
              required/>
              <label class="Label-Form Label-Blanco">Nombre de la compañía</label> 
            </div>

            <div>
              <input class = "Boton-Submit-Pequeño Submit-Principal Derecha" 
              name = "Boton-Siguiente" 
              type="submit"
              value="Siguiente"/> 
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

<?php	include("footer.php");?>

