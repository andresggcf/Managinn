<?php
if(isset($_POST['Boton-Invitacion']))
{
  require 'conexion.php';

  $pr = $_GET['pr'];
  $rol = $_GET['rol'];

  $nombre = $_POST['name_post'];
  $empresa = $_POST['company_post'];
  $correo = $_POST['correo_post'];
  $clave = $_POST['clave1_post'];
  $claveVer = $_POST['clave2_post'];

  //si las claves no coinciden
  if($clave !== $claveVer)
  {
    header("Location: invitacion.php?psw=nomatch&pr=$pr&rol=$rol");
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
      header("Location: invitacion.php?user=exists&pr=$pr&rol=$rol");
      exit();
    }

    //registrar el usuario
    else
    {
      session_start();
      //encriptamos la clave
      $clave_md5 = md5($clave);

      $query_registro = "INSERT INTO usuarios (correo, clave, nombre, creacion, empresa, rol, induccion, induccion_global) 
      VALUES ('$correo','$clave_md5', '$nombre',DATE_FORMAT(SYSDATE(), '%y/%m/%d'), '$empresa', '$rol', 1, 1)";
      mysqli_query($db, $query_registro);

      $query_get_usr = "SELECT id FROM usuarios WHERE correo = '$correo' AND nombre = '$nombre' AND empresa = '$empresa'";
      $arr_usuario_id = mysqli_fetch_assoc(mysqli_query($db, $query_get_usr));
      $id_usr = $arr_usuario_id['id'];

      $query_registro2 = "INSERT INTO equipos (id_usuario, id_proyecto) 
      VALUES ('$id_usr','$pr')";
      mysqli_query($db, $query_registro2);

      $_SESSION['email_post'] = $correo;
      $_SESSION['name_post'] = $nombre;
      $_SESSION['success'] = "Has iniciado sesion";

      header ('location: bienvenida.php');
    }
  }
}
?>