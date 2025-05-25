<?php include 'conexion.php'; ?>

<?php

$sql = "SELECT fotografia, titulo, autor, editorial, anio FROM libros";
$resultado = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <?php
      
        echo "<table border='1'>";
        echo "<tr><th>Fotografía</th><th>Nombres</th><th>Apellidos</th><th>CU</th><th>Sexo</th><th>Carrera</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><img src='" . $row['fotografia'] . "' width='100' height='100'></td>";
            echo "<td>" . $row['titulo'] . "</td>";
            echo "<td>" . $row['autor'] . "</td>";
            echo "<td>" . $row['editorial'] . "</td>";
            echo "<td>" . $row['anio'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        ?>
        <!-- <a href="forminsertar.php"> Volver a Menu</a> -->
    </div>
</body>
</html>