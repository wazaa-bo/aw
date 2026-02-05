<?php
session_start();
include "db.php";
if(!isset($_SESSION['userid'])) {
    header("Location:login.php");
    exit;
}
if($_SESSION['rol']!=='admin'){
    header("Location:main.php");
    exit;
}
$stmt=$pdo->query("SELECT * FROM users");
$users=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/anim.css">
    <title>List</title>
</head>
<body>
<div class="contenedor">
    <h1 class="beat-effect">Users</h1>
    <a href="create.php" class="btn">Crear usuario</a>

    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Rol</th><th>Actions</th>
        </tr>
        <?php foreach($users as $u):?>
        <tr>
            <td><?=$u['id']?></td>
            <td><?=$u['name']?></td>
            <td><?=$u['email']?></td>
            <td><?=$u['age']?></td>
            <td><?=$u['rol']?></td>
            <td>
                <a href="edit.php?id=<?=$u['id']?>" class="btnedit">Editar</a>
                <a href="del.php?id=<?=$u['id']?>" class="btndel">Eliminar</a>
            </td>
        </tr>
        <?php endforeach;?>
        
    </table>
    <a href="javascript:history.back()" class="back">
        <img src="./css/img/icon/back.png" alt="Back" style="width:40px">
    </a>
    <button class="main"><a href="main.php">Main page</a></button>
    <a href="logout.php">Cerrar sesión</a>
</div>
<audio autoplay loop id="audio">
    <source src="./audio/13.mp3" type="audio/mpeg">
</audio>
<script src="js/audio.js"></script>
</body>
</html>