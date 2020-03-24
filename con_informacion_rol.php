<?php
session_start();

if(isset($_POST['Boton-Finalizar']))
{
  require 'conexion.php';

  $rol= $_POST['role_post'];

  $correo = $_SESSION['email_post'];

  $query_ver = "SELECT * FROM usuarios WHERE correo = '$correo'";

  $resultado = mysqli_query($db, $query_ver);
  $checkeo = mysqli_fetch_assoc($resultado);


  $query_actualizacion = "UPDATE usuarios SET rol = '$rol'
  WHERE usuarios.correo = '$correo'";

  mysqli_query($db, $query_actualizacion);

  $_SESSION['role_post'] = $rol;

  header ('location: perfil.php');
}