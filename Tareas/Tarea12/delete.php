<?php
include("conexion.php");

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    
    $sql = "DELETE FROM personas WHERE id = $id";
    $con->query($sql);
    
    echo "Registro Eliminado";
} else {
    echo "Error: No se recibió el ID.";
}
?>
