<!DOCTYPE html>
<html>
    <head>
        <title> na stronę główną </title>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>  
    <body>
    <?php
    $values = array();
    require('../db/get_one.php');
    $values= $response;
    ?>
            <div id="container1" style="position:absolute; left:0px; top:20px height:400px"></div>
            <div id="container2" style="position:absolute; left:460px; top:20px height:400px"></div>
            <div id="container3" style="position:absolute; left:920px; top:20px height:400px"></div>
            <br>
            <div class="test">
            <h1 id="id1"></h1>
            </div>
            <!-- Czujnik temperatury wody użytkowej -->
            <script type="text/javascript">
            Highcharts.chart('container1', {
                
                  chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                  },
                
                  title: {
                    text: 'Temp. wody użytkowej'
                  },
                
                  pane: {
                    startAngle: -150,
                    endAngle: 150,
                    background: [{
                      backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                          [0, '#FFF'],
                          [1, '#333']
                        ]
                      },
                      borderWidth: 0,
                      outerRadius: '109%'
                    }, {
                      backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                          [0, '#333'],
                          [1, '#FFF']
                        ]
                      },
                      borderWidth: 1,
                      outerRadius: '107%'
                    }, {
                      // default background
                    }, {
                      backgroundColor: '#DDD',
                      borderWidth: 0,
                      outerRadius: '105%',
                      innerRadius: '103%'
                    }]
                  },
                
                  // the value axis
                  yAxis: {
                    min: 0,
                    max: 120,
                
                    minorTickInterval: 'auto',
                    minorTickWidth: 1,
                    minorTickLength: 10,
                    minorTickPosition: 'inside',
                    minorTickColor: '#666',
                
                    tickPixelInterval: 30,
                    tickWidth: 2,
                    tickPosition: 'inside',
                    tickLength: 10,
                    tickColor: '#666',
                    labels: {
                      step: 2,
                      rotation: 'auto'
                    },
                    title: {
                      text: 'C'
                    },
                    plotBands: [{
                      from: 0,
                      to: 80,
                      color: '#55BF3B' // green
                    }, {
                      from: 80,
                      to: 95,
                      color: '#DDDF0D' // yellow
                    }, {
                      from: 95,
                      to: 120,
                      color: '#DF5353' // red
                    }]
                  },
                
                  series: [{
                    name: 'Temperatura',
                    data: [<?php echo $values['c1'] ?>],
                    tooltip: {
                      valueSuffix: ' C'
                    }
                  }]
                
                },
                // Add some life
                
                function (chart) {
                  if (!chart.renderer.forExport) {
                    var newVal;
                    setInterval(function () {
                      $.getJSON('../db/get_one.php', function(data) {
                        //myValue.innerHTML(data.c1);
                        newVal = data.c1;
                        console.log(newVal);
                        var point = chart.series[0].points[0],
                        newVal;
                        if (newVal < 0 || newVal > 100) {
                        newVal = 0;
                        }
                        point.update(newVal);
                      });                      
                    }, 5000);
                  }
                }
                );
            </script>

<script type="text/javascript">
            Highcharts.chart('container2', {
                
                  chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                  },
                
                  title: {
                    text: 'Temp. wody kotła'
                  },
                
                  pane: {
                    startAngle: -150,
                    endAngle: 150,
                    background: [{
                      backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                          [0, '#FFF'],
                          [1, '#333']
                        ]
                      },
                      borderWidth: 0,
                      outerRadius: '109%'
                    }, {
                      backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                          [0, '#333'],
                          [1, '#FFF']
                        ]
                      },
                      borderWidth: 1,
                      outerRadius: '107%'
                    }, {
                      // default background
                    }, {
                      backgroundColor: '#DDD',
                      borderWidth: 0,
                      outerRadius: '105%',
                      innerRadius: '103%'
                    }]
                  },
                
                  // the value axis
                  yAxis: {
                    min: 0,
                    max: 120,
                
                    minorTickInterval: 'auto',
                    minorTickWidth: 1,
                    minorTickLength: 10,
                    minorTickPosition: 'inside',
                    minorTickColor: '#666',
                
                    tickPixelInterval: 30,
                    tickWidth: 2,
                    tickPosition: 'inside',
                    tickLength: 10,
                    tickColor: '#666',
                    labels: {
                      step: 2,
                      rotation: 'auto'
                    },
                    title: {
                      text: 'C'
                    },
                    plotBands: [{
                      from: 0,
                      to: 80,
                      color: '#55BF3B' // green
                    }, {
                      from: 80,
                      to: 95,
                      color: '#DDDF0D' // yellow
                    }, {
                      from: 95,
                      to: 120,
                      color: '#DF5353' // red
                    }]
                  },
                
                  series: [{
                    name: 'Temperatura',
                    data: [<?php echo $values['c2'] ?>],
                    tooltip: {
                      valueSuffix: ' C'
                    }
                  }]
                
                },
                // Add some life
                function (chart) {
                  if (!chart.renderer.forExport) {
                    var newVal;
                    setInterval(function () {
                      $.getJSON('../db/get_one.php', function(data) {
                        //myValue.innerHTML(data.c1);
                        newVal = data.c2;
                        console.log(newVal);
                        var point = chart.series[0].points[0],
                        newVal;
                        if (newVal < 0 || newVal > 100) {
                        newVal = 0;
                        }
                        point.update(newVal);
                      });                      
                    }, 6200);
                  }
                }
                );
            </script>
            <script type="text/javascript">
            Highcharts.chart('container3', {
                
                  chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                  },
                
                  title: {
                    text: 'Temp. wody grzewczej'
                  },
                
                  pane: {
                    startAngle: -150,
                    endAngle: 150,
                    background: [{
                      backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                          [0, '#FFF'],
                          [1, '#333']
                        ]
                      },
                      borderWidth: 0,
                      outerRadius: '109%'
                    }, {
                      backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                          [0, '#333'],
                          [1, '#FFF']
                        ]
                      },
                      borderWidth: 1,
                      outerRadius: '107%'
                    }, {
                      // default background
                    }, {
                      backgroundColor: '#DDD',
                      borderWidth: 0,
                      outerRadius: '105%',
                      innerRadius: '103%'
                    }]
                  },
                
                  // the value axis
                  yAxis: {
                    min: 0,
                    max: 120,
                
                    minorTickInterval: 'auto',
                    minorTickWidth: 1,
                    minorTickLength: 10,
                    minorTickPosition: 'inside',
                    minorTickColor: '#666',
                
                    tickPixelInterval: 30,
                    tickWidth: 2,
                    tickPosition: 'inside',
                    tickLength: 10,
                    tickColor: '#666',
                    labels: {
                      step: 2,
                      rotation: 'auto'
                    },
                    title: {
                      text: 'C'
                    },
                    plotBands: [{
                      from: 0,
                      to: 80,
                      color: '#55BF3B' // green
                    }, {
                      from: 80,
                      to: 95,
                      color: '#DDDF0D' // yellow
                    }, {
                      from: 95,
                      to: 120,
                      color: '#DF5353' // red
                    }]
                  },
                
                  series: [{
                    name: 'Temperatura',
                    data: [<?php echo $values['c3'] ?>],
                    tooltip: {
                      valueSuffix: ' C'
                    }
                  }]
                
                },
                // Add some life
                function (chart) {
                  if (!chart.renderer.forExport) {
                    var newVal;
                    setInterval(function () {
                      $.getJSON('../db/get_one.php', function(data) {
                        //myValue.innerHTML(data.c1);
                        newVal = data.c3;
                        console.log(newVal);
                        var point = chart.series[0].points[0],
                        newVal;
                        if (newVal < 0 || newVal > 100) {
                        newVal = 0;
                        }
                        point.update(newVal);
                      });                      
                    }, 7400);
                  }
                }
                );
            </script>
    </body>  
</html>

