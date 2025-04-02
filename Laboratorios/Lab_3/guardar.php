<?php include 'conexion.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cus = $_POST['cu'];
    $sexos = $_POST['sexo'];
    $codigos_carrera = $_POST['codigocarrera'];
    
    // Carpeta donde se guardarán las imágenes
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Crear la carpeta si no existe
    }

    for ($i = 0; $i < count($nombres); $i++) {
        // Procesar la imagen
        $image_name = $_FILES['fotografia']['name'][$i];
        $image_tmp = $_FILES['fotografia']['tmp_name'][$i];
        $image_path = $upload_dir . basename($image_name);

        if (move_uploaded_file($image_tmp, $image_path)) {
            // Guardar la ruta en la base de datos
            $stmt = mysqli_prepare($con, "INSERT INTO alumnos (fotografia, nombres, apellidos, cu, sexo, codigocarrera) VALUES (?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssssi", $image_path, $nombres[$i], $apellidos[$i], $cus[$i], $sexos[$i], $codigos_carrera[$i]);
            mysqli_stmt_execute($stmt);
        } else {
            echo "Error al subir la imagen.";
        }
    }

    echo "Datos guardados correctamente.";

}
?>
    <meta http-equiv="refresh" content="3;url=read.php">;