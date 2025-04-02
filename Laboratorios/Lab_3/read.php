<?php include 'conexion.php'; ?>
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
        $result = mysqli_query($con, "SELECT alumnos.id, alumnos.fotografia, alumnos.nombres, alumnos.apellidos, alumnos.cu, alumnos.sexo, carreras.carrera FROM alumnos JOIN carreras ON alumnos.codigocarrera = carreras.codigo");

        echo "<table border='1'>";
        echo "<tr><th>Fotografía</th><th>Nombres</th><th>Apellidos</th><th>CU</th><th>Sexo</th><th>Carrera</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><img src='" . $row['fotografia'] . "' width='100' height='100'></td>";
            echo "<td>" . $row['nombres'] . "</td>";
            echo "<td>" . $row['apellidos'] . "</td>";
            echo "<td>" . $row['cu'] . "</td>";
            echo "<td>" . ($row['sexo'] == 'M' ? 'Masculino' : 'Femenino') . "</td>";
            echo "<td>" . $row['carrera'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        ?>
        <a href="forminsertar.php"> Volver a Menu</a>
    </div>
</body>
</html>