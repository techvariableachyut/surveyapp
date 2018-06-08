var steps = 3;
var m = JSON.parse(monitors);
var genderSources = JSON.parse(genderSources);
var imageSources = JSON.parse(imageSources);
var reporterProportion = JSON.parse(reporterProportion);
var presenterProportion = JSON.parse(presenterProportion);
var genderAwareYes = parseInt(genderAwareYes);
var genderAwareNo = parseInt(genderAwareNo);
// Bar chart
new Chart(document.getElementById("bar-chart-monitors"), {
    type: 'bar',
    data: {
      labels: ["Monitor 1","Monitor 2","Monitor 3","Monitor 4", "Monitor 5", "Monitor 6", "Monitor 7", "Monitor 8", "Monitor 9", "Monitor 10"],
      datasets: [
        {
          label: "Responses by each monitor",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Responses by each monitor"
      }
    }
});

new Chart(document.getElementById("bar-chart-genderSources"), {
    type: 'bar',
    data: {
      labels: ["Female", "Male", "Transgender"],
      datasets: [
        {
          label: "Sources by gender",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data:[
            genderSources['Female']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
            genderSources['Male']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
            genderSources['Transgender']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
          ],
        }
      ],
      datacol:[{
        data:[
          genderSources['Female'],genderSources['Male'],genderSources['Transgender']
        ]
      }]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Responses by each monitor"
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          
          var height = chartInstance.controller.boxes[0].bottom;
          ctx.textAlign = "center";
          Chart.helpers.each(this.data.datacol.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index], bar._model.x, height - ((height - bar._model.y) / 1.1));
            }),this)
          }),this);
        }
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0,
            max: 100,
            callback: function(value){return value+ "%"}
          },  
          scaleLabel: {
            display: true,
            labelString: "Percentage"
          }
        }]
      }
    }
});

new Chart(document.getElementById("bar-chart-genderSourcesValue"), {
    type: 'bar',
    data: {
      labels: ["Female", "Male", "Transgender"],
      datasets: [
        {
          label: "Sources by gender",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data:[
            genderSources['Female'],
            genderSources['Male'],
            genderSources['Transgender'],
          ],
        }
      ],
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Responses by each monitor"
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0,
          },  
          scaleLabel: {
            display: true,
            labelString: "Number"
          }
        }]
      }
    }
});

new Chart(document.getElementById("bar-chart-imageSources"), {
    type: 'bar',
    data: {
      labels: ["Female", "Male", "Transgender"],
      datasets: [
        {
          label: "Sources by images",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data:[
            imageSources['Female']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
            imageSources['Male']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
            imageSources['Transgender']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
          ],
        }
      ],
      datacol:[{
        data:[
          imageSources['Female'],imageSources['Male'],imageSources['Transgender']
        ]
      }]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Sources by images"
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          
          var height = chartInstance.controller.boxes[0].bottom;
          ctx.textAlign = "center";
          Chart.helpers.each(this.data.datacol.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index], bar._model.x, height - ((height - bar._model.y) / 1.1));
            }),this)
          }),this);
        }
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0,
            max: 100,
            callback: function(value){return value+ "%"}
          },  
          scaleLabel: {
            display: true,
            labelString: "Percentage"
          }
        }]
      }
    }
});

new Chart(document.getElementById("bar-chart-imageSourcesValue"), {
    type: 'bar',
    data: {
      labels: ["Female", "Male", "Transgender"],
      datasets: [
        {
          label: "Sources by images",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data:[
            imageSources['Female'],
            imageSources['Male'],
            imageSources['Transgender'],
          ],
        }
      ],
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Sources by images"
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0,
          },  
          scaleLabel: {
            display: true,
            labelString: "Number"
          }
        }]
      }
    }
});

new Chart(document.getElementById("genderAware"), {
    type: 'bar',
    data: {
      labels: ["Yes", "No"],
      datasets: [
        {
          label: "Gender Aware",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data:[
            genderAwareYes*100/(genderAwareYes+genderAwareNo),
            genderAwareNo*100/(genderAwareYes+genderAwareNo),
          ],
        }
      ],
      datacol:[{
        data:[
          genderAwareYes,genderAwareNo
        ]
      }]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Gender Aware"
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          
          var height = chartInstance.controller.boxes[0].bottom;
          ctx.textAlign = "center";
          Chart.helpers.each(this.data.datacol.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index], bar._model.x, height - ((height - bar._model.y) / 1.1));
            }),this)
          }),this);
        }
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0,
            max: 100,
            callback: function(value){return value+ "%"}
          },  
          scaleLabel: {
            display: true,
            labelString: "Percentage"
          }
        }]
      }
    }
});

new Chart(document.getElementById("genderAwareValue"), {
    type: 'bar',
    data: {
      labels: ["Yes", "No"],
      datasets: [
        {
          label: "Gender Aware",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data:[
            genderAwareYes,
            genderAwareNo,
          ],
        }
      ],
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Gender Aware"
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0
          },  
          scaleLabel: {
            display: true,
            labelString: "Number"
          }
        }]
      }
    }
});

new Chart(document.getElementById("reporterProportion"), {
    type: 'bar',
    data: {
      labels: ["Female", "Male", "Transgender", "Unknown"],
      datasets: [
        {
          label: "Reporter Proportion",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#3bsd9f"],
          data:[
            reporterProportion['Female']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']),
            reporterProportion['Male']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']),
            reporterProportion['Transgender']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']),
            reporterProportion['Unknown']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']),
          ],
        }
      ],
      datacol:[{
        data:[
          reporterProportion['Female'],reporterProportion['Male'],reporterProportion['Transgender'],reporterProportion['Unknown']
        ]
      }]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Reporter proportion"
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          
          var height = chartInstance.controller.boxes[0].bottom;
          ctx.textAlign = "center";
          Chart.helpers.each(this.data.datacol.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index], bar._model.x, height - ((height - bar._model.y) / 1.1));
            }),this)
          }),this);
        }
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0,
            max: 100,
            callback: function(value){return value+ "%"}
          },  
          scaleLabel: {
            display: true,
            labelString: "Percentage"
          }
        }]
      }
    }
});

new Chart(document.getElementById("presenterProportion"), {
    type: 'bar',
    data: {
      labels: ["Female", "Male", "Transgender", "Unknown"],
      datasets: [
        {
          label: "Reporter Proportion",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#3bsd9f"],
          data:[
            presenterProportion['Female']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']),
            presenterProportion['Male']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']),
            presenterProportion['Transgender']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']),
            presenterProportion['Unknown']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
          ],
        }
      ],
      datacol:[{
        data:[
          presenterProportion['Female'],presenterProportion['Male'],presenterProportion['Transgender'],presenterProportion['Unknown']
        ]
      }]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Reporter proportion"
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          var height = chartInstance.controller.boxes[0].bottom;
          ctx.textAlign = "center";
          Chart.helpers.each(this.data.datacol.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index], bar._model.x, height - ((height - bar._model.y) / 1.1));
            }),this)
          }),this);
        }
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0,
            max: 100,
            callback: function(value){return value+ "%"}
          },  
          scaleLabel: {
            display: true,
            labelString: "Percentage"
          }
        }]
      }
    }
});


new Chart(document.getElementById("reporterProportionValue"), {
    type: 'bar',
    data: {
      labels: ["Female", "Male", "Transgender", "Unknown"],
      datasets: [
        {
          label: "Reporter Proportion",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#3bsd9f"],
          data:[
            reporterProportion['Female'],
            reporterProportion['Male'],
            reporterProportion['Transgender'],
            reporterProportion['Unknown'],
          ],
        }
      ],
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Reporter proportion"
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0,
          },  
          scaleLabel: {
            display: true,
            labelString: "Number"
          }
        }]
      }
    }
});

new Chart(document.getElementById("presenterProportionValue"), {
    type: 'bar',
    data: {
      labels: ["Female", "Male", "Transgender", "Unknown"],
      datasets: [
        {
          label: "Reporter Proportion",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#3bsd9f"],
          data:[
            presenterProportion['Female'],
            presenterProportion['Male'],
            presenterProportion['Transgender'],
            presenterProportion['Unknown'],
          ],
        }
      ],
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "Reporter proportion"
      },
      scales: {            
        yAxes: [{
          ticks: {         
            min: 0
          },  
          scaleLabel: {
            display: true,
            labelString: "Number"
          }
        }]
      }
    }
});
