<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'highcharts';

try {
    $dbcon = new PDO("mysql:host={$dbServer};dbname={$dbName}", $dbUser, $dbPassword);
    $dbcon ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex) {
        die($ex->getMessage());
}

$statement = $dbcon->prepare("SELECT * FROM highcharts");
$statement->execute();
$json=[];
while($row=$statement->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $json[]=[(string)$name, (int)$amount]; 
}
echo json_encode($json);
?>