<?php
  session_start();
  require 'conexion.php';

  $usuario_nombre = $_SESSION['name_post'];
  $usuario_correo = $_SESSION['email_post'];
  $usuario_rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  $p_nombre = $_SESSION['proyecto_nombre'];
  $p_fecha = $_SESSION['fecha_proyecto'];
  $p_descripcion = $_SESSION['desc_proyecto'];
  $p_id= $_SESSION['id_proyecto'];

  $query_persona = "UPDATE usuarios SET induccion_personas = 1
  WHERE id = $usuario_id";

  mysqli_query($db, $query_persona);

  header ('location: personas_panel_control.php');
?>