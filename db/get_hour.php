<?php
$date = date('Y-m-d H:i:s ', time());
$lastHour = date('Y-m-d H:i:s ', time() - 60*60);

require("db_connect.php");
$sql = "SELECT * FROM sys_values WHERE time BETWEEN '$lastHour' AND '$date';";

$responseTime = array();
$responseC1 = array();
$responseC2 = array();
$responseC3 = array();

$result = $mysqli->query($sql);
//echo $result->num_rows;
if($result->num_rows >0)
{

    for($i=0; $i<= $result->num_rows; $i++)
    {
        $row = $result->fetch_assoc();
        $responseTime[]=$row["time"];
        $responseC1[]=$row['c1'];
        $responseC2[]=$row['c2'];
        $responseC3[]=$row['c3'];
        //echo $responseTime[$i];
        //echo "<br>";
    }

    /*while($row = $result->fetch_assoc()) { 
        //$response['id'] =$row["id"];
        $responseTime[]=$row["time"];
        $response["c1"] =$row["c1"];
        $response["c2"] =$row["c2"];
        $response["c3"] =$row["c3"];
        //echo json_encode($response, JSON_NUMERIC_CHECK );
        //echo '<br>';
    }*/
        //echo $responseTime[1];
        //echo json_encode($response );
        //echo $response;
        //echo "<br>";
    

    

}else {
    echo "no rows";
}
?>