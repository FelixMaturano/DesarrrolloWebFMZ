<?php 
session_start();
include("conexion.php");
$correo = $_POST['correo'];
$password = sha1($_POST['password']);

$stmt = $con->prepare('SELECT correo, nombre, nivel, Estado FROM usuarios WHERE correo=? AND password=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if ($usuario['Estado'] == 1 && $usuario['nivel'] != 0) {
        $_SESSION['correo'] = $correo;
        $_SESSION['nivel'] = $usuario['nivel'];
        $_SESSION['nombre'] = $usuario['nombre'];
        
        header("Location: read.php");
        exit();
    } else if($usuario['Estado'] == 1 && $usuario['nivel'] == 0){
        $_SESSION['correo'] = $correo;
        $_SESSION['nivel'] = $usuario['nivel'];
        $_SESSION['nombre'] = $usuario['nombre'];
        header("Location: paginaUsuario.php");
    }
} else {
    echo "Error: datos de autenticación incorrectos.";
    ?>
    <meta http-equiv="refresh" content="3;url=formlogin.html">
    <?php
}
?>

