<?php include("conexion.php");
$sql = "SELECT id, Nombre, Apellido, Fecha_nacimiento, Sexo, Correo FROM personas"; 
$resultado = $con->query($sql);
?>
<style>
    body{
        background-color: #323232;
    }
    .container{
        background-color: white;
    }
    button{
        background-color: #6C757D;
    }
</style>
<table style = "border-collapse: collapse" border="1"  class="container">
    <thead style = "background-color: green">
        <tr>
            <th width = "100px">Nombres</th>
            <th width = "150px">Apellidos</th>
            <th width = "60px">Fecha_nacimiento</th>
            <th width = "10px">Sexo</th>
            <th width = "150px">Correo</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <?php
    while($row = mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><?php echo $row['Nombre'];?></td>
        <td><?php echo $row['Apellido'];?></td>
        <td><?php echo $row['Fecha_nacimiento'];?></td>
        <td><?php echo $row['Sexo'];?></td>
        <td><?php echo $row['Correo'];?></td>

        <td><button><a href="formeditar.php?id=<?php echo $row['id'];?>"> Editar </a></button><button><a href = "delete.php?id=<?php echo $row['id'];?>">Eliminar</a></button></td>
    </tr>
   <?php }?>
</table>

<a href = "forminsertar.html">Insertar</a>