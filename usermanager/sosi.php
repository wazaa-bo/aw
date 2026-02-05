<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sosi.css">
    <link rel="stylesheet" href="css/anim.css">
    <title>Sosis</title>
</head>
<body>
<div class="container">
    <h1 class="beat-effect">Gestión de usuarios</h1> <br>
    <a href="list.php">CRUD(ADMIN)</a>
    <a href="create.php">SIGNUP</a>
    <a href="login.php">LOGIN</a>
    <a href="main.php">PARA USUARIOS</a>
</div>
<audio autoplay loop id="audio">
    <source src="./audio/13.mp3" type="audio/mpeg">
</audio>
<script src="js/audio.js"></script>
</body>
</html>