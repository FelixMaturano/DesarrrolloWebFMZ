<?php
session_start();
include("conexion.php");

// Verificación básica
if(!isset($_SESSION['correo']) || $_SESSION['nivel'] != 1){
    die("Acceso denegado");
}

// Validación mínima
$id = intval($_GET['id'] ?? 0);
$nivel = in_array($_GET['nivel'] ?? '', ['0','1']) ? $_GET['nivel'] : die("Nivel inválido");

// Consulta segura
$stmt = $con->prepare("UPDATE usuarios SET nivel=? WHERE id=?");
$stmt->bind_param("ii", $nivel, $id);
$stmt->execute();

echo "Actualizado correctamente";
?>