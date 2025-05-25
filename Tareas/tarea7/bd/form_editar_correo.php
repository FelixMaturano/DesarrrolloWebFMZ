<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nombre_completo = $row['nombres'] . ' ' . $row['apellidos'];
        $correo = $row['correo'];
    } else {
        echo "Usuario no encontrado";
        exit();
    }
} else {
    echo "ID no especificado";
    exit();
}

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_correo = $_POST['correo'];
    $update_query = "UPDATE usuarios SET correo = '$nuevo_correo' WHERE id = $id";
    
    if (mysqli_query($con, $update_query)) {
        header("Location: pregunta4.php");
        exit();
    } else {
        echo "Error al actualizar: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Correo</title>
</head>
<body>
    <h2>Editar Correo</h2>
    <form method="POST">
        <p><strong>Nombres y Apellidos:</strong> <?= $nombre_completo ?></p>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?= $correo ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
