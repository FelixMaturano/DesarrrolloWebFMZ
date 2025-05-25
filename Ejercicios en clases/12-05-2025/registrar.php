<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "root", "", "bd_biblioteca");

// Verificar la conexión
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener y sanitizar los datos del formulario
$imagen = mysqli_real_escape_string($con, $_POST['imagen']);
$titulo = mysqli_real_escape_string($con, $_POST['titulo']);
$autor = mysqli_real_escape_string($con, $_POST['autor']);
$ideditorial = (int)$_POST['ideditorial'];
$anio = (int)$_POST['anio'];
$idusuario = !empty($_POST['idusuario']) ? (int)$_POST['idusuario'] : 'NULL';
$idcarrera = (int)$_POST['idcarrera'];

// Construir la consulta SQL
$sql = "INSERT INTO libros (imagen, titulo, autor, ideditorial, anio, idusuario, idcarrera)
        VALUES ('$imagen', '$titulo', '$autor', $ideditorial, $anio, $idusuario, $idcarrera)";

// Ejecutar la consulta y devolver resultado
if (mysqli_query($con, $sql)) {
    echo "ok";
} else {
    echo "error: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);
?>