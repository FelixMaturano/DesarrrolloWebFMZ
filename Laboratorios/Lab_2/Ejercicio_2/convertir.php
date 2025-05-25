<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperatura = (float) $_POST["temperatura"]; // Convertir a número decimal
    $unidad = $_POST["unidad"]; // Obtener la unidad seleccionada

    // Inicializar variables para cada temperatura
    $celsius = $fahrenheit = $kelvin = 0;

    // Realizar la conversión según la unidad seleccionada
    if ($unidad == "C") {
        $celsius = $temperatura;
        $fahrenheit = ($celsius * 9/5) + 32;
        $kelvin = $celsius + 273.15;
    } elseif ($unidad == "F") {
        $fahrenheit = $temperatura;
        $celsius = ($fahrenheit - 32) * 5/9;
        $kelvin = $celsius + 273.15;
    } elseif ($unidad == "K") {
        $kelvin = $temperatura;
        $celsius = $kelvin - 273.15;
        $fahrenheit = ($celsius * 9/5) + 32;
    }

    // Estilos CSS en línea para la tabla
    echo "<h2>Resultados de Conversión</h2>";
    echo "<table style='border: 2px solid green; background-color: white; text-align: center; border-collapse: collapse; width: 50%;'>";
    echo "<tr style='border: 2px solid green;'><th style='border: 2px solid green; padding: 10px;'>Unidad</th><th style='border: 2px solid green; padding: 10px;'>Valor</th></tr>";
    echo "<tr style='border: 2px solid green;'><td style='border: 2px solid green; padding: 10px;'>Celsius (°C)</td><td style='border: 2px solid green; padding: 10px;'>" . round($celsius, 2) . "</td></tr>";
    echo "<tr style='border: 2px solid green;'><td style='border: 2px solid green; padding: 10px;'>Fahrenheit (°F)</td><td style='border: 2px solid green; padding: 10px;'>" . round($fahrenheit, 2) . "</td></tr>";
    echo "<tr style='border: 2px solid green;'><td style='border: 2px solid green; padding: 10px;'>Kelvin (K)</td><td style='border: 2px solid green; padding: 10px;'>" . round($kelvin, 2) . "</td></tr>";
    echo "</table>";
    echo "<br><a href='formtemp.html'>Volver</a>";
} else {
    echo "<p style='color: red;'>Acceso no permitido.</p>";
}
?>
