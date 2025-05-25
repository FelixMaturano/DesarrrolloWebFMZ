<?php
// Recibir datos del formulario
$mes = isset($_POST['mes']) ? (int)$_POST['mes'] : date('n');
$anio = isset($_POST['anio']) ? (int)$_POST['anio'] : date('Y');

// Nombres de los meses en español
$nombres_meses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];

// Obtener el primer día del mes y el número de días en el mes
$primer_dia = mktime(0, 0, 0, $mes, 1, $anio);
$dias_en_mes = date('t', $primer_dia);

// Obtener el día de la semana del primer día (0: domingo, 6: sábado)
$dia_semana_inicio = date('w', $primer_dia);
// Convertir domingo (0) a 7 para facilitar la lógica del calendario
if ($dia_semana_inicio == 0) {
    $dia_semana_inicio = 7;
}
// Ajustar para que el lunes sea el primer día (1)
$dia_semana_inicio = ($dia_semana_inicio == 1) ? 1 : $dia_semana_inicio - 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario - <?php echo $nombres_meses[$mes]; ?> <?php echo $anio; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        table {
            width: 40%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            height: 30px;
            text-align: center;
            vertical-align: middle;
            width: 14.28%; /* 100% / 7 columnas */
        }
        th {
            background-color: #D9D9D9;
            height: 50px;
        }
        tr:nth-child(odd) td {
            background-color: #FDE9D9;
        }
    </style>
</head>
<body>
    <h1>Mes: <?php echo $nombres_meses[$mes]; ?></h1>
    
    <table>
        <thead>
            <tr>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Iniciar la primera fila del calendario
            echo "<tr>";
            
            // Espacios en blanco para los días anteriores al primer día del mes
            for ($i = 1; $i < $dia_semana_inicio; $i++) {
                echo "<td></td>";
            }
            
            // Contador para el día de la semana actual
            $dia_semana_actual = $dia_semana_inicio;
            
            // Generar el calendario
            for ($dia = 1; $dia <= $dias_en_mes; $dia++) {
                echo "<td>$dia</td>";
                
                // Si es domingo (día 7) o el último día del mes, cerrar la fila actual y abrir una nueva
                if ($dia_semana_actual == 7) {
                    echo "</tr>";
                    if ($dia < $dias_en_mes) {
                        echo "<tr>";
                    }
                    $dia_semana_actual = 1;
                } else {
                    $dia_semana_actual++;
                }
            }
            
            // Completar la última fila con celdas vacías si es necesario
            while ($dia_semana_actual <= 7 && $dia_semana_actual > 1) {
                echo "<td></td>";
                $dia_semana_actual++;
            }
            
            // Cerrar la última fila si está abierta
            if ($dia_semana_actual > 1) {
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>