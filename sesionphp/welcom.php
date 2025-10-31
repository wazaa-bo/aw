<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: iniciarsesion.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wel</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user'];?></h1>
    <p>Has iniciado sesión correctamente</p> <br>
    <p><a href="cerrarsesion.php">Cerrar sesión</a></p>
    
</body>
</html>