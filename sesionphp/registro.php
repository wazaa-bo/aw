<?php
$msg="";
if($_SERVER['REQUEST_METHOD']==='POST') { #lo siguiente no se ejecuta hasta que el usuario pulse el botón
$user=$_POST['user'];
$password=$_POST['password'];


$line=file("users.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$exist=false;       #variable que detecta si existe el usuario para evitar repeticiones

foreach($line as $l){
    list($u,$hash)=explode(":",$l,2);
    if($u===$user){
        $exist=true;    #esta parte lee el fichero y si detecta que el usuario ya está, cancela la operación
        break;
    }
}
if($exist){
    echo"<script>alert('This user already exists, change the username or try logging in.');window.location='registro.php'</script>";
    exit;   #he usado script porque lo considero un mensaje demasiado largo como para ponerlo en la caja de registro
}
$file=fopen("users.txt","a");
fwrite($file,$user.":".password_hash($password,PASSWORD_DEFAULT). "\n");
fclose($file);

echo"<script>alert('Registro exitoso');window.location='iniciarsesion.php';</script>"; #he usado otro script porque me parece bonito
exit;
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