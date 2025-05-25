<?php include("conexion.php");

// $bandeja = $_GET['bandeja'];

$sql = "SELECT * FROM correosbandeja WHERE bandeja = 'borrador'";
$resultado = $con->query($sql);


?>

<table style="border-collapse: collapse" border="1">
    <thead>
        <tr>
            <th width="100px">Correo</th>
            <th width="100px">Asunto</th>
            <th width="10px">Estado</th>
            <th>Operaciones</th>
        </tr>
    </thead>

    <?php


    while ($row = mysqli_fetch_array($resultado)) {
    ?>
        <tr>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['asunto']; ?></td>
            <td><?php echo $row['estadoCorreo'] == 'P' ? 'Pendiente' : 'Enviado' ?></td>
            <td><a href="javascript:ver(<?php echo $row['id']; ?>)">Ver</a>
                <a href="javascript:eliminar(<?php echo $row['id']; ?>)">Eliminar</a>
            </td>
        </tr>
    <?php } ?>