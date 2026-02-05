<?php
session_start();
include "../db.php";

define('key', 'aBC123!');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $email = $_POST["email"];
    $age = $_POST["age"];
    $rol = $_POST["rol"];
    if ($rol == 'admin') {
        $adminlog = (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin');
        $keylog = (isset($_POST['akey']) && $_POST['akey'] == key);

        if (!$adminlog && !$keylog) {
            echo "<script>alert('Para crear un administrador necesitas ser uno o introducir una clave'); window.history.back();</script>";
            exit;
        }
    }
    $check = $pdo->prepare("SELECT COUNT(*) FROM users WHERE name = ?");
    $check->execute([$name]);
    if ($check->fetchColumn() > 0) {
        echo "<script>alert('El usuario ya existe'); window.history.back();</script>";
        exit;
    }

    // Insertar nuevo usuario
    $stmt = $pdo->prepare("INSERT INTO users(name,pass,email,age,rol) VALUES (?,?,?,?,?)");
    $stmt->execute([$name, $hash, $email, $age, $rol]);

    header("Location: ../list.php");
    exit;
}