
<?php
$con = mysqli_connect("localhost", "root", "", "bd_alumnos", 3307);

if (!$con) {  // Se usa "!" en lugar de comparar con "mysqli_connect_errno()"
    die("Error al conectarse con MySQL: " . mysqli_connect_error());
}
?>