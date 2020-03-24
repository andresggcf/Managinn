<?php
session_start();

if(isset($_POST['Boton-Finalizar']))
{
  require 'conexion.php';

  $rol= $_POST['role_post'];

  $correo = $_SESSION['email_post'];

  $query_rol = "UPDATE usuarios SET rol = '$rol'
  WHERE usuarios.correo = '$correo'";

  echo $query_rol;

  mysqli_query($db, $query_rol);

  $_SESSION['role_post'] = $rol;

  header ('location: perfil.php');
}