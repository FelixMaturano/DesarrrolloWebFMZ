<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
</head>
<body>
    <h2>Menú Principal</h2>
    <ul>
        <li><a href="personas.php">Gestionar Personas</a></li>
        <li><a href="usuarios.php">Gestionar Usuarios</a></li>
        <li><a href="profesiones.php">Gestionar Profesiones</a></li>
        <li><a href="logout.php">Cerrar Sesión</a></li>
    </ul>
</body>
</html>
