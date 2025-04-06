<?php
$filas = $_POST['filas'];
$columnas = $_POST['columnas'];
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
    <table>
        <?php
        for ($i = 1; $i <= $filas; $i++) {
                // Determinar la clase según el múltiplo de 3
                if ($i % 3 == 1) {
                    $clase = "color-rojo";
                } elseif ($i % 3 == 2) {
                    $clase = "color-amarillo";
                } else {
                    $clase = "color-verde";
                }           
            echo "<tr class=\"$clase\">";
            for ($j = 1; $j <= $columnas; $j++) {

                
                echo "<td></td>";
                
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>