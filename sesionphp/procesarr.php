<?php
$user=$_POST['user'];
$password=$_POST['password'];

$file=fopen("users.txt","a");
fwrite($file,$user.":".password_hash($password,PASSWORD_DEFAULT). "\n");
fclose($file);

echo"<h1> Usuario registrado correctamente</h1>";
echo"<p> <a href='iniciarsesion.php'>Log in</a> </p>";
