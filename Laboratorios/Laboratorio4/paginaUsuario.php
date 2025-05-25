<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="row">
        <li><a href="">Redactar</a></li>
    </div>
    <div id="content">
        <ul class="menu">
            <!-- <li id="btn-1"><a href="">Bandeja de Entrada</a></li> -->
            <li id="btn-1"><a href="javascript:cargarContenido('bEntradaU.php')">Bandeja de Entrada</a></li>
            <li id="btn-2"><a href="javascript:cargarContenido('bSalidaU.php')">Bandeja de Salida</a></li>
            <li id="btn-3"><a href="javascript:cargarContenido('bBorradorU.php')">Bandeja de Borradores</a></li>
        </ul>
        <div id="contenido">

        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="titulo-modal">Título del Modal</h2>
                <div id="contenido-modal">

                </div>
            </div>
        </div>
    </div>
    <script src="fetch.js"></script>
</body>

</html>