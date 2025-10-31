<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="icon" href="img/grr.jpg">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="box2">
        <a href="wouu.php">Welcome page</a>
    </div>
    
<div class="box">
    <h2>Log in</h2>
    <form action="procesarl.php" method="post">
        <label>Usuario</label>
        <input type="text" name="user" required> <br>
        <label>Contraseña</label>
        <input type="password" name="password" required> <br>
        <button type="submit">Entrar</button>
    </form>
    <p>Don't have an account? <a href="registro.php">Sign in here</a></p>
</div>
</body>
</html>