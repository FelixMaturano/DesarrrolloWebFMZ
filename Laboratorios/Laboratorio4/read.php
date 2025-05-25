<?php 
session_start();
require("verificarsesion.php");
require("conexion.php");

$orden = "usuarios.id";
$buscar = "";

if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
}

if (isset($_GET['orden'])) {
    $orden = $_GET['orden'];
}

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$sql2 = "SELECT COUNT(*) as total FROM usuarios 
         WHERE nombre LIKE '%$buscar%' OR correo LIKE '%$buscar%'";
$resultado2 = $con->query($sql2);
$row2 = mysqli_fetch_array($resultado2);
$total = $row2['total'];
$nropaginas = ceil($total / 10);
$inicio = ($pagina - 1) * 10;

$sql = "SELECT id, nombre, correo, nivel, Estado FROM usuarios 
        WHERE nombre LIKE '%$buscar%' OR correo LIKE '%$buscar%' 
        ORDER BY $orden 
        LIMIT $inicio, 10";

$resultado = $con->query($sql);
?>

<form action="read.php" method="get">
    <label for="buscar">Buscar</label>
    <input type="text" name="buscar" placeholder="Buscar por nombre o correo" value="<?php echo $buscar; ?>">
    <input type="submit" value="Buscar">
</form>

<table class="container" style="border-collapse: collapse" border="1">
    <thead>
        <tr>
            <th><a href="read.php?orden=nombre&buscar=<?php echo $buscar; ?>">Nombre</a></th>
            <th><a href="read.php?orden=correo&buscar=<?php echo $buscar; ?>">Correo</a></th>
            <th><a href="read.php?orden=nivel&buscar=<?php echo $buscar; ?>">Rol</a></th>
            <th><a href="read.php?orden=Estado&buscar=<?php echo $buscar; ?>">Estado</a></th>
            <?php if ($_SESSION['nivel'] == 1): ?>
                    <a class="insertar" href="revisarCorreos.php">Revisar Correos</a>
                    <a class="insertar" href="enviar_avisos.php">Enviar Avisos</a>
                <th>Operaciones</th>
            <?php endif; ?>
        </tr>
    </thead>
    <?php while ($row = mysqli_fetch_array($resultado)) { ?>
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo ($row['nivel'] == 1) ? "Administrador" : "Usuario"; ?></td>
            <td><?php echo ($row['Estado'] == 1) ? "Activo" : "Inactivo"; ?></td>
            <?php if ($_SESSION['nivel'] == 1): ?>
                <td>
                    <?php if ($row['Estado'] == 1): ?>
                        <a href="cambiar_estado.php?id=<?php echo $row['id']; ?>&estado=0" onclick="return confirm('¿Estás seguro de desactivar este usuario?');">Desactivar</a>
                    <?php else: ?>
                        <a href="cambiar_estado.php?id=<?php echo $row['id']; ?>&estado=1" onclick="return confirm('¿Deseas activar este usuario?');">Activar</a>
                    <?php endif; ?>
                </td>
            <?php endif; ?>
        </tr>
    <?php } ?>
</table>

<ul style="display: flex;list-style: none;margin: 0; justify-content: center; font-size: 20px; padding: 10px; color: white;">
    <li style="margin: 0 10px;"><a href="read.php?pagina=<?php echo max(1, $pagina-1); ?>&buscar=<?php echo $buscar; ?>">Anterior</a></li>
    <li style="margin: 0 10px;"><a href="read.php?pagina=<?php echo min($pagina+1, $nropaginas); ?>&buscar=<?php echo $buscar; ?>">Siguiente</a></li>
    <?php for ($i = 1; $i <= $nropaginas; $i++) { ?>
        <li><a href="read.php?pagina=<?php echo $i; ?>&buscar=<?php echo $buscar; ?>"><?php echo $i; ?></a></li>
    <?php } ?>
</ul>

<br><br>
<a class="insertar" href="forminsertar.php"> Insertar</a>
<a class="cerrar" href="cerrar.php">Cerrar Sesión</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #4b367c 0%, #6441a5 100%);
            padding: 50px;
            justify-content: center;
            align-items: center;
            height: auto;
            margin: 50px;
            color: white;
        }
        thead{
            background-color: rgba(255, 255, 255, 0.8);
        }
        .container{
            background-color: white(75, 54, 124, 0.8);
            border-radius: 10px;
            padding: 40px;
            width: auto;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .container td th{
            width: 100%;
            padding: 10px;
            border: 1px solidrgb(255, 255, 255);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: black;
        } 
        .insertar {
            text-decoration: none;
            color: white;
            background-color: #6441a5;
            padding: 10px;
            width: auto;
            border-radius: 5px;
            margin: 10px;
        }
        .cerrar{ 
            text-decoration: none;
            color: white;
            background-color: #6441a5;
            padding: 10px;
            width: auto;
            border-radius: 5px;
            margin: 10px;
        }

        .container a {

            text-decoration: none;
            color: black;
            font-style:bold;
            background-color: #white;
            padding: 0;
            width: auto;
            border-radius: 5px;
        }
        .container a:hover{
            color:white;
        }
        

    </style>
    
</body>
</html>