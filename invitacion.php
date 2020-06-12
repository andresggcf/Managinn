<?php

require 'conexion.php';

$proyectoInvitacion = $_GET['pr'];

if ($_GET['rol'] == 'f'){
  $rol = 'Facilitador';
}
else{
  $rol = 'Colaborador';
}

$queryProyecto = "SELECT * FROM proyecto WHERE id = '$proyectoInvitacion'";
$resultado =  mysqli_query($db, $queryProyecto);
$arreglo = mysqli_fetch_assoc($resultado);

include("header.php");
?>

<body>
  <div class="NavBar" style="box-shadow: none;">
    <div class="Contenedor-Menu">
      <img src="img/iconos/managinn.png" width="180px" alt="" class="">
    </div>
  </div>

  <div class="RegDatos-Fondo" > 
    <div class="Caja-Texto" style="height:550px; width: 800px">
      <div class = "Modal-1">
        <h2 class="Titulo Text-Center Blanco">¡Hola! Déjanos conocerte</h2>
        <p style = "margin-bottom: 50px" class="Subtitulo Blanco Text-Center">Fuiste invitado como miembro del equipo para el proyecto.</p>

        <form action="con_invitacion.php?pr=<?php echo $_GET['pr']?>&rol=<?php echo $rol?>" method = "post">
          <div class="Modal-Centro">
            <div class="row">
              <div class class="col-sm-6" style="margin-right: 40px">
                <div style = "position: relative;">
                  <input class = "Form-Field" 
                  name="correo_post"
                  placeholder="" 
                  type="text"
                  required/>
                  <label class="Label-Form Label-Blanco">Correo electrónico</label>
                </div>

                <div style = "position: relative;">
                  <input class = "Form-Field"  
                  name="clave1_post"
                  placeholder= "" 
                  type="password"
                  required/>
                  <label class="Label-Form Label-Blanco">Contraseña</label> 
                </div>

                <div style = "position: relative;">
                  <input class = "Form-Field"  
                  name="clave2_post"
                  placeholder= "" 
                  type="password"
                  required/>
                  <label class="Label-Form Label-Blanco">Confirma contraseña</label> 
                </div>
              </div>

              <div class class="col-sm-6">
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
              </div>
  
            </div>

            <div style = "position: relative;">
              <p style = "margin-bottom: 20px; color: white" 
              class="Subtitulo Blanco Text-Center">Harás parte del proyecto 
                <span style="font-weight:700; color: #eb5757"><?php echo $arreglo['nombre']; ?></span> con rol de 
                <span style="font-weight:700; color: #eb5757"><?php echo $rol; ?></span></p>
            </div>
            <div>
              <input class = "Boton-Submit-Pequeño Submit-Principal Derecha" 
              name = "Boton-Invitacion" 
              type = "submit"
              value = "Siguiente"/> 
            </div>
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

<?php	include("footer.php");?>

