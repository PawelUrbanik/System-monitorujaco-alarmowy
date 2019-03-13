<?php

require("db_connect.php");
$sql = "SELECT * FROM sys_values ORDER BY id DESC LIMIT 1";

$response;

$result = $mysqli->query($sql);
if($result->num_rows >0)
{
    $response = array();
    while($row = $result->fetch_assoc()) { 
        $response['c1']=$row['c1'];
        $response['c2']=$row['c2'];
        $response['c3']=$row['c3'];
    }

    echo json_encode($response, JSON_NUMERIC_CHECK);
    //echo $response[0];

}else {
    echo "no rows";
}
?>