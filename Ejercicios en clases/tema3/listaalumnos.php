<?php
# que es un arreglo asociativo ? es un arreglo que tiene claves asociadas a valores
$alumno1 = ["nombre"=>"Juan","apellido"=>"Perez","edad"=>30];# es un arreglo asociativo 
$alumno2 = ["nombre"=>"Maria","apellido"=>"Gomez","edad"=>25];
$alumno3 = ["nombre"=>"Pedro","apellido"=>"Jimenez","edad"=>35];

# aqui que estamo haciendo es crear un arreglo de alumnos
$listadealumnos = [$alumno1,$alumno2,$alumno3];


# aqui estamos creando una tabla con los datos de los alumnos
echo "<table border='1' style='border-collapse: collapse;'>";# border-collapse: es para que los bordes de la tabla se vean mejor
echo "<tr><th>Nombre</th><th>Apellido</th><th>Edad</th></tr>";# aqui estamos creando la cabecera de la tabla


foreach($listadealumnos as $alumno){
    echo "<tr>";
    echo "<td>".$alumno["nombre"]."</td>";
    echo "<td>".$alumno["apellido"]."</td>";
    echo "<td>".$alumno["edad"]."</td>";
    echo "</tr>";
}
echo "</table>";
?>