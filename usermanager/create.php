<?php
session_start();
include "db.php";

define('key','aBC123!');

if($_POST){
    $name=$_POST["name"];
    $pass=$_POST["pass"];
    $hash=password_hash($pass,PASSWORD_DEFAULT);

    $email=$_POST["email"];
    $age=$_POST["age"];
    $rol=$_POST["rol"];

    if($rol=='admin') {
        $adminlog=(isset($_SESSION['rol'])&& $_SESSION['rol']=='admin');
        $keylog=(isset($_POST['akey'])&& $_POST['akey']==key);

        if(!$adminlog && !$keylog) {
            echo"<script>alert('Para crear un administrador necesitas ser uno o introducir una clave'); window.history.back();</script>";
            exit;
        }
    }
    $stmt=$pdo->prepare("INSERT INTO users(name,pass,email,age,rol) VALUES (?,?,?,?,?)");
    $stmt->execute([$name,$hash,$email,$age,$rol]);

    header("Location:list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/create.css">
    <link rel="stylesheet" href="css/anim.css">
    <title>Create user</title>
</head>
<body>
<div class="formulario">
    <h1 class="beat-effect">Create user</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="password" name="pass" placeholder="Password" required> <br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="number" name="age" placeholder="Age" required><br>
        <select name="rol" id="rolselect">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select> <br>
        <div id="adminkey" style="display: none;">
            <input type="password" name="akey" placeholder="Key">
            <small>Requerido si no estás logeado como Admin</small>
        </div>
        <button type="submit">Crear usuario</button>
    </form>
    <a href="javascript:history.back()" class="back">
        <img src="./css/img/icon/back.png" alt="Back" style="width:40px">
    </a>
</div>
<audio autoplay loop id="audio">
    <source src="./audio/13.mp3" type="audio/mpeg">
</audio>
<script src="js/akey.js"></script>
<script src="js/audio.js"></script>
<script src="js/vali.js"></script>
</body>
</html>