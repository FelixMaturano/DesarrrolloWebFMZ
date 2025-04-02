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
<?php

if (isset($_POST['num_alumnos'])) {
    $num_alumnos = (int)$_POST['num_alumnos'];
    echo "<form action='guardar.php' method='POST' enctype='multipart/form-data'>";
    echo "<table border='1' >";
    echo "<tr><th>Fotografía</th><th>Nombres</th><th>Apellidos</th><th>CU</th><th>Sexo</th><th>Carrera</th></tr>";
    
    for ($i = 0; $i < $num_alumnos; $i++) {
        echo "<tr>";
        echo "<td><input type='file' name='fotografia[]' accept='image/*' required></td>";
        echo "<td><input type='text' name='nombres[]' required></td>";
        echo "<td><input type='text' name='apellidos[]' required></td>";
        echo "<td><input type='text' name='cu[]' required></td>";
        echo "<td>
                <input type='radio' name='sexo[$i]' value='M' required>Masculino
                <input type='radio' name='sexo[$i]' value='F'>Femenino
              </td>";
        
        echo "<td><select name='codigocarrera[]' required>";
        $result = mysqli_query($con, "SELECT * FROM carreras");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['codigo'] . "'>" . $row['carrera'] . "</option>";
        }
        echo "</select></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<input type='submit' value='Guardar'>";
    echo "</form>";
}
?>
</body>
</html>
