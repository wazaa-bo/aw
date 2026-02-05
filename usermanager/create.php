
<?php session_start(); ?> <!DOCTYPE html>
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
    <form action="proc/procc.php" method="post">
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