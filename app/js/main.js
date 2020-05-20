$.noConflict();
jQuery(document).ready(function ($) {
  $('#Sin-Metricas #Boton-Preferencias').click(function () {
    $('#Crear-Implementacion').css('display', 'block');
    $('#Sin-Metricas').css('display', 'none');
    $('.Blanco-Fondo').addClass('general_bg')

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
          $(".items_progreso li:nth-child(2)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
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
          $(".items_progreso li:nth-child(2)>div").addClass("circulo-actual").removeClass("Circulo-Progreso circulo-pasado");
          $(".items_progreso li:nth-child(3)>div").addClass("Circulo-Progreso").removeClass("circulo-actual circulo-pasado");
          break;
        case 2:
          bar.css('width', "100%");
          $(".items_progreso li:nth-child(2)>div").addClass("circulo-pasado").removeClass("circulo-actual");
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
  var tasa_conversion = 15;
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
  $("#escalamiento").text(escalamiento);
  $("#tasa_conversion").text(tasa_conversion);
  $("#dias_activos").text(dias_activos);
  $("#presupuesto_usado").text(presupuesto_usado);
  $("#total_presupuesto_usado").text(total_presupuesto_usado);
  $("#valor_actual_neto").text(valor_actual_neto);
  $("#personas_capacitadas_relacion").text(personas_capacitadas_relacion);
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
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
      {
        nombre:'Jorge Castaño Valencia',
        cargo:'Recursos',
        img:'img/iconos/avatar_hombre.svg'
      },
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
      {
        nombre:'Jorge Castaño Valencia',
        cargo:'Recursos',
        img:'img/iconos/avatar_hombre.svg'
      },
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
      {
        nombre:'Jorge Castaño Valencia',
        cargo:'Recursos',
        img:'img/iconos/avatar_hombre.svg'
      },
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
      {
        nombre:'Jorge Castaño Valencia',
        cargo:'Recursos',
        img:'img/iconos/avatar_hombre.svg'
      },
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
      {
        nombre:'Jorge Castaño Valencia',
        cargo:'Recursos',
        img:'img/iconos/avatar_hombre.svg'
      },
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
      {
        nombre:'Jorge Castaño Valencia',
        cargo:'Recursos',
        img:'img/iconos/avatar_hombre.svg'
      },
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
      {
        nombre:'Jorge Castaño Valencia',
        cargo:'Recursos',
        img:'img/iconos/avatar_hombre.svg'
      },
    ],
    'medio':[],
    'alto':[
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
      {
        nombre:'Jorge Castaño Valencia',
        cargo:'Recursos',
        img:'img/iconos/avatar_hombre.svg'
      },
      {
        nombre:'Paula Muñoz Vergara',
        cargo:'Desarrollo',
        img:'img/iconos/avatar_mujer.svg'
      },
    ]

  }
  // Agregar personas
  function agregarPersonas(){
    $('#mejora').empty();
    personas.mejora.forEach(element => {
      $('#mejora').append(
        `<div class="col-xl-1 col-lg-2 col-md-6">
          <div class="perfil_persona">
            <img class="img-fluid" src="${element.img}" alt="">
            <div class="nombre">${element.nombre}</div>
            <div class="cargo">${element.cargo}</div>
          </div>
        </div>`
      );
    });
    $('#alto').empty();
    personas.alto.forEach(element => {
      $('#alto').append(
        `<div class="col-xl-1 col-lg-2 col-md-6">
          <div class="perfil_persona">
            <img class="img-fluid" src="${element.img}" alt="">
            <div class="nombre">${element.nombre}</div>
            <div class="cargo">${element.cargo}</div>
          </div>
        </div>`
      ).show();
    });
  }
  agregarPersonas();
  

  // Abrir perfil de persona
  $('.perfil_persona').click(function(e){
    console.log('click')
    $('.perfil_persona').not(this).toggleClass('grey_effect');
    if($('.panel_lateral').hasClass('show')){
      $('.perfil_persona').removeClass('grey_effect')
    }
    // $(this).removeClass('grey_effect');
    e.preventDefault();
    $('.panel_lateral').toggleClass('show');
  })
  $('.close_btn').click(function(e){
    e.preventDefault();
    $('.perfil_persona').removeClass('grey_effect')
    $('.panel_lateral').removeClass('show')
  })

  /**
   * Presupuesto
   */
  $('.datepicker').datepicker({
    language: 'es'
  });
  $('#ex1').slider({
    formatter: function(value) {
      return numeral(value).format('$ 0,0[.]00');
    }
  });

}); // Close JQuery noConflict

