<?php
include("conexion.php");

$id = $_GET['id'];
// $bandeja = $_GET['bandeja'];

// Consulta para eliminar el correo
$sql = "DELETE FROM correosbandeja WHERE id = $id";

if ($con->query($sql)) {
  echo "Correo eliminado correctamente";
} else {
  http_response_code(500);
  echo "Error al eliminar el correo: " . $con->error;
}

$con->close();
?>