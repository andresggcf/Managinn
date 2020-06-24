<?php
  session_start();
  
  $nombre = $_SESSION['name_post'];
  $correo = $_SESSION['email_post'];
  $rol = $_SESSION['role_post'];
  $usuario_id = $_SESSION['id_usuario'];

  include("header.php");
  ?>

<body class="panel_control personas">
  <div class="NavBar">
    <div class="Contenedor-Menu d-flex align-items-center justify-content-end">
      <!-- <img src="img/iconos/managinn.png" width="180px" alt="" class=""> -->
      <a href="#">
        <img src="img/iconos/solicitudes.svg" alt="">
      </a>
      <a href="#">
        <img src="img/iconos/icono-checklist.svg" alt="">
      </a>
      <a href="#">
        <img src="img/iconos/notificaciones.svg" alt="">
      </a>
      <a href="#">
        <img src="img/iconos/settings.svg" alt="">
      </a>
    </div>
  </div>

  <div class = "Columna-Perfil d-flex flex-column" style="position: fixed">
    <div class="icon_home" style="margin-bottom: 120px">
      <img src="img/iconos/inn.svg" width="180px" alt="" class="">
    </div>
    <div class = "Elementos-Perfil">
      <div class = "Botones-Perfil">
        <a class="Icono-Menu-Perfil" href = "perfil.php">
          <img src="./img/iconos/icono_proyectos.svg" alt="Dashboard">
        </a>
        <a class="Icono-Menu-Perfil"  href = "global.php">
          <img src="./img/iconos/icono_global.svg" alt="Global">
        </a>
        <a class="Icono-Menu-Perfil current" href = "personas.php">
          <img class="current-Icono" src="./img/iconos/icono_personas.svg" alt="Personas">
        </a>
        <a class="Icono-Menu-Perfil " href = "presupuesto.php">
          <img src="./img/iconos/icono_presupuesto.svg" alt="Presupuesto">
        </a>
      </div>

      <div class = "Usuario-Perfil" style="margin-top: 110px"> 
        <img src = "./img/iconos/Icono-Perfil.png" alt="Icono" 
          height="45px"
          style = "border-radius: 5px; float: left; margin-right: 10px;">

        <div class = "Perfil-Dropdown-Container" style = "float: right;">
          <div class="btn-group dropright ">
            <button type="button" class="btn btn-secondary dropdown-toggle Boton-Dropdown" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu">
              <!-- Dropdown menu links -->
              <a style="color:#eb5757; margin-left: 15px" href = "index.php?logout='1'">Cerrar Sesión</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   

    <div class="new-body">
      <div class="container-fluid">
        <div class="row justify-content-between mb-5">
          <div class="col-3 radioBtn_container">
            <div class="form-group">
                <div class="input-group">
                  <div id="radioBtn" class="btn-group border-radius">
                    <a class="btn btn-custom btn-bg-azul btn-large 
                    <?php 
                    if ($_GET['rol']=='Facilitador')
                    {
                      echo "active";
                    }
                    else
                    {
                      echo "notActive";
                    }
                    ?>" data-toggle="selector" data-title="Facilitadores"
                     href="personas_panel_control.php?rol=Facilitador">Facilitadores</a>
                    <a class="btn btn-custom btn-bg-azul btn-large 
                    <?php 
                    if ($_GET['rol']=='Colaborador')
                    {
                      echo "active";
                    }
                    else
                    {
                      echo "notActive";
                    }
                    ?>" data-toggle="selector" data-title="Colaboradores"
                    href="personas_panel_control.php?rol=Colaborador">Colaboradores</a>
                  </div>
                  <input type="hidden" name="selector" id="selector">
                </div>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <div class="input-group border-radius filtro">
                <input type="text" class="input-clear form-control" placeholder="Filtro de palabras claves">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php 

            require 'conexion.php';
    
            $query1 = "SELECT * FROM usuarios WHERE id IN 
            (SELECT id_usuario 
            FROM equipos 
            WHERE id_proyecto 
            IN (SELECT id_proyecto
              FROM equipos 
              WHERE id_usuario = ".$usuario_id.") 
              AND id_usuario NOT IN (".$usuario_id.")
              AND rendimiento = 'mejora')
            AND rol = '".$_GET['rol']."'";

            $query2 = "SELECT * FROM usuarios WHERE id IN 
            (SELECT id_usuario 
            FROM equipos 
            WHERE id_proyecto 
            IN (SELECT id_proyecto
              FROM equipos 
              WHERE id_usuario = ".$usuario_id.") 
              AND id_usuario NOT IN (".$usuario_id.")
              AND rendimiento = 'alto')
            AND rol = '".$_GET['rol']."'";

          ?>
          <div class="col-12 mb-4 mejora">
            <h2>
              Rendimiento con necesidad de mejora 
            </h2>
            <div id="mejora" class="row">
            </div>
          </div>

          <div class="col-12 mb-4 medio">
            <h2>
              Rendimiento medio 
            </h2>
            <div id="medio" class="row">
            </div>
            <p class="not_found">No hay personas en estas categoría</p>
          </div>

          <div class="col-12 mb-4 alto">
            <h2>
              Rendimiento alto 
            </h2>
            <div id="alto" class="row">
            </div>
          </div>
        </div>




        <div class="row panel_lateral ">
          <div class="col-12 py-4 padding-panel">
            <div class="close_btn"><img src="img/iconos/icono_cerrar.svg" alt=""></div>
            <div class="row">
              <div class="col-12 my-3">
                  <div class="perfil_completo d-flex flex-row justify-content-start align-items-center">
                    <img class="mx-3" style="width: 80px;" src="img/iconos/avatar_hombre.svg" alt="">
                    <div class="nombre" id="nombrePersona">
                    </div>
                    <a href="#" class="btn btn-custom btn-bg-red btn-large btn-shadow-red ml-auto">Escribir mensaje</a>
                  </div>
              </div>
              <div class="col-4 my-3">
                <div class="datos box-shadow d-flex flex-column justify-content-around">
                  <h4><img class="img-fluid" src="img/iconos/icono_datos.svg" alt="Datos"> Datos</h4>
                  <span id="activoPersona"></span>
                  <span id="diasPersona"></span>
                  <span><strong>Teléfono:</strong> +57 3138827309</span>
                  <span id="correoPersona"></span>
                </div>
              </div>
              <div class="col-8 my-3">
                <div class="capacitaciones box-shadow ">
                  <h4><img src="img/iconos/capacitaciones.svg" style="height: 18px;" alt=""> Capacitaciones</h4>
                  <div class="row">
                    <div class="col-4">
                      <div class="box-shadow capacitacion d-flex flex-column justify-content-end px-0">
                        <h5 class="px-4">Design Thinking</h5>
                        <span class="px-4 pb-1">17/feb/20 - 30/feb/20</span>
                        <div class="progress">
                          <div class="progress-bar bg-blue" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="check-blue">
                        <img src="img/iconos/check-blue.svg" alt="">
                      </div>
                    </div>
                    <div class="col-4 d-flex">
                      <div class="border-radius d-flex justify-content-center align-items-center">
                        <img src="img/iconos/icono_anadir.svg" style="height: 15px;display: block;" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 my-3">
                <div class="desempeno box-shadow">
                  <h4><img src="img/iconos/desempeno.svg" style="height: 24px;" alt=""> Desempeño</h4>
                  <canvas id="charPresupuesto" class="bg-color grafica" height="400"></canvas>
                </div>
              </div>

              <div class="col-7 mt-3">
                <div class="participacion box-shadow d-flex flex-column">
                  <h4><img src="img/iconos/participacion.svg" alt=""> Participación</h4>
                  <div id="proyectoPersona" class="row" style="height: 100%;">
                  </div>
                </div>
              </div>
              <div class="col-5 mt-3">
                <div class="perfil_creativo box-shadow ">
                  <h4 class="mb-3"><img src="img/iconos/perfilcreativo.svg" style="height: 26px;" alt=""> Perfil Creativo</h4>
                  <div class="row">
                    <span class="herramienta col-5 d-flex align-items-center justify-content-end"><img src="img/iconos/herramienta-perfilcreativo.svg" style="height: 36px;"
                        alt=""></span>
                    <div class="col-7">
                      <h5>Implementador</h5>
                      <p>Su principal interés es <strong>hacer que las cosas se lleven a cabo.</strong></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--container-fluid-->
    </div>


    
  <?php
  include("footer_4.php");
  ?>

  <script type="text/javascript">
  $.noConflict();
  jQuery(document).ready(function ($) {
    $('#Boton-Preferencias').click(function () {
      $('#Crear-Implementacion').css('display', 'block');
      $('#Sin-Metricas').css('display', 'none');
      $('#Dashboard-Global').css('display', 'none');
      $('.Blanco-Fondo').addClass('general_bg');
    })
    /**
     * Sumar y restar valores en los input de Datos sobre Personas.
     */
    $('#less_persons').click(function (e) {
      e.preventDefault()
      var num_persons = parseInt($('#num_persons').val());
      num_persons--;
      if (num_persons > 0) {
        $('#num_persons').val(num_persons)
      }
    })
    $('#more_persons').click(function (e) {
      e.preventDefault()
      var num_persons = parseInt($('#num_persons').val());
      num_persons++;
      $('#num_persons').val(num_persons)
    })

    $('#less_persons_cap').click(function (e) {
      e.preventDefault()
      var num_persons = parseInt($('#num_persons_cap').val());
      num_persons--;
      if (num_persons > 0) {
        $('#num_persons_cap').val(num_persons)
      }
    })
    $('#more_persons_cap').click(function (e) {
      e.preventDefault()
      var num_persons = parseInt($('#num_persons_cap').val());
      num_persons++;
      $('#num_persons_cap').val(num_persons)
    })
    /**
     * Permitir solo valores numericos en los input:number
     */
    $('input[type=number]').change(function () {
      var valueNumber = $(this).val();
      console.log(valueNumber)
      valueNumber = parseInt(valueNumber);
      valueNumber = (!isNaN(valueNumber)) ? valueNumber : 0;
      console.log(valueNumber)
      $(this).val(valueNumber)
    });
    
    /**
     * Cambiar de pasos en el formulario de Ajustar Preferencias 
     */
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    function showTab(n) {
      // This function will display the specified tab of the form ...
      var x = $(".tab");
      if (x.length == 0) { return false }
      x[n].style.display = "flex";
      var bar = $(".progress-bar");
      if(!x.hasClass('tab_presupuesto')){
        switch (n) {
          case 0:
            bar.css('width', "0%");
            $(".items_progreso li:nth-child(1)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
            $(".items_progreso li:nth-child(2)>div").addClass("Circulo-Progreso").removeClass("circulo-actual");
            $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual");
            break;
          case 1:
            bar.css('width', "25%");
            $(".items_progreso li:nth-child(1)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
            
            $(".items_progreso li:nth-child(2)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
            $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
            console.log(n)
            break;
            case 2:
              bar.css('width', "50%");
              $(".items_progreso li:nth-child(1)>div").addClass("circulo-pasado").removeClass("circulo-actual");
              $(".items_progreso li:nth-child(2)").addClass("progreso-actual").removeClass("progreso-no");
              $(".items_progreso li:nth-child(2)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
              $(".items_progreso li:nth-child(3)").addClass("progreso-actual").removeClass("progreso-no");
            $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
            console.log(n)
            break;
          case 3:
            bar.css('width', "100%");
            $(".items_progreso li:nth-child(2)>div").addClass("circulo-pasado").removeClass("circulo-actual");
            $(".items_progreso li:nth-child(3)>div").addClass("circulo-actual").removeClass("Circulo-Progreso");
            console.log(n)
            break;
          default:
            console.log(n, bar);
        }
      }else{
        switch (n) {
          case 0:
            bar.css('width', "0%");
            $(".items_progreso li:nth-child(1)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
            $(".items_progreso li:nth-child(2)>div").addClass("Circulo-Progreso").removeClass("circulo-actual");
            $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual");
            break;
          case 1:
            bar.css('width', "50%");
            $(".items_progreso li:nth-child(1)>div").addClass("circulo-pasado").removeClass("circulo-actual");
            $(".items_progreso li:nth-child(1)").addClass("progreso-pasado").removeClass("progreso-actual");
            $(".items_progreso li:nth-child(2)").addClass("progreso-actual").removeClass("progreso-no");
            $(".items_progreso li:nth-child(2)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
            $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
            break;
          case 2:
            bar.css('width', "100%");
            $(".items_progreso li:nth-child(2)>div").addClass("circulo-pasado").removeClass("circulo-actual");
            $(".items_progreso li:nth-child(1)").addClass("progreso-pasado").removeClass("progreso-actual");
            $(".items_progreso li:nth-child(2)").addClass("progreso-pasado").removeClass("progreso-actual");
            $(".items_progreso li:nth-child(3)").addClass("progreso-actual").removeClass("progreso-no");
            $(".items_progreso li:nth-child(3)>div").addClass("circulo-actual").removeClass("Circulo-Progreso");
            console.log(n)
            break;
          default:
            console.log(n, bar);
        }
      }
    }
    $("input[name='btn_back']").click(function () {
      nextPrev(1)
    })
    $("input[name='Boton-Continuar']").click(function () {
      nextPrev(1)
    })
    function nextPrev(n) {
      var x = $(".tab");
      if ((n >= 1 && currentTab >= (x.length - 1)) || n < 1 && currentTab == 0) return false;
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;
      if (currentTab >= x.length) {
        return false;
      }
      showTab(currentTab);
    }

    /**
     * Variables para las metricas GLOBAL
     */
    var escalamiento = '10%';
    var tasa_conversion = '15%';
    var dias_activos = 32;
    var presupuesto_usado = 1500000;
    var total_presupuesto_usado = '$3200000';
    var valor_actual_neto = 350000;
    var personas_capacitadas = 12;
    var personas_capacitadas_total = 32;
    var personas_capacitadas_relacion = personas_capacitadas + "/" + personas_capacitadas_total;

    /**
     * Asignar de variables
     */
    $("#escalamiento .value").text(escalamiento);
    $("#tasa_conversion .value").text(tasa_conversion);
    $("#dias_activos").text(dias_activos);
    $("#presupuesto_usado").text(presupuesto_usado);
    $("#total_presupuesto_usado").text(total_presupuesto_usado);
    $("#valor_actual_neto").text(valor_actual_neto);
    //$("#personas_capacitadas_relacion").text(personas_capacitadas_relacion);
    /**
     * Asignar meses
     */
    var meses = [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ];
    var d = new Date();
    var n = d.getMonth();
    $('#mes_actual').text(meses[n]);
    $('#less_month').click(function () {
      n--;
      $('#mes_actual').text(meses[n]);
    })
    $('#more_month').click(function () {
      n++;
      $('#mes_actual').text(meses[n]);
    })
    /**
     * Asignar valores random a la grafica cada vez que se cambie de filtro
     */
    $('.change_graph').click(function (e) {
      e.preventDefault();
      if ($(this).hasClass('active')) {
        return false;
      }
      $(".change_graph").removeClass("active");
      $(this).addClass('active')
      var dataUpdate = Array.from({ length: 6 }, () => Math.floor(Math.random() * 100));
      var dataComplement = []
      dataUpdate.forEach(function (element) {
        dataComplement.push(100 - element)
      })
      myChart.data.datasets[0].data = dataUpdate;
      myChart.data.datasets[1].data = dataComplement;
      myChart.update();
    })
    /**
     * Agregar iconos de personas segun los valores asignados
     * a las personas capacitadas
     * @argument personas_capacitadas = Numero de personas capacitadas
     * @argument personas_capacitadas_total = Numero total de personas
     */
    var n_personas = [];
    for (let index = 0; index < personas_capacitadas_total; index++) {
      var persona = $('<span />').attr('class', 'persona');
      if (index < personas_capacitadas) {
        persona.addClass('active');
      }
      n_personas.push(persona);
    }
    $('.n_personas').append(n_personas)

    // Personas
    $(".add-more").click(function (e) {
      e.preventDefault();
      var addto = "#field" + next;
      var addRemove = "#field" + (next);
      next = next + 1;
      var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
      var newInput = $(newIn);
      var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
      var removeButton = $(removeBtn);
      $(addto).after(newInput);
      $(addRemove).after(removeButton);
      $("#field" + next).attr('data-source', $(addto).attr('data-source'));
      $("#count").val(next);

      $('.remove-me').click(function (e) {
        e.preventDefault();
        var fieldNum = this.id.charAt(this.id.length - 1);
        var fieldID = "#field" + fieldNum;
        $(this).remove();
        $(fieldID).remove();
      });
    });

    $('#radioBtn a').on('click', function () {
      // agregarPersonas();
      var sel = $(this).data('title');
      var tog = $(this).data('toggle');
      $('#' + tog).prop('value', sel);

      $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
      $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
    })

    // Crear personas
    var personas = {
      'mejora':[
        <?php
         if ($result = mysqli_query($db, $query1)) 
         {
           while ($row = mysqli_fetch_assoc($result)) 
           { 
        ?>
          {
            id: '<?php echo $row['id']?>',
            nombre:'<?php echo $row['nombre']?>',
            cargo:'<?php echo $row['rol']?>',
            img:'img/iconos/avatar_hombre.svg',
            activo: '<?php echo $row['creacion']?>',
            correo: '<?php echo $row['correo'] ?>',
            dias: Math.floor((Math.random() * 20) + 1),
            proyectos: [
              <?php 
                $query11 = "SELECT p.* FROM proyecto p 
                INNER JOIN equipos e ON p.id = e.id_proyecto
                WHERE e.id_usuario = ".$row['id'];
                if ($result1 = mysqli_query($db, $query11)) 
                {
                  while ($row1 = mysqli_fetch_assoc($result1)) 
                  { 
                ?>
                  {
                    nombre_p: '<?php echo $row1['nombre']?>',
                    progreso_p: '<?php echo $row1['progreso']?>'
                  }
                <?php
                  }
                }
                ?>
            ]
          },
        <?php
           }
        }
        ?>
      ],
      'medio':[],
      'alto':[
        <?php
         if ($result = mysqli_query($db, $query2)) 
         {
           while ($row = mysqli_fetch_assoc($result)) 
           { 
        ?>
          {
            id: '<?php echo $row['id']?>',
            nombre:'<?php echo $row['nombre']?>',
            cargo:'<?php echo $row['rol']?>',
            img:'img/iconos/avatar_hombre.svg',
            activo: '<?php echo $row['creacion']?>',
            correo: '<?php echo $row['correo'] ?>',
            dias: Math.floor((Math.random() * 20) + 1),
            proyectos: [
              <?php 
                $query22 = "SELECT p.* FROM proyecto p 
                INNER JOIN equipos e ON p.id = e.id_proyecto
                WHERE e.id_usuario = ".$row['id'];
                if ($result2 = mysqli_query($db, $query22)) 
                {
                  while ($row2 = mysqli_fetch_assoc($result2)) 
                  { 
                ?>
                  {
                    nombre_p: '<?php echo $row2['nombre']?>',
                    progreso_p: '<?php echo $row2['progreso']?>'
                  }
                <?php
                  }
                }
                ?>
            ]
          },
        <?php
           }
        }
        ?>
      ]

    }
    // Agregar personas
    function agregarPersonas(){
      $('#mejora').empty();
      personas.mejora.forEach(element => {
        $('#mejora').append(
          `<div class="col-xl-1 col-lg-2 col-md-6 my-2">
            <div class="perfil_persona" id ="${element.id}">
              <img class="img-fluid" src="${element.img}" alt="">
              <div class="nombre">${element.nombre}</div>
              <div class="cargo">${element.cargo}</div>
              <div class="cargo" style="display: none">${element.id}</div>
            </div>
          </div>`
        );
      });

      $('#alto').empty();
      personas.alto.forEach(element => {
        $('#alto').append(
          `<div class="col-xl-1 col-lg-2 col-md-6">
            <div class="perfil_persona" id ="${element.id}">
              <img class="img-fluid" src="${element.img}" alt="">
              <div class="nombre">${element.nombre}</div>
              <div class="cargo">${element.cargo}</div>
              <div class="cargo" style="display: none">${element.id}</div>
            </div>
          </div>`
        ).show();
      });
    }
    agregarPersonas();

    function agregarNombre(id){
      console.log(personas);
      $('#nombrePersona').empty();
      $('#correoPersona').empty();
      $('#activoPersona').empty();
      $('#diasPersona').empty();
      $('#proyectoPersona').empty();
      for (let i = 0; i < personas.mejora.length; i++)
      {
        if(personas.mejora[i].id == id)
        {
          $('#nombrePersona').append(
            '<h2 class="m-0">' + personas.mejora[i].nombre + '</h2>'+
            '<div class="cargo">' + personas.mejora[i].cargo + '</div>'
          ).show();
          $('#correoPersona').append(
            '<strong>Correo:</strong> ' + personas.mejora[i].correo 
          ).show();
          $('#activoPersona').append(
            '<strong>Activo desde:</strong> ' + personas.mejora[i].activo 
          ).show();
          $('#diasPersona').append(
            '<strong>Días de actividad:</strong> ' + personas.mejora[i].dias 
          ).show(); 
          console.log(personas.mejora[i].proyectos);
          personas.mejora[i].proyectos.forEach(element =>{
            $('#proyectoPersona').append(
              `<div class="col-3 d-flex">
                <div class="bg-blue-texture px-0 d-flex flex-column justify-content-between">
                  <p class="px-3">${element.nombre_p}</p>
                  <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar bg-yellow" role="progressbar" style="width: ${element.progreso_p}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>`
            ).show();
          });
        }
      }

      for (let i = 0; i < personas.alto.length; i++)
      {
        if(personas.alto[i].id == id)
        {
          $('#nombrePersona').append(
            '<h2 class="m-0">' + personas.alto[i].nombre + '</h2>'+
            '<div class="cargo">' + personas.alto[i].cargo + '</div>'
          ).show();
          $('#correoPersona').append(
            '<strong>Correo:</strong> ' + personas.alto[i].correo 
          ).show();
          $('#activoPersona').append(
            '<strong>Activo desde:</strong> ' + personas.alto[i].activo 
          ).show();
          $('#diasPersona').append(
            '<strong>Días de actividad:</strong> ' + personas.alto[i].dias 
          ).show(); 
          console.log(personas.alto[i].proyectos);
          personas.alto[i].proyectos.forEach(element =>{
            $('#proyectoPersona').append(
              `<div class="col-3 d-flex">
                <div class="bg-blue-texture px-0 d-flex flex-column justify-content-between">
                  <p class="px-3">${element.nombre_p}</p>
                  <div class="progress mb-2" style="height: 10px;">
                    <div class="progress-bar bg-yellow" role="progressbar" style="width: ${element.progreso_p}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>`
            ).show();
          });
        }
      }
    }
    
  

    // Abrir perfil de persona
    $('.perfil_persona').click(function(e){
      console.log($(this).parent().parent());
      console.log("Something: " + $(this).attr('id'));
      agregarNombre($(this).attr('id'));
      if($('.panel_lateral').hasClass('show')){
        return;
        $('.perfil_persona').removeClass('grey_effect')
        $('.alto,.medio,.mejora').show();
        $('.alto,.medio,.mejora').addClass('col-12').removeClass('col-5');
        console.log('close and rollback')
        $('#alto > div,#mejora > div,#medio > div').each( function (element,value) {
          $(value).addClass('col-xl-1 col-lg-2').removeClass('col-xl-4 col-lg-4');
        })
      }
      var id_parent = $(this).parent().parent().attr('id')
      $('.perfil_persona').not(this).toggleClass('grey_effect');
      // $(this).removeClass('grey_effect');
      e.preventDefault();
      $('.panel_lateral').toggleClass('show');
      switch (id_parent){
        case 'mejora':
          $('.alto,.medio').hide();
          $('.mejora').removeClass('col-12').addClass('col-5');
          $('#mejora > div').each( function (element,value) {
            console.log(element,value)
            $(value).addClass('col-xl-4 col-lg-4').removeClass('col-xl-1 col-lg-2');
          })
          break;
        case 'medio':
          $('.alto,.mejora').hide();
          $('.medio').removeClass('col-12').addClass('col-5');
          $('#medio > div').each( function (element,value) {
            console.log(element,value)
            $(value).addClass('col-xl-4 col-lg-4').removeClass('col-xl-1 col-lg-2');
          })
          break;
        case 'alto':
          $('.mejora,.medio').hide();
          $('.alto').removeClass('col-12').addClass('col-5');
          $('#alto > div').each( function (element,value) {
            console.log(element,value)
            $(value).addClass('col-xl-4 col-lg-4').removeClass('col-xl-1 col-lg-2');
          })
          break;
        default:
          $('#alto > div,#mejora > div,#medio > div').each( function (element,value) {
            console.log(element,value)
            $(value).addClass('col-xl-1 col-lg-2').removeClass('col-xl-4 col-lg-4');
          })
          break;
      }
    })
    $('.close_btn').click(function(e){
      e.preventDefault();
      $('.perfil_persona').removeClass('grey_effect')
      $('.panel_lateral').removeClass('show');
      $('.alto,.medio,.mejora').show();
      $('.alto,.medio,.mejora').addClass('col-12').removeClass('col-5');
      $('#alto > div,#mejora > div,#medio > div').each( function (element,value) {
        console.log(element,value)
        $(value).addClass('col-xl-1 col-lg-2').removeClass('col-xl-4 col-lg-4');
      })
    })

  
  }); // Close JQuery noConflict


var ctx2 = document.getElementById('chartPresupuesto');
var blue_color = "#17AEBF";
var blue_color_alpha = "#17AEBF7A";
var data = [8, 12, 20, 10, 20, 5];
var data2 = [10, 20, 5, 8, 20, 12 ];
Chart.defaults.global.legend.labels.usePointStyle = true;
if (ctx2) {
    var myChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['SEMANA 1', 'SEMANA 2', 'SEMANA 3', 'SEMANA 4', 'SEMANA 5'],
            datasets: [{
                label:'actividades asignadas',
                data: data,
                backgroundColor: [
                    blue_color,
                    blue_color,
                    blue_color,
                    blue_color,
                    blue_color,
                    blue_color,
                ],
                borderColor: [
                    blue_color
                ],
                borderWidth: 1,
                barThickness: 10,
                barPercentage: 0.5,
                // fill:false,
            },
            {
                label:'actividades finalizadas',
                data: data2,
                backgroundColor: [
                    red_color,
                    red_color,
                    red_color,
                    red_color,
                    red_color,
                    red_color,

                ],
                borderColor: [
                    blue_color
                ],
                borderWidth: 1,
                barThickness: 10,
                barPercentage: 0.5,
                // fill:false,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: false,
                    ticks: {
                        min: 5,
                        max: 30,
                        fontSize:10,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Cumplimiento',
                        fontStyle: 'bold',
                        fontSize:12,
                        fontColor:'#131a40',
                    },
                }],
                xAxes: [{
                    stacked: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Semana',
                        fontStyle: 'bold',
                        fontSize:12,
                        fontColor:'#131a40',
                    },
                    gridLines: {
                        display: false,
                        tickMarkLength: 8
                    },
                    ticks:{
                        fontSize:10,
                        fontColor:'#131a40',
                    },
                }]
            },
            legend: {
                // display: false
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 10,
                    bottom: 10
                }
            },
            aspectRatio:4,
        }
    });
}
  </script>
</body>