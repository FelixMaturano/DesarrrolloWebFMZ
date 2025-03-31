<?php session_start();
require_once("conexion.php");
require_once("verificarsesion.php");
require_once("verificarnivel.php");


if($_SESSION['nivel']!= 1){
    $_SESSION['error'] = "No tienes permisos para esta accion";
    header("Location: readusuarios.php");
    exit();
}

if(!isset($_GET['id'])){
    $_SESSION['error'] = "ID de usuario no valido";
    header("Location: readusuarios.php");
    exit();
}

$id = (int)$_GET['id'];

if($id == $_SESSION['id']){
    $_SESSION['error'] = "No puedes eliminarte a ti mismo";
    header("Location: readusuarios.php");
    exit();
}

$stmt = $con->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        $_SESSION['success'] = "Usuario eliminado correctamente";
    } else {
        $_SESSION['error'] = "No se encontró el usuario con ID $id";
    }
} else {
    $_SESSION['error'] = "Error al eliminar usuario: " . $con->error;
}

$stmt->close();
$con->close();

header("Location: readusuarios.php");
exit();


?>
<meta http-equiv="refresh" content="3;url=readusuarios.php">
