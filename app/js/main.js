$('#Sin-Metricas #Boton-Preferencias').click(function(){
    $('#Crear-Implementacion').css('display','block');
    $('#Sin-Metricas').css('display','none');

})

$('#less_persons').click(function(e){
    e.preventDefault()
    var num_persons = parseInt($('#num_persons').val());
    num_persons--;
    if(num_persons>0){
        $('#num_persons').val(num_persons)
    }
})
$('#more_persons').click(function(e){
    e.preventDefault()
    var num_persons = parseInt($('#num_persons').val());
    num_persons++;
    $('#num_persons').val(num_persons)
})

$('#less_persons_cap').click(function(e){
    e.preventDefault()
    var num_persons = parseInt($('#num_persons_cap').val());
    num_persons--;
    if(num_persons>0){
        $('#num_persons_cap').val(num_persons)
    }
})
$('#more_persons_cap').click(function(e){
    e.preventDefault()
    var num_persons = parseInt($('#num_persons_cap').val());
    num_persons++;
    $('#num_persons_cap').val(num_persons)
})

$('input[type=number]').change(function(){
    var valueNumber = $(this).val();
    console.log(valueNumber)
    valueNumber = parseInt(valueNumber);
    valueNumber = (!isNaN(valueNumber) )? valueNumber:0;
    console.log(valueNumber)
    $(this).val(valueNumber)
  }); 

  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    var bar = $(".progress-bar");
    switch (n){
        case 0:
            bar.css('width',"0%");
            $(".items_progreso li:nth-child(1)>div").addClass("circulo-actual" ).removeClass( "Circulo-Progreso");
            $(".items_progreso li:nth-child(2)>div").addClass( "Circulo-Progreso" ).removeClass("circulo-actual");
            $(".items_progreso li:nth-child(3)>div").addClass( "Circulo-Progreso" ).removeClass("circulo-actual");
            break;
      case 1:
        bar.css('width',"25%");
        $(".items_progreso li:nth-child(1)>div").addClass("circulo-actual" ).removeClass( "Circulo-Progreso");
        $(".items_progreso li:nth-child(2)>div").addClass( "Circulo-Progreso" ).removeClass("circulo-actual");
        $(".items_progreso li:nth-child(3)>div").addClass( "Circulo-Progreso" ).removeClass("circulo-actual");
        console.log(n)
        break;
      case 2:
        bar.css('width',"50%");
        $(".items_progreso li:nth-child(1)>div").addClass( "Circulo-Progreso" ).removeClass("circulo-actual");
        $(".items_progreso li:nth-child(2)>div").addClass("circulo-actual" ).removeClass( "Circulo-Progreso");
        $(".items_progreso li:nth-child(3)>div").addClass( "Circulo-Progreso" ).removeClass("circulo-actual");
        console.log(n)
        break;
      case 3:
        bar.css('width',"100%");
        $(".items_progreso li:nth-child(2)>div").addClass( "Circulo-Progreso" ).removeClass("circulo-actual");
        $(".items_progreso li:nth-child(3)>div").addClass("circulo-actual" ).removeClass( "Circulo-Progreso");
        console.log(n)
        break;
      default: 
      console.log(n,bar);
    }
  }
  

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n > 1) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
      //...the form gets submitted:
      console.log('final')
      // document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }