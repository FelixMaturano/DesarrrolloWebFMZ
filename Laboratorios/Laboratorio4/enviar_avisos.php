<?php
session_start();
require("verificarsesion.php");
require("conexion.php");

// Solo el administrador puede acceder
if ($_SESSION['nivel'] != 1) {
    header("Location: read.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $asunto = trim($_POST['asunto']);
    $mensaje = trim($_POST['mensaje']);
    $remitente = intval($_SESSION['id']); // ID del administrador

    if (empty($asunto) || empty($mensaje)) {
        echo "<script>alert('Asunto y mensaje no pueden estar vacíos'); window.history.back();</script>";
        exit();
    }

    // Obtener todos los usuarios activos
    $sql = "SELECT id FROM usuarios WHERE Estado = 1 AND id != ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $remitente);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Insertar mensajes a cada usuario
    $insert = $con->prepare("INSERT INTO correos (remitente_id, destinatario_id, asunto, mensaje) VALUES (?, ?, ?, ?)");

    while ($row = $resultado->fetch_assoc()) {
        $destinatario_id = $row['id'];
        $insert->bind_param("iiss", $remitente, $destinatario_id, $asunto, $mensaje);
        $insert->execute();
    }

    echo "<script>alert('Aviso enviado a todos los usuarios activos'); window.location.href='read.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Enviar Aviso</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial;
            padding: 20px;
        }
        form {
            background: white;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #6441a5;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 15px;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #6441a5;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Enviar Aviso a Todos los Usuarios Activos</h2>
    <form method="post" action="enviar_avisos.php">
        <label>Asunto:</label>
        <input type="text" name="asunto" required>
        
        <label>Mensaje:</label>
        <textarea name="mensaje" rows="6" required></textarea>
        
        <input type="submit" value="Enviar Aviso">
    </form>
    <a href="read.php">← Volver</a>
</body>
</html>
