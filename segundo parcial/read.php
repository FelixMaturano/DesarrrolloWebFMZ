<?php 

include("conexion.php");
$sql="SELECT id, imagen FROM libros";

$resultado=$con->query($sql);

?>
<?php 
while($row=mysqli_fetch_array($resultado)){ ?>
<?php '<div class="libro">'?>
  <img src="images/<?= $row['imagen']?>" width="75px" height="100px" cursor="pointer"> 
<?php echo '</div>';?>
<?php }
?>