<?php
class Examen {
    private $cadena1;
    private $cadena2;

    public function __construct($cadena1, $cadena2) {
        $this->cadena1 = strtoupper($cadena1);
        $this->cadena2 = strtoupper($cadena2);
    }

    public function cruzar() {
        $fila = -1;
        $columna = -1;

        // Buscar primera letra en común
        for ($i = 0; $i < strlen($this->cadena1); $i++) {
            $pos = strpos($this->cadena2, $this->cadena1[$i]);
            if ($pos !== false) {
                $fila = $i;
                $columna = $pos;
                break;
            }
        }

        if ($fila == -1) {
            echo "<p><strong>No existen letras comunes</strong></p>";
            return;
        }

        echo "<h2>Resultado del Cruce</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";

        for ($i = 0; $i < strlen($this->cadena1); $i++) {
            echo "<tr>";
            for ($j = 0; $j < strlen($this->cadena2); $j++) {
                if ($i == $fila && $j == $columna) {
                    // Letra en común (cruce)
                    echo "<td style='background-color:#0099ff; text-align:center; font-weight:bold;'>";
                    echo $this->cadena1[$i];
                    echo "</td>";
                } elseif ($i == $fila) {
                    // Imprimir cadena2 en la fila del cruce
                    echo "<td style='text-align:center; font-weight:bold;'>";
                    echo $this->cadena2[$j];
                    echo "</td>";
                } elseif ($j == $columna) {
                    // Imprimir cadena1 en la columna del cruce
                    echo "<td style='text-align:center; font-weight:bold;'>";
                    echo $this->cadena1[$i];
                    echo "</td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cadena1 = $_POST["cadena1"];
    $cadena2 = $_POST["cadena2"];

    $examen = new Examen($cadena1, $cadena2);
    $examen->cruzar();
}
?>
