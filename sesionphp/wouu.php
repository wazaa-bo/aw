<?php
session_start();
$log=isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weiss</title>
    <link rel="icon" href="img/grr.jpg">
    <link rel="stylesheet" href="wouu.css">
</head>
<body>

<?php if($log): ?>
    <br><br><br>
    <h1>Welcome, <?php echo $_SESSION['user'];?></h1>
    <?php
    $line= file("users.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    ?>
    <p>Has iniciado sesión exitosamente, <br> estás en el Grimoire Weiss database   <br><br><br><br><br>
    All users: </p>
    <p>
    <?php
    foreach($line as $l){
        list($user,$hash)=explode(":", $l,2);
        echo htmlspecialchars($user). "<br>";
    }
    ?>
</p>
    <header class="topbar">
        <a class="logout" href="cerrarsesion.php">Cerrar sesión</a>
    </header>
    
<?php else: ?>
    <br><br><br>
    <h1>Welcome</h1>
    <p>Grimoire Weiss user database</p>

    <header class="topbar">
        <a class="login" href="iniciarsesion.php">Log in</a>
        <a class="signin" href="registro.php">Sign in</a>
    </header>

<?php endif; ?>

</body>
</html>