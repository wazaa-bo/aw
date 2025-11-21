<?php
$msg="";
if($_SERVER['REQUEST_METHOD']==='POST') { #lo siguiente no se ejecuta hasta que el usuario pulse el botón
include"connect.php";

$user=$_POST['user'];
$password=$_POST['password'];

$hash=password_hash($password, PASSWORD_DEFAULT);

$check=$conn->prepare("SELECT id, password FROM user WHERE user=?"); #verificar si el usuario existe
$check->bind_param("s",$user);
$check->execute();
$check->store_result();
if($check->num_rows>0){
    $msg="El usuario ya existe.";
    $check->close();
    $conn-> close();
} else {
    $hash=password_hash($password, PASSWORD_DEFAULT);
    $conseg=$conn->prepare("INSERT INTO user (user,password) VALUES (?,?)");
    $conseg->bind_param("ss",$user,$hash);

    if($conseg->execute()) {
    echo"<script>alert('Registro exitoso');window.location='iniciarsesion.php';</script>";
    $conseg->close();
    $conn->close();
    } else {
        $msg="Error al registrar usuario. Intentelo de nuevo.";
        $conseg->close();
    }
}

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/registro.css">
    <link rel="icon" href="img/grr.jpg">
</head>
<body>
    <div class="box2">
        <a href="wouu.php">Welcome page</a>
    </div>

    <div class="box">
        <h2>Registro</h2>
        <form method="post">
            <?php if ($msg):?>
                <p style="color: red;"><?php echo $msg; ?></p>
            <?php endif; ?>
            <label>Usuario</label>
            <input type="text" name="user" required> <br>
            <label>Contraseña</label>
            <input type="password" name="password" required> <br> 
             <button type="submit">Registrarse</button>
        </form>
        <p>Already have an account? <a href="iniciarsesion.php">Log in here</a></p>
    </div>
    
</body>
</html>