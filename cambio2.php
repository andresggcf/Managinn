<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  require 'conexion.php';
  $queryProyecto = "SELECT p.* FROM proyecto p WHERE p.id = ".$_GET['id'];
  $resultado = mysqli_query($db, $queryProyecto);
  $arregloProyecto = mysqli_fetch_array($resultado);

  /*echo $arregloProyecto['fecha_inicio']; //ya
  echo $arregloProyecto['duracion_meses']; //ya 
  echo $arregloProyecto['progreso'];
  echo $arregloProyecto['presupuesto_usado']; //ya
  echo $arregloProyecto['etapa']; //ya
  echo $arregloProyecto['investigacion_p'];//ya
  echo $arregloProyecto['investigacion_c'];//ya
  echo $arregloProyecto['definicion_p']; //ya
  echo $arregloProyecto['definicion_p']; //ya
  echo $arregloProyecto['implementacion_p']; //ya
  echo $arregloProyecto['implementacion_c']; //ya*/

  //calculo de fecha nueva para aumentar porcentage de progreso esperado
  $meses = round ($arregloProyecto['duracion_meses']/4);
  $fecha_ant = $arregloProyecto['fecha_inicio'];
  $queryFechaN = "SELECT DATE_ADD('$fecha_ant', INTERVAL -$meses MONTH)";
  
  $etapaN = "Implementacion";
  $presupuestoN = round( rand ( 2000000 , $arregloProyecto['presupuesto_inicial']/3 ));

  $inv_pN = round( rand(30, 40));
  $inv_cN = $inv_pN - 3;

  $def_pN = round( rand(25, 35));
  $def_cN = $def_pN - 7;

  $imp_pN = round( rand(12, 20));
  $imp_cN = $imp_pN - 10;


  $queryActualizacion1 = "UPDATE proyecto SET
  fecha_inicio = (".$queryFechaN."),
  presupuesto_usado = ".$presupuestoN.",
  etapa = '".$etapaN."',
  investigacion_p =".$inv_pN.",
  investigacion_c =".$inv_cN.",
  definicion_p =".$def_pN.",
  definicion_c =".$def_cN.",
  implementacion_p =".$imp_pN.",
  implementacion_c =".$imp_cN."
  WHERE id = ".$_GET['id'].";";

  mysqli_query($db, $queryActualizacion1);

  $queryf2 = "SELECT fecha_inicio AS F_INICIO,
  DATE_ADD(fecha_inicio, INTERVAL ".$arregloProyecto['duracion_meses']." MONTH) AS F_FIN
  FROM
  	proyecto
  WHERE
    id = ".$_GET['id'].";";

  $rf2 = mysqli_query($db, $queryf2);
  $af2 = mysqli_fetch_array($rf2);
  $fecha_inicio = $af2['F_INICIO'];
  $fecha_fin = $af2['F_FIN'];


  $queryDiasDur = "SELECT DATEDIFF('".$fecha_fin."','".$fecha_inicio."') AS DIAS_TOTALES, DATEDIFF(SYSDATE(), '".$fecha_inicio."') AS DIAS_PROGRESO;";
  $resDias = mysqli_query($db, $queryDiasDur);
  $arregloDias = mysqli_fetch_array($resDias);
  $diasTotales = $arregloDias['DIAS_TOTALES'];
  $diasProg = $arregloDias['DIAS_PROGRESO'];
  $porcentajeNuevo = (round(($diasProg/$diasTotales)*100))-25;

  $queryActualizacion2 = "UPDATE proyecto SET 
  progreso = ".$porcentajeNuevo."
  WHERE id = ".$_GET['id'].";";
  mysqli_query($db, $queryActualizacion2);

  header("Location: perfil_dashboard.php?proyecto=".$_GET['id']);
  exit();

?>