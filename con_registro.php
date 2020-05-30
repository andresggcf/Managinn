<?php
if(isset($_POST['Boton-Registro']))
{
  require 'conexion.php';

  $correo = $_POST['email_post'];
  $clave = $_POST['password_post'];
  $claveVer = $_POST['password_ver_post'];

  //si las claves no coinciden
  if($clave !== $claveVer)
  {
    header("Location: registro.php?psw=nomatch");
    exit();
  }

  //verificar que el usuario no existe antes de crearlo
  else
  {
    $query_ver = "SELECT correo FROM usuarios WHERE correo = '$correo'";

    $resultado = mysqli_query($db, $query_ver);
    $correo_checkeo = mysqli_fetch_assoc($resultado);

    if($correo_checkeo['correo'] === $correo)
    {
      header("Location: registro.php?user=exists");
      exit();
    }

    //registrar el usuario
    else
    {
      session_start();
      //encriptamos la clave
      $clave_md5 = md5($clave);

      $query_registro = "INSERT INTO usuarios (correo, clave, creacion) VALUES ('$correo','$clave_md5',DATE_FORMAT(SYSDATE(), '%d/%m/%y'))";
      mysqli_query($db, $query_registro);

      $_SESSION['email_post'] = $correo;
      $_SESSION['success'] = "Has iniciado sesion";

      header ('location: informacion.php');
    }
  }
  mysqli_close($db);
}

else
{
  header("Location: index.php");
  exit();
}

