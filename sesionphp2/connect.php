<?php
$host="localhost";
$user="yo";
$pass="aBC123!";
$db="weiss_db1";

$conn= new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) {
    die("Error de conexión:".$conn->connect_error);
}
?>