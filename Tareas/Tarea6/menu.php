<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu principal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu-container">
        <h1>Bienvenido..!</h1>
        
        <!--  Menu para Administradores  -->
        <?php if ($_SESSION['nivel'] == 1): ?>
            <div class="admin-menu">
                <h2>Panel de Administrador</h2>
                <a href="read.php" class="btn"> Gestion de personas</a>
                <a href="readprofesiones.php" class="btn"> Gestion de profesiones</a>
                <a href="readusuarios.php" class="btn"> Gestion de Usuarios</a>
            </div>
        <!--Menu para usuarios normales-->    
        <?php else: ?>   
            <div class="user-menu">
                <h2>Tu panel</h2>
                <a href="read.php" class="btn"> Ver contactos</a>
                <a href="readprofesiones.php" class="btn"> Ver profesiones</a>
                <a href="readusuarios.php" class="btn"> Ver perfil</a>
            </div>
        <?php endif;?>
        <div class="logout-section">
            <a href="cerrar.php" class="btn-cerrar"> Cerrar Sesion</a>
        </div>
    </div>
</body>
</html>