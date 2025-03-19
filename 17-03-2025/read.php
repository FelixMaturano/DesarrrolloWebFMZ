<?php include("conexion.php"); 
$sql = "SELECT id, nombre, apellido, fecha_nacimiento , sexo, correo FROM personas";
$result = $conn->query($sql);


?>
<table style="border-collapse: collapse;">
    <th>
        <td>id</td>
        <td>nombre</td>
        <td>apellido</td>
        <td>fecha_nacimiento</td>
        <td>sexo</td>
    </th>
<?php
while($row=mysqli_fetch_array($result)){
    ?>
    <table>
            <!-- imprime los datos de la tabla -->
    <tr>
        <td><?php echo $row['nombre']?></td>
        <td><?php echo $row['apellido']?></td>
        <td><?php echo $row['fecha_nacimiento']?></td>
        <td><?php echo $row['sexo']?></td>
        <td><?php echo $row['correo']?></td>
    </tr>
    </table>

}