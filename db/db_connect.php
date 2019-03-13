<?php

$dbServer = 'mydb.csyo5qvpz6zw.eu-central-1.rds.amazonaws.com';
$dbUser = 'adminRDS';
$dbPassword = 'RDSadmin';
$dbName = 'system_a';

$mysqli = new mysqli($dbServer,$dbUser, $dbPassword, $dbName);
$mysqli ->set_charset('utf8');
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
?>