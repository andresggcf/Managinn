<?php
  session_start();

  $usuario_nombre = $_SESSION['name_post'];
  $usuario_correo = $_SESSION['email_post'];
  $usuario_rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  $p_presupuesto = $_POST['presupuesto_act']; 

  if(isset($_POST['Boton-Continuar']))
  {
    require 'conexion.php';

    $queryPresupuesto = "UPDATE data_presupuesto SET presupuesto_act = $p_presupuesto
    WHERE director = $usuario_id";

    mysqli_query($db, $queryPresupuesto);

    header ('location: presupuesto_informacion4.php'); 
  }