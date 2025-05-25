<?php
session_start();
require_once("verificarsesion.php");
require_once("conexion.php");

// Mostrar mensajes
if (isset($_SESSION['message'])) {
    echo '<div class="message">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}
if (isset($_SESSION['error'])) {
    echo '<div class="error">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .message { color: green; margin: 10px 0; }
        .error { color: red; margin: 10px 0; }
        .actions { white-space: nowrap; }
    </style>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <div>
        <a href="cerrar.php">Cerrar Sesión</a>
        <?php if ($_SESSION['nivel'] == 1): ?>
            <a href="createusuarios.php" style="margin-left: 20px;">Agregar Nuevo Usuario</a>
        <?php endif; ?>
    </div>

    <?php
    $sql = "SELECT id, correo, nombre, nivel FROM usuarios ORDER BY nombre ASC";
    $resultado = $con->query($sql);
    
    if ($resultado->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Nivel</th>
                    <?php if ($_SESSION['nivel'] == 1): ?>
                        <th>Acciones</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['correo']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td><?php echo ($row['nivel'] == 1) ? "Administrador" : "Usuario"; ?></td>
                        <?php if ($_SESSION['nivel'] == 1): ?>
                            <td class="actions">
                                <a href="editarusuario.php?id=<?php echo $row['id']; ?>">Editar</a> | 
                                <a href="deleteusuario.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay usuarios registrados.</p>
    <?php endif; 
    $con->close();
    ?>
    <a href="menu.php"> Volver a menu</a>
</body>
</html>