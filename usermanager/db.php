<?php
$host="localhost";
$dbname="usermanager";
$user="yo";
$pass="aBC123!";

try{
    $pdo= new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR DE CONEXIÓN:".$e->getMessage());
}
?>
