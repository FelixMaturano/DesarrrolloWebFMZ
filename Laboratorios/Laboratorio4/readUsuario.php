<?php session_start();
require("verificarsesion.php");
require ('conexion.php');
//se agrega un enlace para cerrar la sesion
$orden= "personas.id";
$buscar= "";

if(isset($_GET['buscar']))
{
    $buscar=$_GET['buscar'];
}

if(isset($_GET['orden']))
{
    $orden=$_GET['orden'];
}
//para paginacion
if(isset($_GET['pagina'])){
    $pagina=$_GET['pagina'];
}else{
    $pagina=1;
}
$sql2="SELECT COUNT(*) as total FROM personas WHERE nombres like '%$buscar%' OR apellidos LIKE '%$buscar%' OR correo LIKE '%$buscar%'"; //count how many registro tiene la tabla personas
$resultado2=$con->query($sql2);
$row2=mysqli_fetch_array($resultado2); //esto es para que se cuente el total de registros que tiene la tabla personas
$total=$row2['total']; //esto es para que se cuente el total de registros que tiene la tabla personas
$nropaginas=$total /10; 
$nropaginas=ceil($nropaginas);
$inicio=($pagina-1)*10;


$sql="SELECT personas,id,asunto,estado,correo FROM personas
      WHERE nombres LIKE '%$buscar%' OR apellidos LIKE '%$buscar%' OR correo LIKE '%$buscar%' 
      ORDER BY $orden
      limit $inicio, 10"; 

$resultado=$con->query($sql);




?>
<form action="read.php" method="get">
    <label for="buscar">Buscar</label>
    <input type="text" name="buscar" placeholder="Buscar por nombre o apellido" value="<?php echo $buscar; ?>">
    <input type="submit" value="Buscar">
</form>




<table class="container" style="border-collapse: collapse" border="1"  >
    <thead>
        <tr>
        
        <th width="200px"><a href="read.php?orden="></a>Correo</th>
        <th width="200px"><a href="read.php?orden=asunto"></a>Asunto</th>
        <th width="200px"><a href="read.php?orden=estado"></a>Estado</th>
        </tr>
    </thead>
    <?php
    while($row=mysqli_fetch_array($resultado)){//esto es para que se muestren los datos de la tabla en form de tabla con los paramateros en el encabezado
        ?>
        <tr>
            <td><?php echo $row['correo'];?></td>
            <td><?php echo $row['asunto'];?></td>
            <td><?php echo $row['estado'];?></td>
        </tr>
        <?php } ?>
</table>
<ul style="display: flex;list-style: none;margin: 0; justify-content: center; font-size: 40px; padding: 10px; color: white;">
    <li style="margin: 0 10px;"><a href="read.php?pagina=<?php echo $pagina-1;?>&buscar=<?php echo $buscar;?>">Anterior</a></li>
    <li style="margin: 0 10px;"><a href="read.php?pagina=<?php echo $pagina+1;?>&buscar=<?php echo $buscar;?>">Siguiente</a></li>
    <?php for($i=1;$i<=$nropaginas;$i++){ ?>
        <li><a href="read.php?pagina=<?php echo $i;?>&buscar=<?php echo $buscar;?>"><?php echo $i;?></a></li>
    <?php } ?>

</ul>
<br><br>
<a href="forminsertar.php"> Insertar</a> <a href="cerrar.php">Cerrar Sesion</a>
<!-- se agrega un enlace para cerrar la sesion -->
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