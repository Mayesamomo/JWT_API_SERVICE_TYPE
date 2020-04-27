<?php

$dsn = 'mysql:host = localhost;dbname=jwtserver';
$username = 'root';
$password = '';

try {

    $dbServices = new PDO($dsn, $username, $password);
    $dbServices->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $dbServices->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
} catch (PDOException $e) {
    
}
?>