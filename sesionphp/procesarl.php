<?php
session_start();

$user=$_POST['user'];
$password=$_POST['password'];
$users=file("users.txt",FILE_IGNORE_NEW_LINES);

$login_success=false;
foreach($users as $line){
    list($user_line,$hash)=explode(":",$line);
    if($user_line===$user && password_verify($password,$hash)){
        $login_success=true;
        $_SESSION['user']=$user;
        break;
    }
}
if($login_success){
    header("Location: wouu.php");
    exit;
} else{
    echo"<h1>User or password incorrect</h1>";
    echo"<p><a href='iniciarsesion.php'>Try again</a></p>";
}
