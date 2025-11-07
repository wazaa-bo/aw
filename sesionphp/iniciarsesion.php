<?php
session_start();
$msg="";
if($_SERVER['REQUEST_METHOD']==='POST') {

$user=$_POST['user'];
$password=$_POST['password'];
$line=file("users.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$found=false;

foreach($line as $l){
    list($u,$hash)=explode(":",$l,2);
    
    if($u === $user){
        $found=true;
        if (password_verify($password,$hash)){
            $_SESSION['user']=$user;
            header("Location: wouu.php");
        } else {
           $msg="Contraseña incorrecta";
        } 
        break;
    }
        
}
if (!$found){
    $msg="Usuario no existe";
    }
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
            <p style="color: red;"><?php echo $msg; ?></p>
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