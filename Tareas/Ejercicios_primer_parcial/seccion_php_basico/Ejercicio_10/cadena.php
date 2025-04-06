<?php
// Verificar si se recibió una cadena por POST
if (isset($_POST['cadena']) && !empty($_POST['cadena'])) {
    // Obtener la cadena del formulario
    $cadena = $_POST['cadena'];
    
    // Mostrar la cadena original
    echo "<h2>Cadena original:</h2>";
    echo "<p>" . htmlspecialchars($cadena) . "</p>";
    
    // Verificar si contiene la palabra SCRIPT (sin importar mayúsculas/minúsculas)
    if (stripos($cadena, "SCRIPT") !== false) {
        echo "<h2>Resultado:</h2>";
        echo "<p>Tiene la palabra SCRIPT</p>";
        
        // Eliminar la palabra "script" (sin importar mayúsculas/minúsculas)
        $cadenaSinScript = preg_replace('/script/i', '', $cadena);
        
        echo "<h2>Cadena sin la palabra script:</h2>";
        echo "<p>" . htmlspecialchars($cadenaSinScript) . "</p>";
    } else {
        echo "<h2>Resultado:</h2>";
        echo "<p>No contiene la palabra SCRIPT</p>";
    }
    
    // Enlace para volver al formulario
    echo "<p><a href='javascript:history.back()'>Volver al formulario</a></p>";
} else {
    // Si no se recibió una cadena, mostrar un mensaje de error
    echo "<h2>Error</h2>";
    echo "<p>No se ha recibido ninguna cadena. Por favor, complete el formulario.</p>";
    echo "<p><a href='javascript:history.back()'>Volver al formulario</a></p>";
}
?>