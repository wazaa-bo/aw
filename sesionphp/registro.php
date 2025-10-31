<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        p{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Registro</h1>
    <form action="procesarr.php" method="post">
        <label>Usuario</label>
        <input type="text" name="user" required> <br>
        <label>Contraseña</label>
        <input type="password" name="password" required> <br> 
        <button type="submit">Registrarse</button>
    </form>
    <p>Already have an account? <a href="iniciarsesion.php">Log in here</a></p>
    
</body>
</html>