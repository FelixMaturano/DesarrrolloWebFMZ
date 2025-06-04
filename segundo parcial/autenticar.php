<?php session_start();
include("conexion.php");
$correo = $_POST['correo'];
$password = sha1($_POST['password']);
$stmt = $con->prepare('SELECT usuario,nombrecompleto,nivel FROM usuarios WHERE correo=? AND password=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
   $usuario = $result->fetch_assoc();
    $_SESSION['correo'] = $usuario['usuario'];
    $_SESSION['nivel'] = $usuario['nivel'];
     echo "success";

} else {
    echo "Error: datos de autenticación incorrectos";
}

?>