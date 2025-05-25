<?php
if ($_SESSION["nivel"]==0)
{
    echo "Usuario";
    ?>
    <meta http-equiv="refresh" content="3;url=readusuarios.php">
    <?php
    die();
}
if ($_SESSION["nivel"]==1)
{
    echo "Administrador";
    ?>
    <meta http-equiv="refresh" content="3;url=read.php">
    <?php
    die();
}
?>