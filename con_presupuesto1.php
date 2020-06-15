<?php
  session_start();

  $usuario_nombre = $_SESSION['name_post'];
  $usuario_correo = $_SESSION['email_post'];
  $usuario_rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  $p_presupuesto = $_POST['presupuesto_inic']; 
  $p_fecha = $_POST['fecha_post'];
  $p_periodo = $_POST['select_periodo'];

  if(isset($_POST['Boton-Continuar']))
  {
    require 'conexion.php';

    $queryPresupuesto = "INSERT INTO data_presupuesto (director, presupuesto_gen, fecha_inicio, periodo)
    VALUES ($usuario_id, $p_presupuesto, '$p_fecha', '$p_periodo')";

    mysqli_query($db, $queryPresupuesto);

    header ('location: presupuesto_informacion3.php'); 
  }