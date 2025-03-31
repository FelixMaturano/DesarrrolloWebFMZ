<?php
session_start();
require_once("conexion.php");
require_once("verificarsesion.php");
require_once("verificarnivel.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Método no permitido";
    header("Location: forminsertarusuarios.php");
    exit();
}

if (!isset($_POST['correo'], $_POST['password'], $_POST['nombre'], $_POST['nivel'])) {
    $_SESSION['error'] = "Todos los campos son requeridos";
    header("Location: forminsertarusuarios.php");
    exit();
}

$correo = trim($_POST['correo']);
$password = $_POST['password']; // Variable corregida
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$nombre = trim($_POST['nombre']);
$nivel = (int)$_POST['nivel'];

// Verifica que el hash se genere correctamente
if (empty($passwordHash) || $passwordHash === false) {
    $_SESSION['error'] = "Error al encriptar la contraseña";
    header("Location: forminsertarusuarios.php");
    exit();
}

// Validaciones adicionales
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "El correo electrónico no es válido";
    header("Location: forminsertarusuarios.php");
    exit();
}

if (strlen($password) < 6) {
    $_SESSION['error'] = "La contraseña debe tener al menos 6 caracteres";
    header("Location: forminsertarusuarios.php");
    exit();
}

// Verificar si el correo ya existe
$stmt = $con->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error'] = "El correo electrónico ya está registrado";
    header("Location: forminsertarusuarios.php");
    exit();
}
$stmt->close();

// Hash de la contraseña (una sola vez)
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insertar el nuevo usuario
$stmt = $con->prepare("INSERT INTO usuarios (correo, password, nombre, nivel) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $correo, $passwordHash, $nombre, $nivel);

if ($stmt->execute()) {
    $_SESSION['success'] = "Usuario creado exitosamente";
    header("Location: readusuarios.php");
} else {
    $_SESSION['error'] = "Error al crear el usuario: " . $con->error;
    header("Location: forminsertarusuarios.php");
}

$stmt->close();
$con->close();
exit();
?>