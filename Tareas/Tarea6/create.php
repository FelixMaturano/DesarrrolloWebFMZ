<?php 
session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los datos están definidos
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : null;

    // Verificar que ningún campo esté vacío
    if (!empty($correo) && !empty($nombre) && !empty($password) && !empty($nivel)) {
        
        // Encriptar la contraseña
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Verificar si el correo ya existe en la base de datos
        $stmt = $con->prepare("SELECT id FROM usuarios WHERE correo=?");
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $con->error);
        }
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            die("Error: El correo ya está registrado.");
        }
        $stmt->close();

        // Insertar nuevo usuario
        $stmt = $con->prepare("INSERT INTO usuarios (correo, password, nombre, nivel) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $con->error);
        }

        // Vincular parámetros
        $stmt->bind_param("sssi", $correo, $password_hash, $nombre, $nivel);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Nuevo registro creado con éxito";
        } else {
            echo "Error al registrar usuario: " . $stmt->error;
        }

        // Cerrar la consulta y la conexión
        $stmt->close();
        $con->close();
        
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Acceso no permitido.";
}
?>

<!-- Redirigir a readusuarios.php después de 3 segundos -->
<meta http-equiv="refresh" content="3;url=readusuarios.php">
