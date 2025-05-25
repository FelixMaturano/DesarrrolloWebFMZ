<?php
include 'conexion.php';

// Obtener el criterio de ordenamiento (si no se define, se ordena por 'id')
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'id';
$query = "SELECT * FROM usuarios ORDER BY $order_by";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        table { width: 50%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: red; color: white; cursor: pointer; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:nth-child(2) { background-color: yellow; }
    </style>
</head>
<body>
    <h2>Lista de Usuarios</h2>
    <table>
        <tr>
            <th><a href="?order_by=nombres">Nombres</a></th>
            <th><a href="?order_by=apellidos">Apellidos</a></th>
            <th><a href="?order_by=correo">Correo</a></th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['nombres'] ?></td>
            <td><?= $row['apellidos'] ?></td>
            <td><a href="form_editar_correo.php?id=<?= $row['id'] ?>"> <?= $row['correo'] ?></a></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <?php mysqli_close($con); ?>
</body>
</html>
