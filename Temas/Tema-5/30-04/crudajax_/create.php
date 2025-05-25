<?php include("conexion.php");

$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$sexo=$_POST['sexo'];
$correo=$_POST['correo'];

$stmt=$con->prepare('INSERT INTO personas(nombres,apellidos,fecha_nacimiento,sexo,correo) VALUES(?,?,?,?,?)');

// vincular parametros 
$stmt->bind_param("sssss", $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo);

// Ejecutar la consulta
if($stmt->execute()){
    echo "Nuevo registro creado con exito";
}else{
    echo "Error: " . $stmt->error;
}
$con->close();
?>