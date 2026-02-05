<?php session_start(); ?> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/anim.css">
    <title>Login</title>
</head>
<body>
    <div class="formulario">
        <h1 class="beat-effect">Log in</h1>
        <?php if($error):?>
            <p><?=$error?></p>
        <?php endif;?>

        <form action="proc/procl.php" method="post">
            <input type="text" name="login" placeholder="User, email or ID" required><br>
            <input type="password" name="pass" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="create.php">Sign up here</a></p>
    </div>
    <a href="javascript:history.back()" class="back">
        <img src="./css/img/icon/back.png" alt="Back" style="width:40px">
    </a>
<audio autoplay loop id="audio">
    <source src="./audio/13.mp3" type="audio/mpeg">
</audio>
<script src="js/audio.js"></script>
</body>
</html>