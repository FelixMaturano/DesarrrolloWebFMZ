<?php session_start();
require("verificarsesion.php");
?>
<?php
 include("conexion.php");

$sql="SELECT id, usuario, nombrecompleto, nivel FROM usuarios";
$resultado=$con->query($sql);

?>
<table border="1">
    <thead>
        <tr>
            <th>Correo</th>
            <th>NombreCompleto</th>
            <th>Nivel</th>
            <?php if($_SESSION['nivel'] == 1){ ?>
            <th>Operaciones</th>
            <?php } ?>
        </tr>
    </thead>
    <?php  
    while($row=mysqli_fetch_array($resultado)){
        ?>
        <tr>
            <td><?php echo $row['usuario'];?></td>
            <td><?php echo $row['nombrecompleto'];?></td>
            <td><?php echo $row['nivel']==1?'Administrador':'Usuario';?></td>
            <?php if($_SESSION['nivel'] == 1){ ?>
            <td>
            <?php if($row['nivel'] == 1){ ?>
                <div class="button" style="background-color:gray; color:white" onclick="cambiarNivel(0, <?php echo $row['id']; ?>)">
                    Cambiar a usuario
                </div> <!-- ← este cierre es el que faltaba -->
            <?php } else { ?>
                <div class="button" style="background-color:orange; color:white" onclick="cambiarNivel(1, <?php echo $row['id']; ?>)">
                    Cambiar a administrador
                </div>
            <?php } ?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
</table>
