<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = (int) $_POST["cantidad"];
    
    echo "<h2>Ingrese $cantidad palabras</h2>";
    echo "<form action='ordenar.php' method='POST'>";
    
    // Crear campos de texto para ingresar las palabras
    for ($i = 1; $i <= $cantidad; $i++) {
        echo "<label for='palabra$i'>Palabra $i:</label>";
        echo "<input type='text' name='palabras[]' required><br>";
    }

    echo "<button type='submit'>Ordenar</button>";
    echo "</form>";
} else {
    echo "<p style='color: red;'>Acceso no permitido.</p>";
}
?>
