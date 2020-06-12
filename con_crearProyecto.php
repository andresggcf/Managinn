<?php
  session_start();

  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  if(isset($_POST['Boton-Continuar']))
  {
    require 'conexion.php';

    $_SESSION['proyecto_nombre'] = $_POST['proyecto_post'];
    $_SESSION['fecha_proyecto'] = $_POST['fecha_post'];
    $_SESSION['desc_proyecto'] = $_POST['descripcion_post'];

    $p_nombre = $_SESSION['proyecto_nombre'];
    $fecha_proyecto = $_SESSION['fecha_proyecto'];
    $descripcion = $_SESSION['desc_proyecto'];

    /* Primero creamos el proyecto en la base de datos */
    $queryCrearProyecto = "INSERT INTO proyecto (nombre, fecha_inicio, descripcion) VALUES ('$p_nombre','$fecha_proyecto', '$descripcion')";
    mysqli_query($db, $queryCrearProyecto);

    /*Buscamos el id seleccionado para este proyecto*/
    $queryIdProyecto = "SELECT id FROM proyecto WHERE nombre = '$p_nombre' AND fecha_inicio = '$fecha_proyecto' AND descripcion = '$descripcion'";
    $resultado =  mysqli_query($db, $queryIdProyecto);
    $arregloId = mysqli_fetch_assoc($resultado);

    $_SESSION['id_proyecto'] = $arregloId['id'];

    /*Buscamos el id de la persona para crear la relacion proyecto-usuario en equipos*/
    $queryIdUsuario = "SELECT id FROM usuarios WHERE correo = '$correo' AND nombre = '$nombre'";
    $resultado2 =  mysqli_query($db, $queryIdUsuario);
    $arregloIdU = mysqli_fetch_assoc($resultado2);

    $_SESSION['id_usuario'] = $arregloIdU['id'];

    /* Guardar datos en tabla de equipos */
    $id_pr = $_SESSION['id_proyecto']; 
    $id_usu = $_SESSION['id_usuario'];
    $queryGuardarEquipo = "INSERT INTO equipos (id_usuario, id_proyecto) VALUES ('$id_usu','$id_pr')";
    mysqli_query($db, $queryGuardarEquipo);

    header ('location: perfil_invitar.php');
  }