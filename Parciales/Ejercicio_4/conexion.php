<?php
$con = mysqli_connect("localhost", "root", "", "bd_biblioteca");

if (!$con) {  // Se usa "!" en lugar de comparar con "mysqli_connect_errno()"
    die("Error al conectarse con MySQL: " . mysqli_connect_error());
}
?>
