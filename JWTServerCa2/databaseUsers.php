<?php

$dsn = 'mysql:host = localhost;dbname=jwtclient';
$username = 'root';
$password = '';

try {

    $dbUsers = new PDO($dsn, $username, $password);
    $dbUsers->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $dbUsers->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
} catch (PDOException $e) {
    
}
?>