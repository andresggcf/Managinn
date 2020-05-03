<?php
  session_start();

  $usuario_nombre = $_SESSION['name_post'];
  $usuario_correo = $_SESSION['email_post'];
  $usuario_rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  $p_nombre = $_SESSION['proyecto_nombre'];
  $p_fecha = $_SESSION['fecha_proyecto'];
  $p_descripcion = $_SESSION['desc_proyecto'];
  $p_id= $_SESSION['id_proyecto'];

  $p_presupuesto = $_POST['presupuesto_post']; 
  $p_duracion = $_POST['duracion_post'];

  if(isset($_POST['Boton-crear']))
  {
    require 'conexion.php';

    
    $newStr = str_replace(',', '', $p_presupuesto); // If you want it to be "185345321"
    $presupuesto = intval($newStr);

    $_SESSION['presupuesto_post'] = $presupuesto;
    $_SESSION['duracion_post'] = $p_duracion;

    /* Se agrega el presupuesto del proyecto */
    $queryCrearProyecto = "UPDATE proyecto 
    SET presupuesto_inicial = '$presupuesto', 
    duracion_meses = '$p_duracion', 
    estado = 'A'
    WHERE id = '$p_id'";
    echo $queryCrearProyecto;
    mysqli_query($db, $queryCrearProyecto);

    header ('location: perfil.php');
  }