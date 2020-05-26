<?php

if(isset($_POST['Boton-PDF']))
{
  require 'conexion.php';

  $fecha_bool = $_POST['fecha_post'];
  $desempeno_bool = $_POST['desempeno_post'];
  $productividad_bool = $_POST['productividad_post'];
  $calidad_bool = $_POST['calidad_post'];
  $alcance_bool = $_POST['alcance_post'];
  $ejecucion_bool = $_POST['ejecucion_post'];
  $categorias_bool = $_POST['categorias_post'];
  $presupuesto_bool = $_POST['presupuesto_post'];
  $coste_bool = $_POST['coste_post'];

  echo $fecha_bool." ".$desempeno_bool." ".$productividad_bool." ".$calidad_bool." ".$alcance_bool;
  echo $ejecucion_bool." ".$categorias_bool." ".$presupuesto_bool." ".$coste_bool;

}