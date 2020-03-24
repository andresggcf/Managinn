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
    <div class="Columna-Inicio"> 
      <div>
        <p>Boton de google</p> 
        <p class = "Parrafo-Pequeño Text-Center">O inicia sesión con tu correo</p>
        <form action="con_inicio.php" method = "post">
          <div>
            <div>
              <p class="Texto-Formulario">Correo electónico</p>
              <input class="Form-Field" 
              name="email_post"
              id="email" 
              placeholder="Correo" 
              type="email"/>
            </div>
            <div>
              <p class="Texto-Formulario">Contraseña</p>
              <input class="Form-Field" 
              name="password_post" 
              id="password" 
              placeholder= "Contraseña" 
              type="password"/> 
            </div>
            <div>
              <input class = "Boton-Submit Submit-Secundario"  
              name="Boton-inicio"
              id="submit" 
              placeholder= "Contraseña" 
              type="submit"
              value="Iniciar sesión"/> 
            </div>
            <p class="Parrafo-Extra-Pequeño Text-Center">¿No tienes una cuenta? 
                <a href="registro.php"
                class = "Enlace-Pequeño-Secundario">Registrate Aquí</a>
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

<?php	include("footer.php");?>