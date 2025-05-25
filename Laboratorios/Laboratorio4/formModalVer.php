<?php  
include("conexion.php");

$id = $_GET['id'];

// Consulta corregida: se agregan 'c.asunto' y 'c.mensaje'
$sql = "SELECT 
            c.id AS id_correo,
            c.asunto,
            c.mensaje,
            remitente.correo AS correo_remitente,
            destinatario.correo AS correo_destinatario,
            destinatario.Estado AS estado_destinatario
        FROM correos c 
        JOIN usuarios remitente ON c.remitente_id = remitente.id
        JOIN usuarios destinatario ON c.destinatario_id = destinatario.id
        WHERE c.id = $id";

$resultado = $con->query($sql);
$row = mysqli_fetch_array($resultado);
?>

<div class=".modales">
    <p><strong>ID del Correo:</strong> <?php echo $row['id_correo']; ?></p>
    <p><strong>De:</strong> <?php echo $row['correo_remitente']; ?></p>
    <p><strong>Para:</strong> <?php echo $row['correo_destinatario']; ?></p>
    <p><strong>Asunto:</strong> <?php echo $row['asunto']; ?></p>
    <p><strong>Mensaje:</strong> <?php echo $row['mensaje']; ?></p>
    <p><strong>Estado:</strong> 
        <?php 
        echo ($row['estado_destinatario'] == 'P') ? 'Pendiente' : 'Enviado'; 
        ?>
    </p>
</div>
