<?php
class Examen {
    private $cadena1;
    private $cadena2;
    
    // Constructor que inicializa las propiedades
    public function __construct($cadena1, $cadena2) {
        $this->cadena1 = $cadena1;
        $this->cadena2 = $cadena2;
    }
    
    // Método para cruzar las palabras por la primera letra en común
    public function cruzar() {
        $letras_comunes = [];
        
        // Buscar letras comunes entre ambas cadenas
        for ($i = 0; $i < strlen($this->cadena1); $i++) {
            $letra = strtolower($this->cadena1[$i]);
            
            if (strpos(strtolower($this->cadena2), $letra) !== false) {
                $letras_comunes[] = $letra;
            }
        }
        
        // Eliminar duplicados
        $letras_comunes = array_unique($letras_comunes);
        
        // Si no hay letras comunes, mostrar mensaje
        if (empty($letras_comunes)) {
            echo "<p><strong>no existen letras comunes</strong></p>";
            return;
        }
        
        // Generar la tabla HTML con las palabras cruzadas
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        
        // Primera fila: mostrar la cadena2 horizontalmente
        echo "<tr>";
        echo "<td></td>"; // Celda vacía en la esquina superior izquierda
        
        for ($i = 0; $i < strlen($this->cadena2); $i++) {
            echo "<td style='background-color: " . ($i == 0 ? "#0099ff" : "white") . "'>";
            echo strtoupper($this->cadena2[$i]);
            echo "</td>";
        }
        echo "</tr>";
        
        // Filas siguientes: mostrar la cadena1 verticalmente y crear el cruce
        for ($i = 0; $i < strlen($this->cadena1); $i++) {
            echo "<tr>";
            
            // Primera columna: letras de cadena1
            echo "<td style='background-color: " . ($i == 0 ? "#0099ff" : "white") . "'>";
            echo strtoupper($this->cadena1[$i]);
            echo "</td>";
            
            // Rellenar el resto de la fila
            for ($j = 0; $j < strlen($this->cadena2); $j++) {
                $color = "white";
                
                // Si la letra actual de la cadena1 está en cadena2, colorear la celda
                if (strtolower($this->cadena1[$i]) == strtolower($this->cadena2[$j])) {
                    $color = "#0099ff";
                }
                
                echo "<td style='background-color: $color;'></td>";
            }
            
            echo "</tr>";
        }
        
        echo "</table>";
    }
}
?>