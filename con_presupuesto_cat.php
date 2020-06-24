<?php
  session_start();

  $usuario_nombre = $_SESSION['name_post'];
  $usuario_correo = $_SESSION['email_post'];
  $usuario_rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  $p_nombre = $_SESSION['proyecto_nombre'];
  $p_fecha = $_SESSION['fecha_proyecto'];
  $p_descripcion = $_SESSION['desc_proyecto'];
  $p_id= $_SESSION['id_proyecto'];

  $capacitaciones = $_POST['capacitaciones_post'];
  $papeleria = $_POST['papeleria_post']; 
  $infraestructura = $_POST['infraestructura_post'];
  $mobiliario = $_POST['mobiliario_post'];
  $materiales = $_POST['materiales_post'];
  $desarrollo = $_POST['desarrollo_post'];
  $salario = $_POST['salario_post'];
  $licencias = $_POST['licencias_post'];
  $experimentacion = $_POST['experimentacion_post'];



  if(isset($_POST['Boton-Generar']))
  {
    require 'conexion.php';
    $presupuesto_capacitaciones="";
    $presupuesto_papeleria="";
    $presupuesto_infraestructura="";
    $presupuesto_mobiliario="";
    $presupuesto_materiales="";
    $presupuesto_desarrollo="";
    $presupuesto_salario="";
    $presupuesto_licencias="";
    $presupuesto_experimentacion="";


    if($infraestructura == ""){
      $presupuesto_infraestructura = 0;
    }
    else{
      for ($x = 0; $x < strlen($infraestructura); $x++)
      {
        if($infraestructura[$x] == ",")
        {
        break;
        }

        $presupuesto_infraestructura = $presupuesto_infraestructura.$infraestructura[$x];
      }
    }


    if($mobiliario == ""){
      $presupuesto_mobiliario = 0;
    }
    else{
      for ($x = 0; $x < strlen($mobiliario); $x++)
      {
        if($mobiliario[$x] == ",")
        {
        break;
        }

        $presupuesto_mobiliario = $presupuesto_mobiliario.$mobiliario[$x];
      }
    }


    if($materiales == ""){
      $presupuesto_materiales = 0;
    }
    else{
      for ($x = 0; $x < strlen($materiales); $x++)
      {
        if($materiales[$x] == ",")
        {
        break;
        }

        $presupuesto_materiales = $presupuesto_materiales.$materiales[$x];
      }
    }


    if($desarrollo == ""){
      $presupuesto_desarrollo = 0;
    }
    else{
      for ($x = 0; $x < strlen($desarrollo); $x++)
      {
        if($desarrollo[$x] == ",")
        {
        break;
        }

        $presupuesto_desarrollo = $presupuesto_desarrollo.$desarrollo[$x];
      }
    }


    if($salario == ""){
      $presupuesto_salario = 0;
    }
    else{
      for ($x = 0; $x < strlen($salario); $x++)
      {
        if($salario[$x] == ",")
        {
        break;
        }

        $presupuesto_salario = $presupuesto_salario.$salario[$x];
      }
    }


    if($experimentacion == ""){
      $presupuesto_experimentacion = 0;
    }
    else{
      for ($x = 0; $x < strlen($experimentacion); $x++)
      {
        if($experimentacion[$x] == ",")
        {
        break;
        }

        $presupuesto_experimentacion = $presupuesto_experimentacion.$experimentacion[$x];
      }
    }



    if($capacitaciones == ""){
      $presupuesto_capacitaciones = 0;
    }
    else{
      for ($x = 0; $x < strlen($capacitaciones); $x++)
      {
        if($capacitaciones[$x] == ",")
        {
        break;
        }

        $presupuesto_capacitaciones = $presupuesto_capacitaciones.$capacitaciones[$x];
      }
    }



    if($papeleria == ""){
      $presupuesto_papeleria = 0;
    }
    else{
      for ($x = 0; $x < strlen($papeleria); $x++)
      {
        if($papeleria[$x] == ",")
        {
        break;
        }

        $presupuesto_papeleria = $presupuesto_papeleria.$papeleria[$x];
      }
    }



    if($licencias == "")
    {
      $presupuesto_licencias = 0;
    }
    else
    {
      for ($x = 0; $x < strlen($licencias); $x++)
      {
        if($licencias[$x] == ",")
        {
        break;
        }

        $presupuesto_licencias = $presupuesto_licencias.$licencias[$x];
      }
    }


    $query1 = "UPDATE data_presupuesto SET
    p_papeleria = ".$presupuesto_papeleria.",
    p_capacitaciones = ".$presupuesto_capacitaciones.",
    p_infraestructura =  ".$presupuesto_infraestructura.",
    p_salarios = ".$presupuesto_salario.", 
    p_licencias = ".$presupuesto_licencias.",
    p_mobiliario = ".$presupuesto_mobiliario.",
    p_experimentacion = ".$presupuesto_experimentacion.",
    p_materiales = ".$presupuesto_materiales.",
    p_desarrollo = ".$presupuesto_desarrollo.",
    pr_ingresado = 1

    WHERE director = (
      SELECT u.id FROM usuarios u 
      WHERE u.rol = 'Director' 
      AND u.id 
      IN (
        SELECT eq.id_usuario FROM equipos eq 
        WHERE eq.id_proyecto IN (
          SELECT e.id_proyecto FROM equipos e 
          WHERE e.id_usuario = ".$usuario_id.")));";
    mysqli_query($db, $query1);

    header("Location: presupuesto_panel_control.php");
  }