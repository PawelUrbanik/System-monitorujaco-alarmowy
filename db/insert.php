<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();
 
// Check if we got the field from the user
if (isset($_GET['c1']) && isset($_GET['c2'])&& isset($_GET['c3'])) {
 
    $c1 = $_GET['c1'];
    $c2 = $_GET['c2'];
    $c3 = $_GET['c3'];
 
    // Include data base connect class
    //$filepath = realpath (dirname(__FILE__));
	require("db_connect.php");
 
    // Fire SQL query to insert data in weather
    $sql = "INSERT INTO sys_values(c1,c2,c3) VALUES('$c1','$c2', '$c3')";
 
    // Check for succesfull execution of query
    if ($mysqli ->query($sql) === TRUE) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "Succesfully added";
 
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // Show JSON response
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