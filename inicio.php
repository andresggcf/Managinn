<?php
  include('conexion.php');
  include("header.php");
?>

<body>
  <!-- Menu -->
  <div class="NavBar">
    <div class="Contenedor-Menu">
      <a href="index.php">
        <img src="img/iconos/managinn.png" width="180px" alt="" class="">
      </a>
    </div>
  </div>

  <div class="Inicio-Fondo">
    <div style="float:right; position:relative; width:500px; margin-right: 50px; height: 100%">
      <div class="Columna-Registro"> 
        <div>
          <button class = "Boton-Google"></button> 
          <p class = "Parrafo-Pequeño Text-Center"
          style = "margin-bottom: 30px">O inicia sesión con tu correo</p>
          <form action="con_inicio.php" method = "post">
            <div>
              <div style = "position: relative;">
                <input class="Form-Field" 
                name="email_post"
                id="email" 
                placeholder="" 
                type="text"
                required/>
                <label class="Label-Form Label-Blanco">Correo Electrónico</label>
              </div>
              <div style = "position: relative;">
                <input class="Form-Field" 
                name="password_post" 
                autocomplete="off"
                id="password" 
                placeholder= "" 
                type="password"
                required/> 
                <label class="Label-Form Label-Blanco">Contraseña</label>
              </div>
              <div>
                <input class = "Boton-Submit Submit-Principal"  
                name="Boton-inicio"
                id="submit" 
                type="submit"
                value="Iniciar sesión"/> 
              </div>
              <p class="Parrafo-Extra-Pequeño Text-Center Blanco">¿No tienes una cuenta? 
                  <a href="registro.php"
                  class = "Enlace-Pequeño-Principal">Registrate Aquí</a>
              </p>
            </div>
          </form>

          <?php
          $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if(strpos($url,"psw=wrong")==true)
          {
            $message = "Clave errada\\nIntenta de nuevo.";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }

          else if (strpos($url,"user=noexiste")==true)
          {
            $message = "Usuario no existe.\\nIntenta de nuevo.";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
          ?>

        </div>
      </div>
    </div>
  </div>

<?php	include("footer.php");?>