<?php
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
        <form>
          <div>
            <div>
              <p class="Texto-Formulario">Correo electónico</p>
              <input class = "Form-Field" id="email" placeholder="Correo" type="text"/>
            </div>
            <div>
              <p class="Texto-Formulario">Contraseña</p>
              <input class = "Form-Field"  id="password" placeholder= "Contraseña" type="password"/> 
            </div>
            <div>
              <input class = "Boton-Submit Submit-Secundario"  
              id="password" 
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
      </div>
    </div>
  </div>

<?php	include("footer.php");?>