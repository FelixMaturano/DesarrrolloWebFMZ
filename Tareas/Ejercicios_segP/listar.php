<?php 
session_start();
require("verificarsesion.php");
include("conexion.php");

$orden = $_GET['orden'] ?? 'titulo';
$asente = $_GET['asendente'] ?? 'asc';

$sql = "SELECT imagen, titulo, autor, anio FROM libros ORDER BY $orden $asente";
$resultado = $con->query($sql);
?>

<table border="1">
    <thead>
        <tr>
            <th>Fotografía</th>
            <th><a href="#" onclick="ordenarTabla('titulo')">Título</a></th>
            <th>Autor</th>
            <th>Año</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $resultado->fetch_array()): ?>
        <tr>
            <td><img src="images/<?= $row['imagen'] ?>" width="80" height="80"></td>
            <td><?= $row['titulo'] ?></td>
            <td><?= $row['autor'] ?></td>
            <td><?= $row['anio'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>