<?php
session_start();

if(isset($_POST['Boton-Siguiente']))
{
  require 'conexion.php';

  $nombre = $_POST['name_post'];
  $compania = $_POST['company_post'];

  $correo = $_SESSION['email_post'];

  $query_ver = "SELECT * FROM usuarios WHERE correo = '$correo'";

  $resultado = mysqli_query($db, $query_ver);
  $checkeo = mysqli_fetch_assoc($resultado);

  /*echo $correo;
  echo " clave: ".$checkeo['clave'];
  echo " nombre: ".$checkeo['nombre'];
  echo "nombre campo: ".$nombre;*/

  $query_actualizacion = "UPDATE usuarios SET nombre = '$nombre', 
  empresa = '$compania' 
  WHERE usuarios.correo = '$correo'";

  mysqli_query($db, $query_actualizacion);

  $_SESSION['name_post'] = $nombre;

  header ('location: informacion_rol.php');
}