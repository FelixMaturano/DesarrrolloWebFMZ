<?php
session_start();
include "cola.php";

// Si resetea la cola
if ($_POST['accion'] == 'reset') {
    unset($_SESSION['cola']);
    echo "<p>🔄 Cola reiniciada.</p><a href='index.php'>Volver</a>";
    exit;
}

$tipo = $_POST["tipo"] ?? "Normal";
$valor = $_POST["valor"] ?? "";
$accion = $_POST["accion"];

$cola = new Cola($tipo);

switch ($accion) {
    case "insertardelante":
        $cola->insertardelante($valor);
        break;
    case "insertardetras":
        $cola->insertardetras($valor);
        break;
    case "eliminar":
        $cola->eliminar();
        break;
    case "mostrar":
        break;
    default:
        echo "<p>Acción inválida</p>";
}

$cola->mostrar();

echo "<br><a href='index.php'>⬅️ Volver al Menú</a>";
?>
