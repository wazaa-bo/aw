<?php
session_start();
$msg="";        #variable que he creado para indicarle al usuario qué error hay y cambia en la situación a lo largo del código
if($_SERVER['REQUEST_METHOD']==='POST') {   #esto le indica a la página que lo siguiente no va a ejecutarse hasta que el usuario pulse el botón
include"connect.php";
$user=$_POST['user'];
$password=$_POST['password'];

$conseg=$conn->prepare("SELECT id, password FROM user WHERE user=?");
$conseg->bind_param("s",$user);
$conseg->execute();
$conseg->store_result();

if($conseg->num_rows>0) {
    $conseg->bind_result($id,$hash);
    $conseg->fetch();

    if(password_verify($password,$hash)){
        $_SESSION['user']=$user;
        header("Location:wouu.php");
        exit;
    } else{
        $msg="Contraseña incorrecta";
    }
} else {
    $msg="Usuario no encontrado";
}
$conseg->close();
$conn->close();

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="icon" href="img/grr.jpg">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="box2">
        <a href="wouu.php">Welcome page</a>
    </div>
    
<div class="box">
    <h2>Log in</h2>
    <form method="post">    
        <?php if ($msg):?>
            <p style="color: red;"><?php echo $msg; ?></p> <!-- código de error -->
        <?php endif; ?>
        <label>Usuario</label>
        <input type="text" name="user" required> <br>
        <label>Contraseña</label>
        <input type="password" name="password" required> <br>
        <button type="submit">Entrar</button>
    </form>
    <p>Don't have an account? <a href="registro.php">Sign up here</a></p>
</div>
</body>
</html>