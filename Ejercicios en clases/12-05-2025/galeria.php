<?php
$conexion = mysqli_connect("localhost", "root", "", "bd_biblioteca");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$consulta = "SELECT * FROM libros";
$resultado = mysqli_query($conexion, $consulta);

echo "<h2>Galería de libros</h2>";

if (mysqli_num_rows($resultado) > 0) {
    echo "<table border='1' cellpadding='10'>";
    $cont = 0;
    
    while ($fila = mysqli_fetch_assoc($resultado)) {
        if ($cont % 3 == 0) {
            echo "<tr>";
        }
        
        echo "<td>
              <img src='imagenes/{$fila['imagen']}' 
                   onclick='mostrarModal(\"imagenes/{$fila['imagen']}\")' 
                   title='{$fila['titulo']} - {$fila['autor']}'
              >
              </td>";
        
        $cont++;
        
        if ($cont % 3 == 0) {
            echo "</tr>";
        }
    }
    
    // Cerrar fila incompleta si es necesario
    if ($cont % 3 != 0) {
        for ($i = $cont % 3; $i < 3; $i++) {
            echo "<td></td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<p>No hay libros disponibles en la base de datos.</p>";
}

mysqli_close($conexion);
?>