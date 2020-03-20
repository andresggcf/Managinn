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

  <div class="Registro-Fondo">
    <div class="Columna-Registro"> 
      <div>
        <p>Boton de google</p> 
        <p class = "Parrafo-Pequeño Text-Center">O crea una cuenta</p>
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
              <input class = "Boton-Submit Submit-Principal"  
              id="password" 
              placeholder= "Contraseña" 
              type="submit"
              value="Registrar"/> 
            </div>
            <p class="Parrafo-Extra-Pequeño Text-Center">¿No tienes una cuenta? 
                <a href="inicio.php"
                class = "Enlace-Pequeño-Principal">Inicia Sesión</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php	include("footer.php");?>