<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $palabras = $_POST["palabras"];

    // Función para ordenar las palabras alfabéticamente
    function ordenarPalabras($array) {
        sort($array, SORT_STRING | SORT_FLAG_CASE); // Ordena de forma insensible a mayúsculas
        return $array;
    }

    // Ordenar las palabras
    $palabrasOrdenadas = ordenarPalabras($palabras);

    // Mostrar la lista ordenada con estilos
    echo "<h2>Palabras Ordenadas</h2>";
    echo "<ul style='border: 2px solid red; background-color: yellow; text-align: center; padding: 10px; width: 50%; margin: auto;'>";
    foreach ($palabrasOrdenadas as $palabra) {
        echo "<li style='margin: 5px;'>$palabra</li>";
    }
    echo "</ul>";
    echo "<br><a href='formpalabras.html'>Volver</a>";
} else {
    echo "<p style='color: red;'>Acceso no permitido.</p>";
}
?>
