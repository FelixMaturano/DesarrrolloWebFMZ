<?php
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$sexo = $_POST['sexo'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            background-color: white;
            height: 40px;
            border: 1px solid black;
            padding:auto;
        }
        .green{
            background-color: green;
        }
        .yellow{
            background-color: yellow;
        }
        .orange{
            background-color: orange;
        }
        .blue{
            background-color: blue;
        }
        .aqua{
            background-color: aqua;
        }
    </style>
</head>
<body>

<table  class="container">
    <thead style = "background-color: green">
        <tr>
            <td  class = "green" width = "500px"  >Nombres :<?php echo $nombres?></td>
            <td class = "yellow"width = "300px">Apellidos: <?php echo $apellidos?></td>
            <td class = "green"width = "300px">Apellidos: <?php echo $sexo?></td>

 
        </tr>
        <div>
        <td  class = "aqua" width = "500px"  >Celular :<?php echo $celular?></td>
        <td class="orange"width = "350px">Correo: <?php echo $correo?></td>
        <td class="blue"width = "300px">Direccion: <?php echo $direccion?></td>
        </div>
    </thead>

</table>

</body>
</html>