<?php
  session_start();

  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];

  if(isset($_POST['Boton-Guardar-Global']))
  {
    require 'conexion.php';
    
    $num_personas = $_POST['post_num_persons'];
    $num_personas_cap = $_POST['post_num_persons_cap'];
    $num_pr_totales = $_POST['post_pr_totales'];
    $num_pr_convertidos = $_POST['post_pr_convertidos'];

    $e_num_personas_cap = $_POST['option1']; 
    $e_num_sesiones_realizadas = $_POST['option2'];  
    $e_num_prototipos = $_POST['option3'];  

    $p_por_participacion = $_POST['option4']; 
    $p_por_ideas_aprob = $_POST['option5']; 
    $p_por_implementacion = $_POST['option6']; 

    $s_num_nuevos_prod = $_POST['option7']; 
    $s_num_nuevos_servicios = $_POST['option8']; 
    $s_num_proyectos_existosos = $_POST['option9']; 

    /*CREATE TABLE `managinn`.`data_global` ( `id` INT NOT NULL AUTO_INCREMENT , `usuario_id` INT NOT NULL , 
    `num_personas` INT NOT NULL , `num_personas_capacitadas` INT NOT NULL , 
    `num_proy_totales` INT NOT NULL , `num_proy_convertidos` INT NOT NULL , 
    `e_personas_capacitadas` VARCHAR(3) NULL , `e_sesiones_realizadas` VARCHAR(3) NULL , 
    `e_prototipos` VARCHAR(3) NULL , `p_participacion` VARCHAR(3) NULL , 
    `p_ideas_aprob` VARCHAR(3) NULL , `p_implementacion` VARCHAR(3) NULL , `s_nuevos_prod` VARCHAR(3) NULL , 
    `s_nuevos_servicios` VARCHAR(3) NULL , `s_proyectos_exitosos` VARCHAR(3) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
     */

    /* Primero creamos el proyecto en la base de datos */
    $queryDatosGlobal = "INSERT INTO data_global (usuario_id, num_personas, num_personas_capacitadas, num_proy_totales,
    num_proy_convertidos, e_personas_capacitadas, e_sesiones_realizadas, e_prototipos, p_participacion, p_ideas_aprob,
    p_implementacion, s_nuevos_prod, s_nuevos_servicios, s_proyectos_exitosos) 
    SELECT u.id, $num_personas, $num_personas_cap, $num_pr_totales, $num_pr_convertidos, '$e_num_personas_cap',
    '$e_num_sesiones_realizadas', '$e_num_prototipos', '$p_por_participacion', '$p_por_ideas_aprob', '$p_por_implementacion', 
    '$s_num_nuevos_prod', '$s_num_nuevos_servicios', '$s_num_proyectos_existosos'
    FROM usuarios u
    WHERE correo = '$correo'";

    mysqli_query($db, $queryDatosGlobal);
    
    header ('location: global_panel_control.php');
  }
?>