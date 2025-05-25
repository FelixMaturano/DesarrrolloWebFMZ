<?php
session_start();
require("verificarsesion.php");
require("conexion.php");

if ($_SESSION['nivel'] != 1) {
    header("Location: read.php");
    exit();
}

$sql = "SELECT c.id, c.asunto, c.mensaje, c.fecha_envio, 
               u1.nombre AS remitente, u2.nombre AS destinatario
        FROM correos c
        JOIN usuarios u1 ON c.remitente_id = u1.id
        JOIN usuarios u2 ON c.destinatario_id = u2.id
        ORDER BY c.fecha_envio DESC";

$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Revisión de Correos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f5f5f5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background: #6441a5;
            color: white;
        }
        tr:hover {
            background-color: #f0f0f0;
        }
        a {
            text-decoration: none;
            color: #6441a5;
        }
    </style>
</head>
<body>
    <h2>Correos Enviados y Recibidos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Remitente</th>
            <th>Destinatario</th>
            <th>Asunto</th>
            <th>Mensaje</th>
            <th>Fecha</th>
        </tr>
        <?php while ($row = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['remitente']; ?></td>
            <td><?php echo $row['destinatario']; ?></td>
            <td><?php echo $row['asunto']; ?></td>
            <td><?php echo $row['mensaje']; ?></td>
            <td><?php echo $row['fecha_envio']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="read.php">← Volver</a>
</body>
</html>
