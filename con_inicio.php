<?php

if(isset($_POST['Boton-inicio']))
{
  require 'conexion.php';

  $correo = $_POST['email_post'];
  $clave = $_POST['password_post'];

  $queryMain = "SELECT * FROM usuarios WHERE correo = '$correo'";

  $resultado =  mysqli_query($db, $queryMain); 

  $arregloQuery = mysqli_fetch_assoc($resultado);

  //si existe un usuario en la bd
  if($arregloQuery['correo'] != "")
  {
    $clave_encript = md5($clave);
    if($clave_encript != $arregloQuery['clave'])
    {
      header("Location: inicio.php?psw=wrong");
      exit();
    }

    else
    {
      session_start();
      $_SESSION['email_post'] = $correo;
      $_SESSION['name_post'] = $arregloQuery['nombre'];
      $_SESSION['role_post'] = $arregloQuery['rol'];
      header("Location: perfil.php?login=sucess");
      exit();
    }
  }

  else
  {
    header("Location: inicio.php?user=noexiste");
    exit();
  }
}

else
{
  header("Location: index.php");
  exit();
}