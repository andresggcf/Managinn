var ctx = document.getElementById('myChart');
var blue_color = "#17AEBF";
var blue_color_alpha = "#17AEBF7A";
var data = [85, 40, 13, 50, 20, 30];
var dataComplement = []
data.forEach(function (element, index) {
    dataComplement.push(100 - element)
})
if (ctx) {
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Personas', 'Ideas', 'Prototipos', 'Sesiones', 'Clientes', 'Horas'],
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
                        callback: function (tick) {
                            return tick.toString() + '%';
                        }
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Porcentaje',
                        fontStyle: 'bold',
                    }
                }],
                xAxes: [{
                    stacked: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Métricas de entrada',
                        fontStyle: 'bold',
                    },
                    gridLines: {
                        display: false,
                        tickMarkLength: 8
                    },
                }]
            },
            legend: {
                display: false
            },
            layout: {
                padding: {
                    left: 50,
                    right: 30,
                    top: 30,
                    bottom: 50
                }
            }
        }
    });
}
