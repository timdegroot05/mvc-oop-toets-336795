<?php
include('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo "Er is een verbinging gemaakt met de mysql server";
    } else {
        echo "Er is een interne server error opgetreden";
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}