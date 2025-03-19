<?php include("conexion.php");
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];

# este es una manera insegura de insertar datos
 $sql = "INSERT INTO personas (nombre, apellido, fecha_nacimiento, sexo, correo) VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$sexo', '$correo')";

# este es una manera segura de insertar datos
 $con->prepare("INSERT INTO personas (nombre, apellido, fecha_nacimiento, sexo, correo) VALUES ("$nombres", ?, ?, ?, ?)");
$con->bid_param("ssss", $nombre, $apellido, $fecha_nacimiento, $sexo, $correo);
?>