<?php
include "funciones.php";

if(!isset($_GET['accion'])|| !isset($_GET['numero'])){
    echo "Parametros incorrectos. <a href='formulario.php'>Volver";
    exit;
}
$accion = $_GET['accion'];
$numero = intval($_GET['numero']);

// Inicializamos antes para evitar warnings
$resultado = "";
switch($accion){
    case 'fibonacci':
        $resultado = fibonacci($numero);
        echo "<h3> Fibonaci de $numero es: $resultado</h3>";
        break;
        case 'factorial':
            $resultado = factorial($numero);
            echo "<h3> Factorial de $numero es: $resultado</h3>";
            break;
        default:


        
        echo "Accion no valida";
        exit;
}

echo "<br><a href='form.html'>Volver</a>";
?>