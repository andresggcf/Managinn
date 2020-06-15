<?php
  session_start();

  $usuario_nombre = $_SESSION['name_post'];
  $usuario_correo = $_SESSION['email_post'];
  $usuario_rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  $papeleria = $_POST['option1']; 
  $salarios = $_POST['option2']; 
  $experimentacion = $_POST['option3']; 
  $capacitaciones = $_POST['option4']; 
  $licencias = $_POST['option5']; 
  $materiales = $_POST['option6']; 
  $infra = $_POST['option7']; 
  $mobiliario = $_POST['option8']; 
  $desarrollo = $_POST['option9']; 

  if(isset($_POST['Boton-Continuar']))
  {
    require 'conexion.php';

    $queryPresupuesto = "UPDATE data_presupuesto SET 
    papeleria = '$papeleria',
    capacitaciones = '$capacitaciones',
    infraestructura = '$infra',
    salario = '$salarios',
    licencias = '$licencias',
    mobiliario = '$mobiliario',
    experimentacion = '$experimentacion',
    materiales = '$materiales',
    desarrollo = '$desarrollo',
    induccion = 1
    WHERE director = $usuario_id";

    mysqli_query($db, $queryPresupuesto);

    $queryInduccion = "UPDATE usuarios SET
    induccion_presupuesto = 1
    WHERE id = $usuario_id";

    mysqli_query($db, $queryInduccion);

    header ('location: presupuesto_panel_control.php'); 
  }