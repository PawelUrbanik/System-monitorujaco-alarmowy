<?php
$now_date = date('Y-m-d H:i:s ', time());
$hour_ago = date('Y-m-d H:i:s ', time() - 24*60*60);
require("db_connect.php");
$sql = "SELECT * FROM sys_values WHERE time BETWEEN '$hour_ago' AND '$now_date';";
//$sql = "SELECT * FROM sys_values;";

$responseTime = array();
$responseC1 = array();
$responseC2 = array();
$responseC3 = array();

$result = $mysqli->query($sql);
if($result->num_rows >0)
{
    for($i=0; $i<= $result->num_rows; $i++)
    {
        $row = $result->fetch_assoc();
        $responseTime[]=$row["time"];
        $responseC1[]=$row['c1'];
        $responseC2[]=$row['c2'];
        $responseC3[]=$row['c3'];
        
    }

    

}else {
    echo "no rows";
}
?>