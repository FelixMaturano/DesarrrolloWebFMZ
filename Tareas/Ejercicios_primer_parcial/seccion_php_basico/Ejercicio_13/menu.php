
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(!isset($_GET['numero'])){
    echo "Numero no proporcionado.<a href='form.html'>Volver</a>";
    exit;
}

$numero = intval($_GET['numero']);
?>
    <h2>Que desea calcular con el numero <?= $numero ?></h2>
    <ul>
        <li><a href="calcular.php?accion=fibonacci&numero=<?= $numero?>">Calcular el fibonaci</a></li>
        <li><a href="calcular.php?accion=factorial&numero=<?= $numero?>">Calcular el Factorial</a></li>
    </ul>
</body>
</html>