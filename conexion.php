<?php

//conectar la base de datos de mySQL con la siguiente funcion
//parametros: servidor, usuario, clave, base de datos

$servidor = "localhost";
$usuario = "root";
$clave = "root";
$dbNombre = "managinn";

//conectamos a base de datos
$db = mysqli_connect($servidor, $usuario, $clave, $dbNombre) 
or die ("No se pudo conectar a la base de datos");

