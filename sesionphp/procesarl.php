<?php
session_start();

$user=$_POST['user'];
$password=$_POST['password'];
$line=file("users.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$found=false;

foreach($line as $l){
    list($u,$hash)=explode(":",$l,2);
    
    if($u === $user){
        $found=true;
        if (password_verify($password,$hash)){
            $_SESSION['user']=$user;
            header("Location: wouu.php");
        } else {
           echo"Contraseña incorrecta";
        } 
        break;
    }
        
}
if (!$found){
    echo"Usuario no existe";
}
