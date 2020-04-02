<?php
  require "header.php";
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

  <div class="Registro-Fondo">
    <div class="Columna-Registro"> 
      <div>
        <button class = "Boton-Google"></button> 
        <p class = "Parrafo-Pequeño Text-Center">O crea una cuenta</p>
        <form action="con_registro.php" method = "post">
          <div>
            <div style = "position: relative;">
              <input class = "Form-Field" 
              name="email_post"
              placeholder="" 
              type="text"
              required/>
              <label class="Label-Form Label-Blanco">Correo Electrónico</label>
            </div>
            <div style = "position: relative;">
              <input class = "Form-Field"  
              name="password_post"
              placeholder= "" 
              type="password"
              required/> 
              <label class="Label-Form Label-Blanco">Contraseña</label>
            </div>
            <div style = "position: relative;">
              <input class = "Form-Field"  
              name="password_ver_post"
              placeholder= "" 
              type="password"
              required/> 
              <label class="Label-Form Label-Blanco">Verifica contraseña</label>
            </div>
            <div>
              <input class = "Boton-Submit Submit-Principal" 
              name = "Boton-Registro" 
              type="submit"
              value="Registrar"/> 
            </div>
            <p class="Parrafo-Extra-Pequeño Text-Center">¿Ya tienes una cuenta? 
                <a href="inicio.php"
                class = "Enlace-Pequeño-Principal">Inicia Sesión</a>
            </p>
          </div>
        </form>

        <?php
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if(strpos($url,"psw=nomatch")==true)
        {
          $message = "Las claves no coinciden.\\nIntenta de nuevo.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }

        else if (strpos($url,"user=exists")==true)
        {
          $message = "El usuario ya existe.\\nVe a iniciar sesión.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
        ?>

      </div>
    </div>
  </div>

<?php	require "footer.php";?>