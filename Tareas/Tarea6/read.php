<?php session_start();

require("verificarsesion.php");

?>
<a href="cerrar.php">Cerrar Sesion</a>

<?php
include("conexion.php");

$orden = "personas.id";
$asente = "ASC";
$buscar = "";
if(isset($_GET['orden'])){
    $orden=$_GET['orden'];
}
if(isset($_GET['asente'])){
    $asente=$_GET['asente'];
}
if(isset($_GET['buscar'])){
    $buscar=$_GET['buscar'];
}



$sql="SELECT fotografia,personas.id,nombres,apellidos,fecha_nacimiento,sexo,correo,profesiones.nombre as profesion FROM personas
    
      LEFT JOIN profesiones ON personas.profesion_id=profesiones.id 
      WHERE nombres like '%$buscar%'
      ORDER BY $orden , $asente";  

$resultado=$con->query($sql);

?>
<!--Buscador en la tabla-->
<form action="read.php" method="get">
    <label for="buscar">Buscar</label>
    <input type="text" name="buscar" value="<?php echo $buscar; ?>" placeholder="Buscar por nombre">
    <input type="submit" value="Buscar">

</form>

<table style="border-collapse: collapse" border="1" >
    <thead>
        <tr>
            <th width="100px">Fotografia</th>

            <th width="100px"><a href="read.php?orden=nombres&asendente=">Nombres</a></th>
            <th width="100px"><a href="read.php?orden=apellidos&asente=">Apellidos</a></th>
            <th width="60px"><a href="read.php?orden=fecha_nacimiento&asente=">Fec.Nacimiento</a></th>
            <th width="10px"><a href="read.php?orden=sexo&asente=">Sexo</a></th>
            <th width="100px"><a href="read.php?orden=correo&asente=">Correo</a></th>
            <th width="100px"><a href="read.php?orden=profesion&asente=">Profesion</a></th>

            
           <?php if($_SESSION['nivel']==1){?>
            <th>Operaciones</th>
            <?php } ?>
        </tr>
    </thead>
    
 <?php 
 while($row=mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><img src="images/<?php echo $row['fotografia'];  ?>" width="100px"></td>
        <td><?php echo $row['nombres'];?></td>
        <td><?php echo $row['apellidos'];?></td>
        <td><?php echo $row['fecha_nacimiento'];?></td>
        <td><?php echo $row['sexo'];?></td>
        <td><?php echo $row['correo'];?></td>
        <td><?php echo $row['profesion'];?></td>
        <?php if($_SESSION['nivel']==1){?>
        <td><a href="formeditar.php?id=<?php echo $row['id'];?>">Editar</a>  <a href="delete.php?id=<?php echo $row['id'];?>">Eliminar</a> </td>
        <?php } ?>
    </tr>
    <?php } ?>
 </table>
<?php if($_SESSION['nivel']==1){?>
 <a href="forminsertar.php"> Insertar</a>
 <?php } ?>
 