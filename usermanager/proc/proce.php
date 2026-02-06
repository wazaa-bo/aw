<?php
session_start();
include "../db.php";

if($_POST){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $age=$_POST["age"];
    $rol=$_POST["rol"];
    $pass=$_POST["pass"];

    if(!empty($pass)){
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        $update=$pdo->prepare("UPDATE users SET name=?,email=?,age=?,rol=?,pass=? WHERE id=?");
        $update->execute([$name,$email,$age,$rol,$hash,$id]);
    } else {
        $update=$pdo->prepare("UPDATE users SET name=?,email=?,age=?,rol=? WHERE id=?");
        $update->execute([$name,$email,$age,$rol,$id]);
    }

    header("Location: ../list.php");
    exit;
}