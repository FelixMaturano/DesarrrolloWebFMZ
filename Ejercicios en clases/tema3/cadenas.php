<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$cadena = "Hola mundo";
echo $strlen($cadena),"<br>";
echo $cadena[0],"<br>";
$palabras = explode(" ",$cadena);

foreach($palabras as $palabra){
    echo $palabra."<br>";
}
$unido = implode(" ",$palabras);
echo $unido,"<br>";
echo strtoupper($cadena),"<br>";
echo strtolower($cadena),"<br>";
echo ucfirst($cadena),"<br>";
echo ucwords($cadena),"<br>";
echo str_replace("mundo","amigos",$cadena),"<br>";
?>
</body>
</html>