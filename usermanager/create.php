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
    <title>Create user</title>
</head>
<body>
<div class="formulario">
    <h1>Create user</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="numer" name="age" placeholder="Age" required>
        <select name="rol">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </form>
</div>
<script src="js/vali.js"></script>
</body>
</html>