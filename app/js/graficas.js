var ctx = document.getElementById('myChart');
var blue_color = "#17AEBF";
var blue_color_alpha = "#17AEBF7A";
var red_color = "#eb5757";
var data = [85, 40, 13, 50, 20, 30];
var dataComplement = []
data.forEach(function (element, index) {
    dataComplement.push(100 - element)
})
if (ctx) {
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['PERSONAS', 'IDEAS', 'PROTOTIPOS', 'SESIONES', 'CLIENTES', 'HORAS'],
            datasets: [{
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
            },
            {
                data: dataComplement,
                backgroundColor: [
                    blue_color_alpha,
                    blue_color_alpha,
                    blue_color_alpha,
                    blue_color_alpha,
                    blue_color_alpha,
                    blue_color_alpha,

                ],
                borderColor: [
                    blue_color
                ],
                borderWidth: 1,
                barThickness: 10,
                barPercentage: 0.5,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true,
                    ticks: {
                        min: 0,
                        max: 100,
                        fontSize:16,
                        callback: function (tick) {
                            return tick.toString() + '%';
                        },
                        // padding:5
                        fontColor:'#131A40',
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Porcentaje',
                        fontStyle: 'bold',
                        fontSize:15,
                        fontColor:'#131A40',
                    },
                    
                }],
                xAxes: [{
                    stacked: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Métricas de entrada',
                        fontStyle: 'bold',
                        fontSize:15,
                        fontColor:'#131A40',
                    },
                    gridLines: {
                        display: false,
                        tickMarkLength: 8
                    },
                    ticks:{
                        fontSize:16,
                        fontColor:'#131A40',
                    },
                }]
            },
            legend: {
                display: false
            },
            layout: {
                padding: {
                    left: 54,
                    right: 30,
                    top: 28,
                    bottom: 28
                }
            }
        }
    });
}
// Grafica personas
var ctx2 = document.getElementById('chartDesempeno');
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
// Grafica personas
var ctx3 = document.getElementById('chartPresupuesto');
var blue_color = "#17AEBF";
var blue_color_alpha = "#17AEBF7A";
var data = [8, 12, 20, 10, 20];
var data2 = [10, 20, 5, 8, 20];
Chart.defaults.global.legend.labels.usePointStyle = true;
if (ctx3) {
    var myChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['SEMANA 1', 'SEMANA 2', 'SEMANA 3', 'SEMANA 4'],
            datasets: [{
                label:'Gasto Programado',
                data: data,
                borderColor: [
                    '#17AEBF'
                ],
                borderWidth: 1,
                barThickness: 10,
                barPercentage: 0.5,
                fill:false,
            },
            {
                label:'Gasto Real',
                data: data2,
                borderColor: [
                    '#eb5757'
                ],
                borderWidth: 1,
                barThickness: 10,
                barPercentage: 0.5,
                fill:false,
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
                        labelString: 'Millones de pesos',
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