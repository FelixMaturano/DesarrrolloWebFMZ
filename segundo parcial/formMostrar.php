<?php 

include("conexion.php");
$id=$_GET['id'];
$sql="SELECT id, imagen FROM libros";

$resultado=$con->query($sql);
 $row= $resultado->fetch_assoc();
?>
<?php 
while($row=mysqli_fetch_array($resultado)){
    $arreglo[] = ["id" => $row['id'],
          "imagen" => $row['imagen'],
    ];
}
$nuevoarreglo = [
    "datos" => $arreglo,
];
echo json_encode($nuevoarreglo);
?>