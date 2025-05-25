<?php
include("conexion.php");

$sql = "SELECT 
          c.id AS id_correo,
          c.asunto,
          remitente.correo AS correo_remitente,
          destinatario.correo AS correo_destinatario,
          destinatario.Estado AS estado_destinatario
        FROM 
          correos c
        JOIN 
          usuarios remitente ON c.remitente_id = remitente.id
        JOIN 
          usuarios destinatario ON c.destinatario_id = destinatario.id";

$resultado = $con->query($sql);
?>

<table style="border-collapse: collapse" border="1">
    <thead>
        <tr>
            <th width="100px">id_correo</th>
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
            <td><?php echo $row['id_correo']; ?></td>
            <td><?php echo $row['correo_destinatario']; ?></td>
            <td><?php echo $row['asunto']; ?></td>
            <td>
                <?php echo $row['estado_destinatario'] == 1 ? 'Activo' : 'Inactivo'; ?>
            </td>
            <td>
                <a href="javascript:ver(<?php echo $row['id_correo']; ?>)">Ver</a>
                <a href="javascript:eliminarBS(<?php echo $row['id_correo']; ?>)">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
