<?php
include "db.php";
$stmt=$pdo->query("SELECT * FROM users");
$users=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <title>List</title>
</head>
<body>
<div class="contenedor">
    <h1>usuarios</h1>
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
                <a href="edit.php" class="btnedit" id="<?=$u['id']?>">Editar</a>
                <a href="del.php" class="btndel" id="<?=$u['id']?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
</body>
</html>