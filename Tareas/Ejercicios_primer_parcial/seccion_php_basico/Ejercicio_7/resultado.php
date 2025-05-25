<?php

$a = $_GET['a'];
$b = $_GET['b'];

$resultado = $a  + $b;

echo "<h2 style='color:red;'>El resultado de la suma es: </h2>";

echo "<table><tr><td>$a</td><td><p>+</p></td><td>$b</td><td><p>=</p></td><td>$resultado</td></tr></table>";

echo "<style>
        table{
            border-collapse: collapse;
            margin: 10px;
            background-color: green;
        }
        td{
            border: 1px solid black;
            padding: 5px;
            text-align:center;
            width: 60px;
        }

    </style>";

    echo "<a href='form.html'>Volver al Menu</a>";
?>