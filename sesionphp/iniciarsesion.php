<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        p{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Log in</h1>
    <form action="procesarl.php" method="post">
        <label>Usuario</label>
        <input type="text" name="user" required> <br>
        <label>Contraseña</label>
        <input type="password" name="password" required> <br>
        <button type="submit">Entrar</button>
    </form>
    <p>Don't have an account? <a href="registro.php">Sign in here</a></p>
</body>
</html>