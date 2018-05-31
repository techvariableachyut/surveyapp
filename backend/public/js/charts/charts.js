//Get the context of the Chart canvas element we want to select
var ctx00 = $("#testchart");

// Chart Options
var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration:500,
};

// Chart Data
var chartData = {
    labels: ["question001", "question002", "question003", "question004", "question005"],
    datasets: [
        {
            data: ['Monitor 3', 20, 30, 3, 6]
        }
    ]
};

var config = {
    type: 'pie',

    // Chart Options
    options : chartOptions,

    data :chartData
};

// Create the chart
var pieChart = new Chart(ctx00, config);