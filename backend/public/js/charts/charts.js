
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
          //data:[5,10,15,20,25,30,35,40,45,50]
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
          data:[
            genderSources['Female']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
            genderSources['Male']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
            genderSources['Transgender']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
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
            labelString: "Percentage"
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
          data:[
            imageSources['Female']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
            imageSources['Male']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
            imageSources['Transgender']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
          ],
        }
      ]
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
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
            labelString: "Percentage"
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
          data:[
            genderAwareYes*100/(genderAwareYes+genderAwareNo),
            genderAwareNo*100/(genderAwareYes+genderAwareNo),
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
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
            labelString: "Percentage"
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
          data:[
            reporterProportion['Female']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']+reporterProportion['Unknown']),
            reporterProportion['Male']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']+reporterProportion['Unknown']),
            reporterProportion['Transgender']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']+reporterProportion['Unknown']),
            reporterProportion['Unknown']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']+reporterProportion['Unknown']),
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
          data:[
            presenterProportion['Female']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
            presenterProportion['Male']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
            presenterProportion['Transgender']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
            presenterProportion['Unknown']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
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
            labelString: "Percentage"
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
          //data: [m['Monitor 1'], m['Monitor 2'], m['Monitor 3'], m['Monitor 4'], m['Monitor 5'], m['Monitor 6'], m['Monitor 7'], m['Monitor 8'], m['Monitor 9'], m['Monitor 10']]
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
            labelString: "Percentage"
          }
        }]
      }
    }
});

var gSD = [
    genderSources['Female']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
    genderSources['Male']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
    genderSources['Transgender']*100/(genderSources['Male']+genderSources['Female']+genderSources['Transgender']),
];
var gSL = ["Female","Male","Transgender"];
var pieGenderSources = getPie("pie-chart-genderSources",gSL,gSD);


var gSDV = [
  genderSources['Female'],
  genderSources['Male'],
  genderSources['Transgender'],
];

var gSLV = ["Female","Male","Transgender"];
var pieGenderSourcesValue = getPie("pie-chart-genderSourcesValue",gSLV,gSDV);



var iSDV = [
    imageSources['Female']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
    imageSources['Male']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
    imageSources['Transgender']*100/(imageSources['Male']+imageSources['Female']+imageSources['Transgender']),
];

var iSLV = ["Female","Male","Transgender"];
var pieImageSourcesValue = getPie("pie-chart-imageSources",iSLV,iSDV);



var iSDV = [
    imageSources['Female'],
    imageSources['Male'],
    imageSources['Transgender']
];

var iSLV = ["Female","Male","Transgender"];
var pieImageSourcesValue = getPie("pie-chart-imageSourcesValue",iSLV,iSDV);

var gad = [
    genderAwareYes*100/(genderAwareYes+genderAwareNo),
    genderAwareNo*100/(genderAwareYes+genderAwareNo),
];

var gal = ["Yes","No"];
var gaf = getPie("piegenderAware",gal,gad);


var gadv = [
    genderAwareYes,
    genderAwareNo,
];

var galv = ["Yes","No"];
var gafv = getPie("piegenderAwareValue",galv,gadv);


var rPD = [
    reporterProportion['Female']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']+reporterProportion['Unknown']),
    reporterProportion['Male']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']+reporterProportion['Unknown']),
    reporterProportion['Transgender']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']+reporterProportion['Unknown']),
    reporterProportion['Unknown']*100/(reporterProportion['Male']+reporterProportion['Female']+reporterProportion['Transgender']+reporterProportion['Unknown']),
];

var rPL = ["Female","Male","Transgender","Unknown"];
var rPF = getPie("pieReporterProportion",rPL,rPD);

var rPDV = [
    reporterProportion['Female'],
    reporterProportion['Male'],
    reporterProportion['Transgender'],
    reporterProportion['Unknown'],
];

var rPLV = ["Female","Male","Transgender","Unknown"];
var rPFV = getPie("pieReporterProportionValue",rPLV,rPDV);

//Presenter Proportion

var pPD = [
    presenterProportion['Female']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
    presenterProportion['Male']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
    presenterProportion['Transgender']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
    presenterProportion['Unknown']*100/(presenterProportion['Male']+presenterProportion['Female']+presenterProportion['Transgender']+presenterProportion['Unknown']),
];

var pPL = ["Female","Male","Transgender","Unknown"];
var pPF = getPie("piePresenterProportion",pPL,pPD);


var pPDV = [
    presenterProportion['Female'],
    presenterProportion['Male'],
    presenterProportion['Transgender'],
    presenterProportion['Unknown'],
];

var pPLV = ["Female","Male","Transgender","Unknown"];
var pPFV = getPie("piePresenterProportionValue",pPLV,pPDV);

function getPie(id,l,d){
  var oilCanvas = document.getElementById(id);

  var oilData = {
      labels: l,
      datasets: [
          {
              data:d,
              backgroundColor: [
                  "#3e95cd","#8e5ea2","#3cba9f",
              ]
          }]
  };

  var pieChart = new Chart(oilCanvas, {
    type: 'pie',
    data: oilData
  });
}

console.log(0*100/0+0);