<?php
session_start();
require_once("conexion.php");
require_once("verificarsesion.php");
require_once("verificarnivel.php");

// Verificar permisos
if ($_SESSION['nivel'] != 1) {
    $_SESSION['error'] = "No tienes permisos para esta acción";
    header("Location: readusuarios.php");
    exit();
}

// Verificar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = "ID de usuario no válido";
    header("Location: readusuarios.php");
    exit();
}

$id = (int)$_GET['id'];

// Obtener datos actuales del usuario
$stmt = $con->prepare("SELECT id, correo, nombre, nivel FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Usuario no encontrado";
    header("Location: readusuarios.php");
    exit();
}

$usuario = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 500px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Usuario</h1>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <form action="editarusuario.php" method="post">
            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
            
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password">Nueva Contraseña (dejar en blanco para no cambiar):</label>
                <input type="password" id="password" name="password" minlength="6">
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="nivel">Nivel de Acceso:</label>
                <select id="nivel" name="nivel" required>
                    <option value="1" <?= $usuario['nivel'] == 1 ? 'selected' : '' ?>>Administrador</option>
                    <option value="0" <?= $usuario['nivel'] == 0 ? 'selected' : '' ?>>Usuario Normal</option>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit">Guardar Cambios</button>
                <a href="readusuarios.php" style="margin-left: 10px;">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php $con->close(); ?>