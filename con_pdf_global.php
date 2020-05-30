<?php

if(isset($_POST['Boton-PDF']))
{
  require 'conexion.php';
  session_start();
  require_once __DIR__ . '/vendor/autoload.php';

  $escalamiento_bool = $_POST['escalamiento_post'];
  $tasa_bool = $_POST['tasa_post'];
  $dias_act_bool = $_POST['dias_act_post'];
  $personas_bool = $_POST['personas_post'];
  $presupuesto_bool = $_POST['presupuesto_post'];
  $vlr_port_bool = $_POST['vlr_portafolio_post'];

  $nombre_out = $_SESSION['name_post'];
  $correo_out = $_SESSION['email_post'];
  $rol_out = $_SESSION['role_post'];

  //ejecucion de queries fecha:
  $queryFecha = "SELECT DATE_FORMAT(SYSDATE(), '%d/%m/%y') AS FECHA";
  $res_fecha = mysqli_fetch_assoc(mysqli_query($db,$queryFecha));
  $fecha_out = $res_fecha['FECHA'];

  //creamos nueva instancia de mpdf
  $mpdf = new \Mpdf\Mpdf();

  //estructuramos el pdf
  $data = '';
    $data .= '<img src="img/iconos/managinn3.png" width="180px" alt="" class=""><br/><br/>';
    $data .= '<h1>Documento Global Generado</h1>';
    $data .= '<p>Usuario: '.$nombre_out.' (<strong>'.$correo_out.'</strong>)</p>';
    $data .= '<p>Fecha de generación de documento: '.$fecha_out.'</p><br/><br/>';

    //ejecucion de queries Escalamiento:
    if ($escalamiento_bool=='on'){
      $escalamiento_out = "45";
      $data .= '<strong>Escalamiento promedio:</strong> '.$escalamiento_out.'<br/>';
    }
    
    //ejecucion de queries Tasa de conversión:
    if ($tasa_bool=='on'){
      $tasa_out = "33";
      $data .= '<strong>Tasa de conversión:</strong> '.$tasa_out.'<br/>';
    }

    //ejecucion de queries dias activos:
    if($dias_act_bool=='on'){
      $queryDias = "SELECT DATEDIFF(SYSDATE(),(SELECT u.creacion FROM usuarios u 
      WHERE u.correo = 'director@gmail.com'))
      AS DIAS_ACTIVO;";
      $res_dias = mysqli_fetch_assoc(mysqli_query($db, $queryDias));
    
      $dias_activos = $res_dias['DIAS_ACTIVO'];
      $data .= '<strong>Días activos:</strong> '.$dias_activos.'<br/>';
    }

    //ejecucion de queries personas capacitadas:
    if($personas_bool=='on'){
      $queryPersonas = "SELECT d.num_personas, d.num_personas_capacitadas FROM data_global d 
      INNER JOIN usuarios u ON d.usuario_id = u.id WHERE 
      u.correo = '$correo_out' ";
      $res_personas = mysqli_fetch_assoc(mysqli_query($db, $queryPersonas));
      $personas1_out = $res_personas['num_personas_capacitadas'];
      $personas2_out = $res_personas['num_personas'];

      $data .= '<strong>Personas capacitadas:</strong> '.$personas1_out.' de '.$personas2_out.'<br/>';
    }
    //ejecucion de queries presupuesto:
    if($presupuesto_bool=='on'){
      $queryPresupuesto = "SELECT SUM(p.presupuesto_inicial) AS SUMA
          FROM (
            SELECT u.id, p.presupuesto_inicial 
            FROM usuarios u 
            INNER JOIN equipos e ON u.id = e.id_usuario 
            INNER JOIN proyecto p ON e.id_proyecto = p.id 
            WHERE u.correo = '$correo_out'
          ) AS p";
      $res_presupuesto =  mysqli_fetch_assoc(mysqli_query($db, $queryPresupuesto));
      $presupuesto1_out = number_format($res_presupuesto['SUMA'],0, ',', '.');  
      $presupuesto2_out = "$ 123,456,789";

      $data .= '<strong>Presupuesto usado:</strong> $ '.$presupuesto1_out.' de '.$presupuesto2_out.'<br/>';
    }
    
    //ejecucion de queries valor portafolio:
    if($vlr_port_bool=='on')
    {
      $vlr_port_out = "$ 123,456,789";
      $data .= '<strong>Valor actual del portafolio:</strong> '.$vlr_port_out.'<br/>';
    }

  //escribir el pdf
  $mpdf->WriteHTML($data);
  //enviarlo al browser
  $mpdf->Output('global_export.pdf','D');
}

?>