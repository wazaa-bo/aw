<?php
session_start();
$log=isset($_SESSION['user']); #variable para detectar si el usuario ha iniciado sesión

if($log) {
    $clase_body="body-login"; #variable para que los usuarios con sesión vean la página de cierta forma
}   else{
    $clase_body="body-logoff"; #variable para los usuarios sin ssesión
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weiss</title>
    <link rel="icon" href="img/grr.jpg">
    <link rel="stylesheet" href="css/wouu.css">
</head>
<body class="<?php echo $clase_body; ?>"> <!-- cambia según la sesión del usuario-->

<?php if($log): ?>
    <br><br><br>
    <h1>Welcome, <?php echo $_SESSION['user'];?></h1>
    <p>Has iniciado sesión exitosamente, <br> estás en el Grimoire Weiss database   <br><br><br><br><br>
    All users: </p>
    <p>
    <?php
    $line= file("users.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); #inicio una variable para enseñarle al usuario cuantos usuarios hay
    foreach($line as $l){
        list($user,$hash)=explode(":", $l,2); 
        echo htmlspecialchars($user). "<br>";   #por hacer algo
    }
    ?>
</p>
    <header class="topbar">
        <a class="logout" href="cerrarsesion.php">Cerrar sesión</a>
    </header>
    
<?php else: ?> <!-- para usuarios sin sesión-->
    <br><br><br>
    <h1>Welcome</h1>
    <p>Grimoire Weiss user database</p>

    <header class="topbar">
        <a class="login" href="iniciarsesion.php">Log in</a>
        <a class="signin" href="registro.php">Sign up</a>
    </header>

<?php endif; ?>

</body>
</html>