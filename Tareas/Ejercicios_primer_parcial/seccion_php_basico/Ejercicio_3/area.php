<?php
$b = $_GET['b'];
$h = $_GET['h'];
$area = ($b*$h)/2;

if(isset($_GET['b']) && isset($_GET['h'])){
    echo "<h2>Mostando el area de un triangulo</h2>";
    echo "Bae(b): $b<br>";
    echo "Altura(h): $h<br>";
    echo "Area del triangulo es: $area<br><br><br>";
    echo "<a href='formab.html'>Volver a Menu</a>";
}else{
    echo "Los valores no han sido enviados";
}
?>