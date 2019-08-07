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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
<?php 
$rows = array();
require('..\db\get_day.php');
//echo count($responseC1);
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
<?php require(dirname(__FILE__).'/../nav.php') ?>
<?php if($responseTime == null)
{
    ?>
    <div class="text-center text-muted">
    <h1>
        <br>
        Brak danych z czujników z ostatnich 24 godzin
    </h1>
</div><?php
}else {
    ?>
    <div class="container">
        <div class="row">
            <div id='container' class="col-sm-12 col-xs-12"></div>
        </div> 
    </div>
     <?php
}
?>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'line',
        zoomType: 'x'
    },
    title: {
        text: 'Temperatura ostatniej doby'
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
            echo '\''. date('H:i', $time) . '\'';
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
    tooltip: {
        valueSuffix: ' C'
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

