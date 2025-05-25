<?php include("conexion.php");

$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Fecha_nacimiento = $_POST['Fecha_nacimiento'];
$Sexo = $_POST['Sexo'];
$Correo = $_POST['Correo'];

$stmt = $con->prepare('INSERT INTO personas(Nombre, Apellido, Fecha_nacimiento, Sexo, Correo) VALUES(?,?,?,?,?)');
$stmt->bind_param("sssss",$Nombre,$Apellido ,$Fecha_nacimiento, $Sexo, $Correo );

// ejecutar la consulta
if($stmt -> execute()){
    echo "Nuevo registro creado con exito";
}else{
    echo "Error: ".$stmt->error;
}
$con->close();
?>

<meta http-equiv="refresh" content="3;url=read.php">