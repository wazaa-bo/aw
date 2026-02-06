<?php
session_start();
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
    $pass=$_POST["pass"];

    if(!empty($pass)){
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        $update=$pdo->prepare("UPDATE users SET name=?,email=?,age=?,rol=?,pass=? WHERE id=?");
        $update->execute([$name,$email,$age,$rol,$hash,$id]);
    } else {
        $update=$pdo->prepare("UPDATE users SET name=?,email=?,age=?,rol=? WHERE id=?");
        $update->execute([$name,$email,$age,$rol,$id]);
    }

    header("Location: list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="css/anim.css">
    <title>Edit user</title>
</head>
<body>
    <div class="formulario">
        <h1 class="beat-effect">Edit user</h1>
        <form method="post">
            <input type="text" name="name" placeholder="Name" value="<?=$user['name'] ?>" required> <br>
            <input type="password" name="pass" placeholder="New password"><br>
            <input type="email" name="email" placeholder="Email" value="<?=$user['email']?>" required><br>
            <input type="number" name="age" placeholder="Age" value="<?=$user['age']?>" required><br>
            <select name="rol">
                <option value="user"<?=$user['rol']=='user'?'selected':''?>>User</option>
                <option value="admin"<?=$user['rol']=='admin'?'selected':''?>>Admin</option>
            </select> <br>
            <button class="btn-aplicar" type="submit">Aplicar cambios</button>
            <button class="btn-cancelar" type="reset">Reset</button>
        </form>
    </div>
        <a href="javascript:history.back()" class="back">
            <img src="./css/img/icon/back.png" alt="Back" style="width:40px">
        </a>
<audio autoplay loop id="audio">
    <source src="./audio/13.mp3" type="audio/mpeg">
</audio>
<script src="js/audio.js"></script>
<script src="js/vali.js"></script>
</body>
</html>