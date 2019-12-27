<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$response = array();
 
if (isset($_GET['c1']) && isset($_GET['c2'])&& isset($_GET['c3'])) {
 
    $c1 = $_GET['c1'];
    $c2 = $_GET['c2'];
    $c3 = $_GET['c3'];
 

	require("db_connect.php");
 
    $sql = "INSERT INTO sys_values(c1,c2,c3) VALUES('$c1','$c2', '$c3')";
 

    if ($mysqli ->query($sql) === TRUE) {
 
        $response["success"] = 1;
        $response["message"] = "Succesfully added";
 
        // JSON response
        echo json_encode($response);
    } else {
        // Failed to insert 
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // Show JSON response
    echo json_encode($response);
}
?>