<?php
// Database connection
$host = 'localhost'; //atau  bisa digunakan 127.0.01
$user = 'furdoor adventure db';
$pass = 'root'; //Default untuk MySQL lokal
$charset = 'utf8mb4';

$dsn = "mysql:host=4host;dbname=$db;charset=$charset";
$option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false, 
];

try{
    $pdo = new PDO($dns, $user, $pass, $options);
}catch (PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}