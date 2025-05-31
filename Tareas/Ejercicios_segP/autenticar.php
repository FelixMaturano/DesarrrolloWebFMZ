<?php 
session_start();
include("conexion.php");

$correo = $_POST['correo'];
$password = sha1($_POST['password']);

$stmt = $con->prepare('SELECT usuario, nombrecompleto, nivel FROM usuarios WHERE usuario=? AND password=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc(); // Solo una vez
    $_SESSION['correo'] = $usuario['usuario'];
    $_SESSION['nivel'] = (int)$usuario['nivel']; // Forzar tipo entero
    echo "success";
} else {
    echo "Error: Credenciales incorrectas";
}
?>