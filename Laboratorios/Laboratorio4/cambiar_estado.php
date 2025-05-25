<?php
session_start();
require("verificarsesion.php");
require("conexion.php");


if ($_SESSION['nivel'] != 1) {
    header("Location: read.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['estado'])) {
    $id = intval($_GET['id']);
    $nuevo_estado = intval($_GET['estado']);

    $sql = "UPDATE usuarios SET Estado = ? WHERE id = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $nuevo_estado, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Éxito
            header("Location: read.php?msg=estado_cambiado");
        } else {
            // No se actualizó nada
            header("Location: read.php?msg=sin_cambios");
        }

        $stmt->close();
    } else {
        // Error en la consulta
        echo "Error en la consulta: " . $con->error;
    }
} else {
    // Parámetros inválidos
    header("Location: read.php?msg=parametros_invalidos");
}
?>
