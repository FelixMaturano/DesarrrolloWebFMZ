<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú de Cola</title>
</head>
<body>
    <h2>Gestión de Cola con Sesiones</h2>

    <form action="procesar.php" method="post">
        <label>Tipo de Cola:</label>
        <select name="tipo" required>
            <option value="Normal">Normal</option>
            <option value="dobleentrada">Doble Entrada</option>
        </select>
        <br><br>

        <label>Valor a insertar:</label>
        <input type="text" name="valor">
        <br><br>

        <label>Operación:</label><br>
        <input type="radio" name="accion" value="insertardelante"> Insertar Delante<br>
        <input type="radio" name="accion" value="insertardetras"> Insertar Detrás<br>
        <input type="radio" name="accion" value="eliminar"> Eliminar<br>
        <input type="radio" name="accion" value="mostrar" checked> Mostrar<br><br>

        <input type="submit" value="Ejecutar">
    </form>

    <form method="post" action="procesar.php">
        <input type="hidden" name="accion" value="reset">
        <button type="submit">🔁 Reiniciar Cola</button>
    </form>
</body>
</html>
