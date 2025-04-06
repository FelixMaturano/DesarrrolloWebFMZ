<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener las cadenas del formulario
    $cadena1 = isset($_POST['cadena1']) ? $_POST['cadena1'] : '';
    $cadena2 = isset($_POST['cadena2']) ? $_POST['cadena2'] : '';
    
    // Mostrar la cadena1
    echo "<p>Cadena 1: " . htmlspecialchars($cadena1) . "</p>";
    
    // Verificar si cadena1 contiene a cadena2
    if (strpos($cadena1, $cadena2) !== false) {
        // Si contiene la palabra, mostrar el mensaje y eliminar cadena2 de cadena1
        echo "<p>" . htmlspecialchars($cadena1) . " tiene la palabra " . htmlspecialchars($cadena2) . "</p>";
        
        // Reemplazar cadena2 con una cadena vacía en cadena1
        $resultado = str_replace($cadena2, '', $cadena1);
        echo "<p>Resultado después de eliminar la palabra: " . htmlspecialchars($resultado) . "</p>";
    } else {
        // Si no contiene la palabra, mostrar el mensaje
        echo "<p>" . htmlspecialchars($cadena1) . " no tiene la palabra " . htmlspecialchars($cadena2) . "</p>";
    }
} else {
    // Si no se recibieron datos por POST, mostrar un mensaje de error
    echo "<p>Error: No se recibieron datos del formulario.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Comparación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        p {
            margin: 10px 0;
            line-height: 1.5;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 15px;
            background-color: #D9D9D9;
            color: black;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover {
            background-color: #c0c0c0;
        }
    </style>
</head>
<body>
    <h2>Resultado de la Comparación</h2>
    
    <a href="form.html">Volver al formulario</a>
</body>
</html>