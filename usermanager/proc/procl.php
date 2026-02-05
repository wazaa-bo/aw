<?php
session_start();
include "../db.php";
$error="";
if(isset($_SESSION['userid'])) {
    header("Location: ../main.php");
    exit;
}
if($_POST) {


    $login=$_POST["login"];
    $pass=$_POST["pass"];

    $stmt=$pdo->prepare("SELECT * FROM users WHERE name=? OR email=? OR id=?");
    $stmt->execute([$login,$login,$login]);
    $user=$stmt->fetch();

    if($user && password_verify($pass,$user['pass'])){
        $_SESSION['userid']=$user['id'];
        $_SESSION['username']=$user['name'];
        $_SESSION['rol']=$user['rol'];
        if($user['rol']=='admin'){
            header("Location: ../list.php");
        } else {
            header("Location: ../main.php");
        }
        exit;
        
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: ../login.php");;
    }
}