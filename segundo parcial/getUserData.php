<?php
session_start();
header('Content-Type: application/json');
if (isset($_SESSION['correo']) {
 echo json_encode([
 'usuario' => $_SESSION['correo'],
 'nivel' => $_SESSION['nivel']
 ]);
} else {
 echo json_encode(['error' => 'No autenticado']);
}
?>