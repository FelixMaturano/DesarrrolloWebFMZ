<?php
$numero = (int) $_POST["numero"]; // Convertir a entero

if ($numero < 0) {
    echo "<p style='color: red;'>El número ingresado es negativo. Debe ser positivo.</p>";
    echo "<a href='formn.html'>Volver</a>";
} else {
    $suma = array_sum(str_split((string) $numero)); // Sumar los dígitos

    echo "<h2>Resultado</h2>";
    echo "<p>La suma de los dígitos de $numero es: $suma</p>";
    echo "<a href='formn.html'>Volver</a>";
}
?>