<?php

//conectar la base de datos de mySQL con la siguiente funcion
//parametros: servidor, usuario, clave, base de datos

//Valores iMac
$servidor = "localhost";
$usuario = "root";
$clave = "root";
$dbNombre = "managinn"; 

//Valores Portatil Dell
/*
$servidor = "localhost";
$usuario = "root";
$clave = "";
$dbNombre = "managinn";
*/

//Valores Servidor Host
/*
$servidor = "localhost";
$usuario = "managinn_admin";
$clave = "andres";
$dbNombre = "managinn_managinn";
*/

//conectamos a base de datos
$db = mysqli_connect($servidor, $usuario, $clave, $dbNombre) 
or die ("No se pudo conectar a la base de datos");

