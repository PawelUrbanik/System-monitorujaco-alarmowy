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
    require('db/get_first.php');
    $values= $response;
    //echo $values;
    ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
			    <div class="center page-header">
				<h1 class="text-center">
					Temperatura wody
				</h1>
      </div>
      <div class="row">
            <div id="container1" class="col-sm-4 col-xs-12 col-left" style="height:400px" ></div>
            <div id="container2" class="col-sm-4 col-xs-12 col-center" style="height:400px"></div>
            <div id="container3" class="col-sm-4 col-xs-12 col-right" style="height:400px"></div>
            <br>
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
                    max: 100,
                
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
                      to: 60,
                      color: '#55BF3B' // green
                    }, {
                      from: 60,
                      to: 75,
                      color: '#DDDF0D' // yellow
                    }, {
                      from: 75,
                      to: 100,
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
                      $.getJSON('db/get_one.php', function(data) {
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
                    }, 30000);
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
                    max: 100,
                
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
                      to: 60,
                      color: '#55BF3B' // green
                    }, {
                      from: 60,
                      to: 75,
                      color: '#DDDF0D' // yellow
                    }, {
                      from: 75,
                      to: 100,
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
                      $.getJSON('db/get_one.php', function(data) {
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
                    }, 30600);
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
                    max: 100,
                
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
                      to: 60,
                      color: '#55BF3B' // green
                    }, {
                      from: 60,
                      to: 75,
                      color: '#DDDF0D' // yellow
                    }, {
                      from: 75,
                      to: 100,
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
                      $.getJSON('db/get_one.php', function(data) {
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
                    }, 300900);
                  }
                }
                );
            </script>
      </div>
      </div>      
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>        
    </body>  
</html>

