<?php
include("conexion.php");
$query = "SELECT * FROM libros";
$result = mysqli_query($con, $query);
echo '<div class="galeria">';
while ($row = mysqli_fetch_assoc($result)) {
 echo '<div class="libro">';
 echo '<img src="'.$row['imagen'].'" class="libro-img" style="width:75p
x;height:100px;cursor:pointer">';
 echo '</div>';
}
echo '</div>';
?>