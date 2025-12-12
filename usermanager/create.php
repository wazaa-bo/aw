<?php
include "db.php";

if($_POST){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $age=$_POST["age"];
    $rol=$_POST["rol"];

    $stmt=$pdo->prepare("INSERT INTO users(name,email,age,rol) VALUES (?,?,?,?)");
    $stmt->execute([$name,$email,$age,$rol]);

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
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="numer" name="age" placeholder="Age" required><br>
        <select name="rol">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select> <br>
        <button type="submit">Crear usuario</button>
    </form>
</div>
<script src="js/vali.js"></script>
</body>
</html>