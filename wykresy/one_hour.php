<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Temperatura ostatniej godziny</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body>
<?php 
$rows = array();
require('../db/get_hour.php');
//echo count($responseTime);
/*for($i=0; $i< count($responseTime); $i++)
        {
            $hour = $responseTime[$i];
            echo "<br>";    
            $hours = new DateTime($hour);
            //echo $hours->format('H:i:s');
            //echo "<br>";
            //echo '\''. $hours->format('H:m:s') . '\'';
            echo ', ';
        }*/
?>

<div id='container'></div>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Temperatura ostatniej godziny'
    },
    subtitle: {
        //text: 'Wykres'
    },
    xAxis: {
        categories:
        [<?php 

        for($i=0; $i< count($responseTime); $i++)
        {
            $time = $responseTime[$i];
            $time = strtotime($time);
            echo '\''. date('H:i:s', $time) . '\'';
            echo ', ';
        }
        ?>]
    },
    yAxis: {
        title: {
            text: 'Temperatura (°C)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Temperatura wody użytkowej',
        data:
        [<?php 

        for($i=0; $i< count($responseC1); $i++)
        {
            echo $responseC1[$i] ;
            echo ', ';
        }
        ?>]
    }, {
        name: 'Temperatura wody kotła',
        data:
        [<?php 

        for($i=0; $i< count($responseC2); $i++)
        {
            echo $responseC2[$i];
            echo ', ';
        }
        ?>]
    }, {
        name: 'Temperatura wody grzewczej',
        data:
        [<?php 

        for($i=0; $i< count($responseC3); $i++)
        {
            echo $responseC3[$i];
            echo ', ';
        }
        ?>]
    }]
});
</script>
</body>
</html>

