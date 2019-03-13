<?php

require("db_connect.php");
$sql = "SELECT * FROM sys_values ORDER BY id DESC LIMIT 288";

$response = array();

$result = $mysqli->query($sql);
if($result->num_rows >0)
{
    while($row = $result->fetch_assoc()) { 
        $response['id'] =$row["id"];
        $response['c1'] =$row["c1"];
        $response['c2'] =$row["c2"];
        $response['c3'] =$row["c3"];

        echo json_encode($response);
        echo "<br>";
    }

    

}else {
    echo "no rows";
}
?>