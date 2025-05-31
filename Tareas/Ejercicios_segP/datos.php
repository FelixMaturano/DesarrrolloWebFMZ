<?php
include("conexion.php");
$sql = "SELECT titulo, imagen FROM libros";
$resultado=$con->query($sql);

$libros = [];
while($libro = $resultado->fetch_assoc()){
    $libros[] = $libro;
}
echo json_encode($libros);
?>