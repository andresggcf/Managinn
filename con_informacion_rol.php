<?php
session_start();

if(isset($_POST['Boton-Finalizar']))
{
  require 'conexion.php';

  $rol= $_POST['role_post'];

  $correo = $_SESSION['email_post'];

  $query_rol = "UPDATE usuarios SET rol = '$rol'
  WHERE usuarios.correo = '$correo'";

  mysqli_query($db, $query_rol);

  $_SESSION['role_post'] = $rol;

  header ('location:bienvenida.php');
}