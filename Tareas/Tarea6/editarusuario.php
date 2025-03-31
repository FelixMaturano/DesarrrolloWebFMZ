<?php
session_start();
require_once("conexion.php");
require_once("verificarsesion.php");
require_once("verificarnivel.php");

if ($_SESSION['nivel'] != 1) {
    $_SESSION['error'] = "No tienes permisos para esta acción";
    header("Location: readusuarios.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Método no permitido";
    header("Location: readusuarios.php");
    exit();
}

if (!isset($_POST['id'], $_POST['correo'], $_POST['nombre'], $_POST['nivel'])) {
    $_SESSION['error'] = "Datos incompletos";
    header("Location: readusuarios.php");
    exit();
}

$id = (int)$_POST['id'];
$correo = trim($_POST['correo']);
$nombre = trim($_POST['nombre']);
$nivel = (int)$_POST['nivel'];
$password = isset($_POST['password']) ? trim($_POST['password']) : null;

// Validaciones
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Correo electrónico no válido";
    header("Location: formeditarusurio.php?id=$id");
    exit();
}

if ($password !== null && strlen($password) < 6) {
    $_SESSION['error'] = "La contraseña debe tener al menos 6 caracteres";
    header("Location: formeditarusurio.php?id=$id");
    exit();
}

// Verificar si el correo ya existe (excluyendo al usuario actual)
$stmt = $con->prepare("SELECT id FROM usuarios WHERE correo = ? AND id != ?");
$stmt->bind_param("si", $correo, $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error'] = "El correo electrónico ya está en uso por otro usuario";
    header("Location: formeditarusurio.php?id=$id");
    exit();
}
$stmt->close();

// Preparar la consulta de actualización
if ($password) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $con->prepare("UPDATE usuarios SET correo = ?, password = ?, nombre = ?, nivel = ? WHERE id = ?");
    $stmt->bind_param("sssii", $correo, $passwordHash, $nombre, $nivel, $id);
} else {
    $stmt = $con->prepare("UPDATE usuarios SET correo = ?, nombre = ?, nivel = ? WHERE id = ?");
    $stmt->bind_param("ssii", $correo, $nombre, $nivel, $id);
}

if ($stmt->execute()) {
    $_SESSION['success'] = "Usuario actualizado correctamente";
} else {
    $_SESSION['error'] = "Error al actualizar usuario: " . $con->error;
}

$stmt->close();
$con->close();
header("Location: readusuarios.php");
exit();
?>