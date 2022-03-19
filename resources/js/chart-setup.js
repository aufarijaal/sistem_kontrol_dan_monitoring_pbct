var ctx = document.getElementById("chartStat").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["07/03", "08/03", "09/03", "10/03", "11/03", "12/03", "13/03"],
        datasets: [{
            data: [2.0, 1.0, 0.8, 0.6, 0.4, 0.2, 0],
            backgroundColor: '#5893FA',
            borderColor: '#5893FA',
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
