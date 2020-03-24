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
        <p>Boton de google</p> 
        <p class = "Parrafo-Pequeño Text-Center">O crea una cuenta</p>
        <form action="con_registro.php" method = "post">
          <div>
            <div>
              <p class="Texto-Formulario">Correo electónico</p>
              <input class = "Form-Field" 
              name="email_post"
              placeholder="Correo" 
              type="email"
              required/>
            </div>
            <div>
              <p class="Texto-Formulario">Contraseña</p>
              <input class = "Form-Field"  
              name="password_post"
              placeholder= "Contraseña" 
              type="password"
              required/> 
            </div>
            <div>
              <p class="Texto-Formulario">Verifica Contraseña</p>
              <input class = "Form-Field"  
              name="password_ver_post"
              placeholder= "Verificar contraseña" 
              type="password"
              required/> 
            </div>
            <div>
              <input class = "Boton-Submit Submit-Principal" 
              name = "Boton-Registro" 
              type="submit"
              value="Registrar"/> 
            </div>
            <p class="Parrafo-Extra-Pequeño Text-Center">¿No tienes una cuenta? 
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