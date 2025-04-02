<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="formulario.php">
            <div class="input-group">
                <label for="num_alumnos">Introduzca número alumnos:</label>
                <input type="number" id="num_alumnos" name="num_alumnos" min="1" required>
            </div>
            <div class="button-group">
                <input type="submit" value="Enviar">
                <input type="reset" value="Limpiar">
            </div>
        </form>
    </div>
</body>
</html>