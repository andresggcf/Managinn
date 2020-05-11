<?php
session_start();
require 'conexion.php';

$correo = $_SESSION['email_post'];
$nombre = $_SESSION['name_post'];

$query_actualizacion = "UPDATE usuarios SET induccion = 1 
WHERE correo = '$correo'";

echo $query_actualizacion;

$resultado =  mysqli_query($db, $query_actualizacion);
header ('location: perfil.php');

?>