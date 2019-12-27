<?php

require('db_config.php');
$dbServer = DB_SERVER;
$dbUser = DB_USER;
$dbPassword = DB_PASSWORD;
$dbName = DB_DATABASE;
$port =3306;

$mysqli = new mysqli($dbServer,$dbUser, $dbPassword, $dbName, $port);
$mysqli ->set_charset('utf8');
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
?>