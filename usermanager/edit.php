<?php
include "db.php";

$id=$_GET["id"];
$stmt=$pdo->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$id]);
$user=$stmt->fetch();

if($_POST){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $age=$_POST["age"];
    $rol=$_POST["rol"];

    $update=$pdo->prepare("UPDATE users SET name=?,email=?,age=?,rol=? WHERE id=?");
    $update->execute([$name,$email,$age,$rol,$id]);

    header("Location:list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit.css">
    <title>Edit user</title>
</head>
<body>
    <div class="formulario">
        <h1>Edit user</h1>
        <form method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="numer" name="age" placeholder="Age" required>
            <select name="rol">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button class="btn-aplicar" type="submit">Aplicar cambios</button>
            <button class="btn-cancelar" type="reset">Cancelar</button>
        </form>
    </div>
<script src="js/vali.js"></script>
</body>
</html>