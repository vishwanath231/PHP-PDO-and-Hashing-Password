<?php


$server = "localhost";
$user = "root";
$pwd = "";
$dbname = "pdo";

// set DNS
$dns = 'mysql:host =' .$server . ';dbname='. $dbname;

try {
    // PDO Object creation
    $pdo = new PDO($dns, $user, $pwd);

    //Enable exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    
    //If there is an error, an exception is throw
    echo 'Database connection failed.';
    die();
}




?>