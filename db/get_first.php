<?php

require("db_connect.php");
$sql = "SELECT * FROM sys_values ORDER BY id DESC LIMIT 1";

$response = array();

$result = $mysqli->query($sql);
if($result->num_rows >0)
{
    for($i=0; $i< $result->num_rows; $i++)
    {
        $row = $result->fetch_assoc();
        $response['c1']=$row['c1'];
        $response['c2']=$row['c2'];
        $response['c3']=$row['c3'];
    }
}else {
    echo "no rows";
}
?>