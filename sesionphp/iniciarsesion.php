<?php
session_start();
$msg="";        #variable que he creado para indicarle al usuario qué error hay y cambia en la situación a lo largo del código
if($_SERVER['REQUEST_METHOD']==='POST') {   #esto le indica a la página que lo siguiente no va a ejecutarse hasta que el usuario pulse el botón

$user=$_POST['user'];
$password=$_POST['password'];
$line=file("users.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$found=false;   #variable de encontrar al usuario

foreach($line as $l){
    list($u,$hash)=explode(":",$l,2);
    
    if($u === $user){
        $found=true;
        if (password_verify($password,$hash)){  #verifica el fichero de $line=file
            $_SESSION['user']=$user;            #inicia sesión
            header("Location: wouu.php");       #redirige a la página de bienvenida
        } else {
           $msg="Contraseña incorrecta"; 
        } 
        break;
    }
        
}
if (!$found){   #si no se encuentra al usuario
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