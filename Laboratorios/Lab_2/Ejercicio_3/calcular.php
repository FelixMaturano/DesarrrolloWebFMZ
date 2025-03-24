<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = (int) $_POST["cantidad"]; // Convertir a número entero

    // Función para verificar si un número es primo
    function esPrimo($num) {
        if ($num < 2) return false;
        for ($i = 2; $i * $i <= $num; $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    // Generar los primeros n números primos
    $primos = [];
    $numero = 2;
    while (count($primos) < $n) {
        if (esPrimo($numero)) {
            $primos[] = $numero;
        }
        $numero++;
    }

    // Mostrar los resultados en una lista ordenada con estilo
    echo "<h2>Lista de los primeros $n números primos</h2>";
    echo "<ol style='border: 2px solid green; background-color: yellow; padding: 10px; width: 50%;'>";
    foreach ($primos as $primo) {
        echo "<li style='margin: 5px;'>$primo</li>";
    }
    echo "</ol>";
    echo "<br><a href='formnprimos.html'>Volver</a>";
} else {
    echo "<p style='color: red;'>Acceso no permitido.</p>";
}
?>
